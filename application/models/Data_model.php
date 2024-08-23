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

        public function update_job()
        {
                //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
                //date_default_timezone_set('Asia/Bangkok');
                //index.php
                //https://www.codexworld.com/how-to/change-timezone-in-codeigniter/
                $data = array(
                    'case_status' => $this->input->post('case_status'),
                    'tech_id' => $this->input->post('tech_id'),
                    'tech_name' => $this->input->post('tech_name'),
                    'case_update_log' => $this->input->post('case_update_log'),
                    'case_update' => date('Y-m-d H:i:s')
                );
                $this->db->where('id', $this->input->post('id'));
                $query=$this->db->update('tbl_case',$data);
        }

        //count by status 1
        public function status1()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus1');
                $this->db->from('tbl_case');
                $this->db->where('case_status',1);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

        //count by status 2
        public function status2()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus2');
                $this->db->from('tbl_case');
                $this->db->where('case_status',2);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


        //count by status 3
        public function status3()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus3');
                $this->db->from('tbl_case');
                $this->db->where('case_status',3);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }


        //count by status 4
        public function status4()
        {
                $this->db->select('case_status, COUNT(id) AS totalstatus4');
                $this->db->from('tbl_case');
                $this->db->where('case_status',4);
                $query = $this->db->get();
                if($query->num_rows() > 0){
                        $data = $query->row();
                        return $data;
                }
                return FALSE;
        }

      //query by status  
      // *function นี้ลืมพูดถึง เอาไปใส่ใน data_model ด้วยนะครับ เอาไว้สำหรับ query ข้อมูลแยกตามสถานะ ถูกเรียกใช้งานกับ Jobs/bystatus
        public function by_status($status_id)
        {
            $this->db->where('case_status',$status_id);
            $query = $this->db->get('tbl_case');
            return $query->result();
        }


}