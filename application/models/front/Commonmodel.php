<?php
class Commonmodel extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function getDataById($table,$post){
        $fields = $post['fields'] ?? array("*");
        $param = implode(',',$fields);
        $this->db->select($param);

        if(isset($post['field']) && isset($post['key'])){
            $this->db->where($post['field'], $post['key']);
        }
        if(isset($post['parameter']) && $post['parameter'] != ''){
            foreach ($post['parameter'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        $query = $this->db->get($table);
        return $query->row_array();
    }

    public function getDataByParam($table,$post){
        $fields = $post['fields'] ?? array("*");
        $param = implode(',',$fields);

        $this->db->select($param);
        if(!empty($post['by']) && !empty($post['key'])){
            $this->db->where($post['by'], $post['key']);
        }
        if(isset($post['parameter']) && $post['parameter'] != ''){
            foreach ($post['parameter'] as $key => $value){
                $this->db->where($key, $value);
            }
        }
        if(isset($post['like']) && $post['like'] != ''){
            foreach ($post['like'] as $value){
                $this->db->like(array_keys($value)[0], array_values($value)[0],'both');
            }
        }
        if(isset($post['orderby']) && $post['orderby'] != ''){
            foreach ($post['orderby'] as $key => $value){
                $this->db->order_by($key, $value);
            }
        }
        if(isset($post['limit']) && $post['limit'] != ''){
            $this->db->limit($post['limit']);
        }
        if(isset($post['or']) && ($post['or']) != ''){
            foreach ($post['or'] as $k => $v)
            {
                $this->db->where_in($k, $v);
            }
        }
        $query = $this->db->get($table);
//		echo $this->db->last_query(); exit;
        return $query->result_array();
    }
}
?>
