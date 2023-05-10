<?php
class Modal_model extends CI_model{

    public $db_name;

    public function __construct()
    {
        parent::__construct();
    }

    function getPosition(){
        $data = $this->db->get('tb_position_master')->result_array();
        return $data;
    }
    function getSourceData(){
        $data = $this->db->get('tb_source_master')->result_array();
        return $data;
    }
    function getStaff(){
        $data = $this->db->get('tbl_staff_master')->result_array();
        return $data;
    }
    function getAgent(){
        $data = $this->db->get('tb_agent_master')->result_array();
        return $data;
    }
}
