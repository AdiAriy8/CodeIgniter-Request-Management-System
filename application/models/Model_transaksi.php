<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_transaksi extends CI_Model
{

    public function getTransaki(){
        $this->db->select('request.*, kirim.tgl_kirim, user.nama as nama_staff, supplier.nama as nama_supplier');
        $this->db->join('kirim','kirim.id_request = request.id','left outer');
        $this->db->join('user','user.id = request.id_staff');
        $this->db->join('user as supplier','supplier.id = request.id_supplier');
        $query = $this->db->get('request');
        return $query;
    }

    public function getCustomTransaki($start_date, $end_date, $status){
        $this->db->select('request.*, kirim.tgl_kirim, user.nama as nama_staff, supplier.nama as nama_supplier');
        $this->db->join('kirim','kirim.id_request = request.id','left outer');
        $this->db->join('user','user.id = request.id_staff');
        $this->db->join('user as supplier','supplier.id = request.id_supplier');
        $this->db->where_in('request.status', $status);
        $this->db->order_by('request.id', 'ASC');


        if(isset($start_date) && $start_date != '' ){
            $this->db->where('request.tgl_request >= ', $start_date);
        }

        if(isset($end_date) && $end_date != '' ){
            $this->db->where('request.tgl_request <= ', $end_date);
        }
        
        $query = $this->db->get('request');
        return $query;
    }

    public function getTransakiUser($id, $type){
        $this->db->select('request.*, kirim.tgl_kirim, user.nama as nama_staff, supplier.nama as nama_supplier');
        $this->db->join('kirim','kirim.id_request = request.id','left outer');
        $this->db->join('user','user.id = request.id_staff');
        $this->db->join('user as supplier','supplier.id = request.id_supplier');

        if($type == 'staff'){
            $this->db->where('request.id_staff', $id);
        }else{
            $this->db->where('request.id_supplier', $id);
        }
        
        $query = $this->db->get('request');
        return $query;
    }

    public function get($id){
        $this->db->select('request.*, kirim.tgl_kirim, user.nama as nama_staff, supplier.nama as nama_supplier, supplier.alamat as alamat, supplier.email as email, supplier.perusahaan as perusahaan');
        $this->db->join('kirim','kirim.id_request = request.id','left outer');
        $this->db->join('user','user.id = request.id_staff');
        $this->db->join('user as supplier','supplier.id = request.id_supplier');
        $this->db->where('request.id', $id);
        $query = $this->db->get('request');
        $ret = $query->row();
        return $ret;
    }  
    
    public function getDetail($id){
        $this->db->select('request_detail.*, barang.nama, barang.harga as hbarang');
        $this->db->join('barang','barang.id = request_detail.id_barang');
        $this->db->where('request_detail.id_request', $id);
        $query = $this->db->get('request_detail');
        return $query;
    }

    public function getCart($id){
        $this->db->select('request_detail.*, barang.nama, barang.id_supplier');
        $this->db->join('barang','barang.id = request_detail.id_barang');
        $this->db->where('request_detail.id_staff', $id);
        $this->db->where('request_detail.status', 'cart');
        $query = $this->db->get('request_detail');
        return $query;
    }

    public function getCartStore($id_store){
        $this->db->select('request_detail.*, barang.nama, barang.id_supplier, barang.harga');
        $this->db->join('barang','barang.id = request_detail.id_barang');
        $this->db->where('barang.id_supplier', $id_store);
        $this->db->where('request_detail.status', 'cart');
        $query = $this->db->get('request_detail');
        return $query;
    }

    public function addCart($data){
        $this->db->insert('request_detail', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil menambahkan request barang baru');
        }else{
            $this->session->set_flashdata('status', 'failser');
            $this->session->set_flashdata('messages', 'Gagal menambahkan request barang baru');
        }
    }

    public function deleteCart($data){ 
        $this->db->where('id', $data['id']);
        $this->db->update('request_detail', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil menghapus request');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal menghapus request');
        }
    }

    public function orderCart($data, $id_staff, $id_barang){ 
        $this->db->where('id_staff', $id_staff);
        $this->db->where('status', 'cart');
        $this->db->where_in('id_barang', $id_barang);
        $this->db->update('request_detail', $data);
    }

    public function CreateTrx($data){
        $this->db->insert('request', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getListTrx($id, $type, $status){
        $this->db->select('request.*, kirim.tgl_kirim, user.nama as nama_staff, supplier.nama as nama_supplier');
        $this->db->join('kirim','kirim.id_request = request.id','left outer');
        $this->db->join('user','user.id = request.id_staff');
        $this->db->join('user as supplier','supplier.id = request.id_supplier');
        
        if($status == 'Finish'){
            $this->db->where_in('status', ['Reject_By_Supplier','Reject_By_Staff', 'Received'] );
        }else{
            $this->db->where('status', $status);
        }

        if($type == 'staff'){
            $this->db->where('request.id_staff', $id);
        }else{
            $this->db->where('request.id_supplier', $id);
        }
        
        $query = $this->db->get('request');
        return $query;
    }

    public function CountYear($year){
        $query = $this->db->query("SELECT SUM( total ) AS total, MONTH ( tgl_request ) 'bulan', DATE_FORMAT( tgl_request, '%b' ) AS 'bln'  FROM request  WHERE YEAR ( tgl_request ) = ".$year." AND request.`status` = 'Received' GROUP BY YEAR ( tgl_request ), MONTH ( tgl_request )");   
        return $query;
    }

    public function ChangeStatus($data){ 
        $this->db->where('id', $data['id']);
        $this->db->update('request', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil memperbarui status request');
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Gagal memperbarui status request');
        }
    }

    public function SendOrder($data){
        $this->db->insert('kirim', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil kirim barang');
        }else{
            $this->session->set_flashdata('status', 'failser');
            $this->session->set_flashdata('messages', 'Gagal kirim barang');
        }
    }
}
