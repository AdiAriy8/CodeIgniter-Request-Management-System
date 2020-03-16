<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');        
    }

    public function index()
    {
        $query = $this->Model_auth->check();
        if ($query->num_rows()) {
            $data['sess'] = $this->session->userdata('user');
            $data['value'] = $this->Model_user->getUser();
            $data['content'] = 'admin/user.php';
            $data['pages'] = 'User';
            $this->load_page($data);
        } else {
            $this->session->unset_userdata('user');
            redirect('index.php');
        }
    }

    public function setting()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $id = $data['sess']['id'];

        // get user
        $data['ret'] = $this->Model_user->get($id);
        $data['content'] = 'content/user_detail.php';
        $data['pages'] = 'Detail User';
        $this->load_page($data);
    }

    public function create()
    {
        $this->Model_auth->check();
        $data['group'] = $this->Model_user->getListGroup();

        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'admin/user_form.php';
        $data['pages'] = 'Create User';
        $this->load_page($data);
        
    }

    public function insert()
    {
        $query = $this->Model_auth->check();

        // validate password
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        if ($password != $repassword) {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Password tidak sesuai');
            redirect($_SERVER['HTTP_REFERER']);
        }

        // validate email & validate no_telp
        $this->Model_user->validate_user($this->input->post('email'), $this->input->post('no_telp'));

        // create user
        $data = array(
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'perusahaan' => $this->input->post('company'),
            'email' => $this->input->post('email'),
            'group' => $this->input->post('group'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => sha1($password),
        );

        // create user
        $this->Model_user->insert($data);
        redirect('index.php/User');
    }

    public function delete()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);

        // delete user
        $this->Model_user->softDelete($id);
        redirect('index.php/User');
    }

    public function get()
    {
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);
        $data['group'] = $this->Model_user->getListGroup();

        // get user
        $data['ret'] = $this->Model_user->get($id);
        $data['sess'] = $this->session->userdata('user');
        $data['content'] = 'admin/user_detail.php';
        $data['pages'] = 'Detail User';
        $this->load_page($data);
    }

    public function update()
    {
        $query = $this->Model_auth->check();

        // validate no_telp
        $this->Model_user->validate_phone($this->input->post('id'), $this->input->post('no_telp'));

        // update user
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'perusahaan' => $this->input->post('company'),
            'group' => $this->input->post('group'),
            'no_telp' => $this->input->post('no_telp'),
        );

        // validate password
        if ($this->input->post('password') != '') {
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            if ($password != $repassword) {
                $this->session->set_flashdata('status', 'failed');
                $this->session->set_flashdata('messages', 'Password tidak sesuai');
                redirect('index.php/User/get/' . $this->input->post('id'));
            }
            $data['password'] = sha1($password);
        }

        $this->Model_user->update($data);
        redirect('index.php/User');
    }

    public function updateStaff()
    {
        $this->Model_auth->check();

        // validate no_telp
        $this->Model_user->validate_phone($this->input->post('id'), $this->input->post('no_telp'));

        // update user
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'perusahaan' => $this->input->post('company'),
            'no_telp' => $this->input->post('no_telp'),
        );

        // validate password
        if ($this->input->post('password') != '') {
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            if ($password != $repassword) {
                $this->session->set_flashdata('status', 'failed');
                $this->session->set_flashdata('messages', 'Password tidak sesuai');
                redirect('index.php/User/get/' . $this->input->post('id'));
            }
            $data['password'] = sha1($password);
        }

        $this->Model_user->update($data);
        $this->reSession($data);
        redirect($_SERVER['HTTP_REFERER']);
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

    public function reSession()
    {
        $sess = $this->session->userdata('user');
        $id = $sess['id'];
        $ret = $this->Model_user->get($id);
        $user['id'] = $ret->id;
        $user['nama'] = $ret->nama;
        $user['alamat'] = $ret->alamat;
        $user['perusahaan'] = $ret->perusahaan;
        $user['email'] = $ret->email;
        $user['group'] = $ret->group;
        $user['no_telp'] = $ret->no_telp;
        $this->session->set_userdata('user', $user);
    }
}
