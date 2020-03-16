<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user')) {
            $user = $this->session->userdata('user');

            switch ($user['group']) {
                case 1:{
                        redirect('index.php/Panel/staff');
                        break;
                    };
                case 2:{
                        redirect('index.php/Panel/admin');
                        break;
                    };
                case 3:{
                        redirect('index.php/Panel/supplier');
                        break;
                    };
            }
        } else {
            $this->load->view('head.php');
            $this->load->view('login.php');
            $this->load->view('footer.php');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $query = $this->Model_auth->validate_login($email, sha1($password));

        if ($query->num_rows()) {
            $ret = $query->row();
            $user['id'] = $ret->id;
            $user['nama'] = $ret->nama;
            $user['alamat'] = $ret->alamat;
            $user['perusahaan'] = $ret->perusahaan;
            $user['email'] = $ret->email;
            $user['group'] = $ret->group;
            $user['group_name'] = $ret->group_name;
            $user['no_telp'] = $ret->no_telp;
            $this->session->set_userdata('user', $user);
            $this->index();
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'username or password incorrect');
            $this->index();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('index.php');
    }

}
