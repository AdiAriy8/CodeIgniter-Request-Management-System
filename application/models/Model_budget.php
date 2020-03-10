<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_budget extends CI_Model
{

    public function getBudget($year){
        $deleted_at = "budget.deleted_at IS NULL";
        $this->db->where($deleted_at);

        if(isset($year) && $year != ''){
            $this->db->where('year', $year);
        }

        $this->db->order_by('year ASC','month ASC');
        $query = $this->db->get('budget');
        return $query;
    }
    
    public function get($id){
        $this->db->where('id', $id);
        $query = $this->db->get('budget');
        $ret = $query->row();
        return $ret;
    }

    public function validate($year, $month){
        $deleted_at = "budget.deleted_at IS NULL";
        $this->db->where($deleted_at);
        $this->db->where('year', $year);
        $this->db->where('month', $month);
        $query = $this->db->get('budget');
        $ret = $query->row();
        return $ret;
    }

    public function update($data){    
        $this->db->where('id', $data['id']);
        $this->db->update('budget', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil memperbarui data budget');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal memperbarui data budget');
        }
    }

    public function softDelete($id){
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('budget');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil mengahapus budget');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal mengahapus budget');
        }
    }

    public function insert($data){
        $this->db->insert('budget', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil menambahkan budget baru');
        }else{
            $this->session->set_flashdata('status', 'failser');
            $this->session->set_flashdata('messages', 'Gagal menambahkan budget baru');
        }
    }
}
