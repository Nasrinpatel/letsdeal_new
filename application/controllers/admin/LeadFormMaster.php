<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeadFormMaster extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('front/LeadFormMaster_model','leadform');
        $this->form_validation->set_error_delimiters('<div class="bg-red-dark m-1 rounded-sm shadow-xl text-center line-height-xs font-10 py-1 text-uppercase mb-0 font-700">', '</div>');

    }

    public function index()
    {
        $data['page_name'] = 'leadform_master_view';
        $this->load->view('admin/index',$data);
    }

    public function all()
    {
        $leadform_master = $this->leadform->all();
        $result = array('data'=>[]);
        $i=1;
        foreach ($leadform_master as $value) {
            $master_data = $this->db->get_where('tb_master', array('id' => $value['pro_master_id']))->row();
            $question = $this->db->select('question')->where_in('id',explode(',',$value['question_ids']))->get('tb_question_master')->result_array();
            $question_names=[];
            foreach($question as $ques){
                $question_names[]=$ques['question'];
            }
            $button = '<a href="'.base_url('admin/LeadFormMaster/edit/' .$value['id']).'" class="action-icon edit-btn"><i class="mdi mdi-square-edit-outline text-warning"></i></a>
					<a href="'.base_url('admin/LeadFormMaster/delete/' .$value['id']).'" class="action-icon delete-btn"> <i class="mdi mdi-delete text-danger"></i></a>';
            $result['data'][] = array(
                $i++,
                $master_data->name,
                implode(', ',$question_names),
                $value['status'],
                $button
            );
        }
        echo json_encode($result);
    }

    public function add()
    {
        //for fetch Question
        $query = $this->db->get('tb_question_master');
        $data['question'] = $query->result_array();
        $data['master'] = $this->leadform->getPromaster();
        $data['page_name'] = 'leadform_master_add';
        $this->load->view('admin/index', $data);

    }
    public function store()
    {
        $this->form_validation->set_rules('question_ids[]', 'Question','required');
        $this->form_validation->set_rules('pro_master_id', 'Master','required');
        $this->form_validation->set_rules('status', 'Status','required');
        if ($this->form_validation->run() == false) {
            $this->add();
        } else {
            $formArray = array();
            $formArray['question_ids'] = implode(',',$this->input->post('question_ids'));
            $formArray['pro_master_id'] = $this->input->post('pro_master_id');
            $formArray['status'] = $this->input->post('status');

            $record = $this->leadform->count_master($formArray['pro_master_id']);

            if($record == '0'){
                $response = $this->leadform->saverecords($formArray);

                if ($response == true) {
                    $this->session->set_flashdata('success', 'Lead Form Master Added Successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Please try again');
                }
                return redirect('admin/LeadFormMaster/');
            }else{
                echo "<script>
                        $('.error_msg').html(response.message);
                     </script>";
                $this->session->set_flashdata('error', 'Master already exists.');
                return redirect('admin/LeadFormMaster/');
            }
        }
    }

    public function edit($id)
    {
        $data = array();
        $data['leadform'] = $this->leadform->getLeadFormmaster($id);
        $data['master'] = $this->leadform->getPromaster();
        $data['question'] = $this->leadform->getQuestion();
        $data['page_name'] = 'leadform_master_edit';
        $this->load->view('admin/index', $data);

    }

    public function update($id)
    {
        $this->form_validation->set_rules('question_ids[]', 'Question','required');
        $this->form_validation->set_rules('pro_master_id', 'Master','required');
        $this->form_validation->set_rules('status', 'Status','required');

        if ($this->form_validation->run() == false) {
            $this->edit($id);
        }else{
            $formArray = array();
            $formArray['question_ids'] = implode(',',$this->input->post('question_ids'));
            $formArray['pro_master_id'] = $this->input->post('pro_master_id');
            $formArray['status'] = $this->input->post('status');

            $response = $this->leadform->updaterecords($id,$formArray);

            if ($response == true) {
                $this->session->set_flashdata('success','Lead Form Master Updated Successfully.');
            } else {
                $this->session->set_flashdata('error','Something went wrong. Please try again');
            }
            return redirect('admin/LeadFormMaster/');
        }
    }


    public function delete($id)
    {
        $response = $this->leadform->delete($id);

        if($response == true)
        {
            $this->session->set_flashdata('success', 'Lead Form Master Deleted Successfully.');
        }else{
            $this->sesssion->set_flashdata('error','Something went wrong. Please try again');
        }
        return redirect('admin/LeadFormMaster/');


    }

}
