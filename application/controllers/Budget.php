<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Budget extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_budget');
    }

    public function index()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['value'] = $this->Model_budget->getBudget('');
        $data['content'] = 'admin/budget.php';
        $data['pages'] = 'Budgeting';
        $this->load_page($data);
    }

     public function get()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);
        $data['month'] = array(
            'januari','febuari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'
        );
        $data['ret'] = $this->Model_budget->get($id);
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'admin/budget_detail.php';
        $data['pages'] = 'Detail Budget';
        $this->load_page($data);
    }

    public function update()
    {
        $query = $this->Model_auth->check();
        $data = array(
            'id' => $this->input->post('id'),
            'budget' => $this->input->post('budget'),
            'year' => $this->input->post('year'),
            'month' => $this->input->post('month'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->Model_budget->update($data);
        redirect('index.php/Budget');
    }

    public function delete()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);
        $this->Model_budget->softDelete($id);
        redirect('index.php/Budget');
    }

    public function create()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'admin/budget_form.php';
        $data['pages'] = 'Create Budget';
        $data['month'] = array(
            'januari','febuari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'
        );
        $this->load_page($data);
    
    }

    public function insert()
    {
        $query = $this->Model_auth->check();

        // validate data
        $this->validate($this->input->post('year'), $this->input->post('month'));

        $data = array(
            'budget' => $this->input->post('budget'),
            'year' => $this->input->post('year'),
            'month' => $this->input->post('month'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->Model_budget->insert($data);
        redirect('index.php/budget');
    }

    public function load_page($data){
        $this->load->view('head.php');
        if(isset($data['type'])){
            if($data['type'] == 1){
                $data['type'] = "staff";
            }else if($data['type'] == 2){
                $data['type'] = "admin";
            }else if($data['type'] == 3){
                $data['type'] = "supplier";
            }
        }
        
        isset($data['type']) ? $this->load->view($data['type'] . '/index.php', $data) : $this->load->view('admin/index.php', $data);
        $this->load->view('footer.php');
    }

    function validate($year, $month){
        $ret = $this->Model_budget->validate($year, $month);
        if(isset($ret)){
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Data budget sudah ada');
            redirect($_SERVER['HTTP_REFERER']);
        }
        return;
    }
}
