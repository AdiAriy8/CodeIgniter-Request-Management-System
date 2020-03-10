<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_user extends CI_Model
{
    // validate email & validate no_telp
    public function validate_user($email, $no_telp){
        $where = "deleted_at IS NULL";
        $this->db->where('email', $email);
        $this->db->or_where('no_telp', $no_telp);
        $this->db->where($where);
        $query = $this->db->get('user');
        if ($query->num_rows()) {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Email / No.Telp telah terdaftar');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function validate_phone($id, $no_telp){
        $where = "deleted_at IS NULL and id != $id";
        $this->db->where('no_telp', $no_telp);
        $this->db->where($where);
        $query = $this->db->get('user');
        if ($query->num_rows()) {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'No.Telp telah terdaftar');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    // get all data user
    public function getUser(){
        $deleted_at = "deleted_at IS NULL";
        $this->db->select('user.id, user.nama, user.alamat, user.perusahaan, user.email, user.group, user.no_telp, group.name');
        $this->db->join('group', 'group.id = user.group');
        $this->db->where($deleted_at);
        $query = $this->db->get('user');
        return $query;
    }

    // get list group
    public function getListGroup(){
        $query = $this->db->get('group');
        return $query;
    }

    // get spesific group
    public function getSpesific($group){
        $deleted_at = "deleted_at IS NULL AND user.group = ".$group;
        $this->db->select('user.id, user.nama, user.alamat, user.perusahaan, user.email, user.group, user.no_telp, group.name');
        $this->db->join('group', 'group.id = user.group');
        $this->db->where($deleted_at);
        $query = $this->db->get('user');
        return $query;
    }

    public function insert($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil menambahkan user baru');
        }else{
            $this->session->set_flashdata('status', 'failser');
            $this->session->set_flashdata('messages', 'Gagal menambahkan user baru');
        }
    }

    public function softDelete($id){
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('user');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil mengahapus user');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal mengahapus user');
        }
    }

    public function get($id){
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $ret = $query->row();
        return $ret;
    }

    public function update($data){    
        $this->db->where('id', $this->input->post('id'));
        $this->db->set($data);
        $this->db->update('user');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil memperbarui data user');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal memperbarui data user');
        }
    }
    
}
