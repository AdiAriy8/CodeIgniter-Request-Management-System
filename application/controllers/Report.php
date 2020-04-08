<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_transaksi');
    }

    public function index()
    {
        $this->Model_auth->check();
        $query = $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'report/main.php';
        $data['pages'] = 'Report';
        $data['status'] = array();
        $this->load_page($data);
    }

    public function generate()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');

        // get input
        $data['start_date'] = $this->input->post('start_date');
        $data['end_date'] = $this->input->post('end_date');
        $data['status'] = array($this->input->post('Process'), $this->input->post('Send'), $this->input->post('Received'), $this->input->post('CancelStaff'), $this->input->post('CancelSupplier'), $this->input->post('New'));
        
        // get data transaksi
        $data['value'] = $this->Model_transaksi->getCustomTransaki($data['start_date'], $data['end_date'], $data['status']);

        // validate form
        if($this->input->post('Generate')){
            $data['title'] = "Laporan Transaksi";
            $data['site_title'] = site_title;
        
            $this->load->library('Pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "Laporan Transaksi.pdf";
            $this->pdf->load_view('report/generate_laporan', $data);

        }else{
            $data['content'] = 'report/main.php';
            $data['pages'] = 'Report';
            $this->load_page($data);
        }
    }

    public function load_page($data)
    {
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
