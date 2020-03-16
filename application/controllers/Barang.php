<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
    }

    public function index()
    {
        $this->Model_auth->check();
        $query = $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['value'] = $this->Model_barang->getBarang();
        $data['content'] = 'admin/barang.php';
        $data['pages'] = 'Barang';
        $this->load_page($data);
    }

    public function staff()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['type'] = 'staff';
        $data['value'] = $this->Model_barang->getBarang();
        $data['content'] = 'content/barang.php';
        $data['pages'] = 'Barang';
        $this->load_page($data);
    }

    public function supplier()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['value'] = $this->Model_barang->getBarangSupplier($data['sess']['id']);
        $data['content'] = 'admin/barang.php';
        $data['pages'] = 'Barang';
        $this->load_page($data);
    }

    public function create()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'supplier/barang_form.php';
        $data['pages'] = 'Create Barang';
        $this->load_page($data);
    
    }

    public function insert()
    {
        $query = $this->Model_auth->check();
        $sess = $this->session->userdata('user');
        $data = array(
            'nama' => $this->input->post('name'),
            'harga' => $this->input->post('harga'),
            'desc' => $this->input->post('desc'),
            'id_supplier' => $sess['id']
        );
        $this->Model_barang->insert($data);
        redirect('index.php/Barang/supplier');
    }

    public function delete()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);
        $this->Model_barang->softDelete($id);
        redirect('index.php/Barang');
    }

    public function get()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);
        $data['ret'] = $this->Model_barang->get($id);
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'supplier/barang_detail.php';
        $data['pages'] = 'Detail Barang';
        $this->load_page($data);
    }

    public function update()
    {
        $query = $this->Model_auth->check();
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('name'),
            'harga' => $this->input->post('harga'),
            'desc' => $this->input->post('desc')
        );
        $this->Model_barang->update($data);
        redirect('index.php/Barang/supplier');
    }

    public function load_page($data){
        $this->load->view('head.php');
        $sess = $this->session->userdata('user');

        if (isset($sess)) {
            if ($sess['group'] == 1) {
                $data['type'] = "staff";
            } else if ($sess['group'] == 2) {
                $data['type'] = "admin";
            } else if ($sess['group'] == 3) {
                $data['type'] = "supplier";
            }
        }
        
        isset($data['type']) ? $this->load->view($data['type'] . '/index.php', $data) : $this->load->view('admin/index.php', $data);
        $this->load->view('footer.php');
    }
}
