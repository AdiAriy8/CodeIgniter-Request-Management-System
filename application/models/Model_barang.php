<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_barang extends CI_Model
{

    public function getBarang(){
        $deleted_at = "barang.deleted_at IS NULL";
        $this->db->select('user.nama as supplier, barang.*');
        $this->db->where($deleted_at);
        $this->db->join('user', 'user.id = barang.id_supplier');
        $query = $this->db->get('barang');
        return $query;
    }

    public function getBarangSupplier($id_supplier){
        $deleted_at = "barang.deleted_at IS NULL";
        $this->db->select('user.nama as supplier, barang.*');
        $this->db->where($deleted_at);
        $this->db->where('barang.id_supplier', $id_supplier);
        $this->db->join('user', 'user.id = barang.id_supplier');
        $query = $this->db->get('barang');
        return $query;
    }

    public function insert($data){
        $this->db->insert('barang', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil menambahkan barang baru');
        }else{
            $this->session->set_flashdata('status', 'failser');
            $this->session->set_flashdata('messages', 'Gagal menambahkan barang baru');
        }
    }

    public function softDelete($id){
        $this->db->set('deleted_at', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('barang');
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil mengahapus barang');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal mengahapus barang');
        }
    }

    public function get($id){
        $this->db->where('id', $id);
        $query = $this->db->get('barang');
        $ret = $query->row();
        return $ret;
    }

    public function update($data){    
        $this->db->where('id', $data['id']);
        $this->db->update('barang', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil memperbarui data barang');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal memperbarui data barang');
        }
    }
    
}
