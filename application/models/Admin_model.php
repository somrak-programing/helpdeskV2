<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {

        public function fetch_user_login($username,$password)
        {
                $this->db->where('admin_email',$username);
                $this->db->where('admin_pwd',$password);
                $query = $this->db->get('tbl_admin');
                return $query->row();
        }

}