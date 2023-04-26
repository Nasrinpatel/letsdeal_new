<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';

use phpoffice\PhpSpreadsheet\Spreadsheet;
use phpoffice\PhpSpreadsheet\Writer\Xlsx;

class Sourcecategory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/Sourcecategory_model','soucat');
		$this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

	}

	public function index()
	{		
		$data['page_name'] = 'source_category_view';
		$data['sourcategories'] = $this->soucat->all();
		
		$this->load->view('admin/index',$data);

	}
	public function all()
	{
		$category = $this->soucat->all();
		$result = array('data'=>[]);
		$result = array();
		$i=1;
		foreach ($category as $value) { 
			$button = '<a href="' . base_url('admin/sourcecategory/edit/' . $value['id']) . '" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-success"></i></a>
			<a href="' . base_url('admin/sourcecategory/delete/' . $value['id']) . '" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				date('d M Y h:i:s a',strtotime($value['created_date'])),
				$value['status'],
				$button
			);
		}
		echo json_encode($result);
	}
	public function add()
	{
		

		$data['page_name'] = 'source_category_add';
		$this->load->view('admin/index', $data);
	}
	public function store()
	{

		$this->form_validation->set_rules('name', 'Source Category Name', 'required');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$formArray = array();
			$formArrayoptions = array();
			$formArray['name'] = $this->input->post('name');
			$formArray['status'] = $this->input->post('status');
			$formArrayoptions = $this->input->post('option[]');
			$response = $this->soucat->saverecords($formArray,$formArrayoptions);

			if ($response == true) {
				$this->session->set_flashdata('success', 'Source category Added Successfully.');
			} else {
				$this->session->set_flashdata('error', 'Something went wrong. Please try again');
			}
			return redirect('admin/sourcecategory/');
		}
	}

	// public function edit1($id)
	// {
	// 	$data = $this->soucat->getSourcecategory($id);
	// 	$data->option_data= $this->db->get_where('source_option_master',array('source_cat_id'=>$id))->result_array();

	// 	echo json_encode($data);
	// }
	public function edit($id)
	{
		$sourcecategory = $this->soucat->getSourcecategory($id);
		$data = array();
		$data['soucat'] = $sourcecategory;
		$data['souoption'] = $this->soucat->getSourceoption($id);

		$data['page_name'] = 'source_category_edit';
		$this->load->view('admin/index', $data);
	}

	public function update($id)
	{	
		$formArray = array();
		$formArrayoptions = array();
		$formArray['name'] = $this->input->post('name');
		$formArray['status'] = $this->input->post('status');
		$formArrayoptions = $this->input->post('option[]');
		$response = $this->soucat->updaterecords($id,$formArray,$formArrayoptions);
		if ($response == true) {
			$this->session->set_flashdata('success', 'Source category Updated Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again');
		}
		return redirect('admin/Sourcecategory/');
	}
	
	public function delete($id)
	{
		$response = $this->soucat->delete($id);

		if($response == true)
		{
			$this->session->set_flashdata('success', 'Source category Deleted Successfully.');
		}else{
			$this->sesssion->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('admin/sourcecategory/');
		

	}
	//import excel
	public function spreadsheet_import()
	{
		$upload_file=$_FILES['upload_file']['name'];
		$source_cat_id=$_POST['source_cat_id'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$validation_error=false;
			$data=array();
			$validate_data=[];
			for ($i=1; $i < $sheetcount; $i++) { 
				$name=$sheetdata[$i][0];
			
				
				$data[]=$validate_data=array(
				
					'source_cat_id'	=>$source_cat_id,
					'name'		=>$name
					
				);
				$this->form_validation->set_data($validate_data);
				$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
				if (!$this->form_validation->run('import_excel')) //validation success 
				{
					$validation_error=true;
					
				}
			}
			if($validation_error == false){
				$inserdata=$this->soucat->insert_batch($data);
				if($inserdata)
				{
					$this->session->set_flashdata('success','Successfully Imported');
					redirect('admin/sourcecategory/edit/'.$source_cat_id);
				} else {
					$this->session->set_flashdata('error','Data Not uploaded. Please Try Again.');
					redirect('admin/sourcecategory/edit/'.$source_cat_id);
				}	
			}else{
				$data['page_name'] = 'source_category_edit';	
       			$this->load->view('admin/index',$data);
			}			
		}
	}
	
}
