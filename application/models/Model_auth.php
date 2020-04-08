<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_auth extends CI_Model
{
    public function validate_login($email, $password){
        $this->db->select('group.name as group_name, user.*');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->join('group', 'group.id = user.group');
        $query = $this->db->get('user');
        return $query;
    }

    public function check(){
        $data = $this->session->userdata('user');
        $this->db->where('email', $data['email']);
        $this->db->where('id', $data['id']);
        $this->db->where('group', $data['group']);
        $query = $this->db->get('user');
        if ($query->num_rows()) {
            $data['sess'] = $this->session->userdata('user');  
        }else{
            $this->session->unset_userdata('user');
            redirect('index.php');
        }   
        return $query;
    }
}
