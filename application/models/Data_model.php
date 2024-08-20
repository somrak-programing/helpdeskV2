<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_model extends CI_Model {

        public function all()
        {
                $query = $this->db->get('tbl_case');
                return $query->result();
        }

        public function insert_case()
        {
                $filename = $this->upload->file_name;
                $data = array(
                        'case_type' => $this->input->post('case_type'),
                        'case_detail' => $this->input->post('case_detail'),
                        'case_loc' => $this->input->post('case_loc'),
                        'p_name' => $this->input->post('p_name'),
                        'p_email' => $this->input->post('p_email'),
                        'p_img' => $filename
                );
                $this->db->insert('tbl_case', $data);
        }

        public function lastid($p_email)
        {
                $this->db->select_max('id');
                $this->db->from('tbl_case c');
                $this->db->where('c.p_email',$p_email);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }



        public function get_detail($id){
                $this->db->select('c.*');
                $this->db->from('tbl_case c');
                $this->db->where('c.id',$id);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


}