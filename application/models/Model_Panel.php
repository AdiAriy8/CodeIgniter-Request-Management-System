<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Panel extends CI_Model
{
    public function CountStaff($type)
    {
        $this->db->where('group', $type);
        $query = $this->db->count_all_results('user');
        return $query;
    }

    public function Count($tabel)
    {
        $sess = $this->session->userdata('user');
        if ($tabel == 'barang') {
            $where = "deleted_at IS NULL";
            $this->db->where($where);
        } else if ($tabel == 'requestStaff') {
            $tabel = 'request';
            $this->db->where('id_staff', $sess['id']);
        }else if ($tabel == 'requestSupplier') {
            $tabel = 'request';
            $this->db->where('id_supplier', $sess['id']);
        }else if ($tabel == 'barangSupplier') {
            $tabel = 'barang';
            $where = "deleted_at IS NULL";
            $this->db->where($where);
            $this->db->where('id_supplier', $sess['id']);
        }

        $query = $this->db->count_all_results($tabel);
        return $query;
    }

    public function CountStatus($status, $sess)
    {
        switch ($sess['group']){
            case 1:
                $this->db->where('id_staff', $sess['id']);
                break;

            case 3:
                $this->db->where('id_supplier', $sess['id']);
                break;
        }

        if ($status == 'Reject') {
            $this->db->where_in('status', ['Reject_By_Supplier', 'Reject_By_Staff']);
        } else {
            $this->db->where('status', $status);
        }

        $query = $this->db->count_all_results('request');
        return $query;
    }
}
