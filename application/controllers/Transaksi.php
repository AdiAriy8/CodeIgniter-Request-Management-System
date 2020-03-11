<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_transaksi');
        $this->load->model('Model_user');
        $this->load->model('Model_barang');
    }

    public function index()
    {
        $this->Model_auth->check();
        $query = $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['value'] = $this->Model_transaksi->getTransaki();
        $data['content'] = 'admin/transaksi.php';
        $data['pages'] = 'Transaksi';
        $this->load_page($data);
    }

    public function staff()
    {
        $this->Model_auth->check();
        $query = $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $uri = $this->uri->segment(3);

        // conditional page
        if ($uri) {
            switch ($uri) {
                case 'New':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'staff', $uri);
                    break;

                case 'Process':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'staff', $uri);
                    break;

                case 'Send':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'staff', $uri);
                    break;

                case 'Finish':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'staff', $uri);
                    break;

                default:
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'staff', 'New');

            }
            $data['content'] = 'staff/onGoingtransaksi.php';

        } else {
            $data['value'] = $this->Model_transaksi->getTransakiUser($data['sess']['id'], 'staff');
            $data['content'] = 'admin/transaksi.php';
        }

        $data['pages'] = 'Transaksi';

        $this->load_page($data);
    }

    public function supplier()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $uri = $this->uri->segment(3);

        // conditional page
        if ($uri) {
            switch ($uri) {
                case 'New':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'supplier', $uri);
                    break;

                case 'Process':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'supplier', $uri);
                    break;

                case 'Send':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'supplier', $uri);
                    break;

                case 'Finish':
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'supplier', $uri);
                    break;

                default:
                    $data['value'] = $this->Model_transaksi->getListTrx($data['sess']['id'], 'supplier', 'New');

            }
            $data['content'] = 'supplier/onGoingtransaksi.php';

        } else {
            $data['value'] = $this->Model_transaksi->getTransakiUser($data['sess']['id'], 'supplier');
            $data['content'] = 'admin/transaksi.php';
        }

        $data['pages'] = 'Transaksi';

        $this->load_page($data);
    }

    public function requeststaff()
    {
        $this->Model_auth->check();
        $query = $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');
        $data['barang'] = $this->Model_barang->getBarang();
        $data['cart'] = $this->Model_transaksi->getCart($data['sess']['id']);
        $data['content'] = 'staff/request.php';
        $data['pages'] = 'Request Barang';
        $this->load_page($data);
    }

    public function DetailTransaksi()
    {
        $id = $this->uri->segment(3);
        $data['ret'] = $this->Model_transaksi->get($id); // get order
        $data['value'] = $this->Model_transaksi->getDetail($id); // get detail order
        $data['title'] = "Detail Transaksi";
        $data['site_title'] = site_title;

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Detail Transaksi.pdf";
        $this->pdf->load_view('report/transaksi_detail', $data);
    }

    public function get()
    {
        $data['sess'] = $this->session->userdata('user');
        $data['type'] = $data['sess']['group'];
        $query = $this->Model_auth->check();
        $id = $this->uri->segment(3);

        $data['ret'] = $this->Model_transaksi->get($id); // get order
        $data['value'] = $this->Model_transaksi->getDetail($id); // get detail order
        $data['nextstatus'] = $this->validateStatus($data['ret']->status); // validate status and group type

        $data['content'] = 'admin/transaksi_detail.php';
        $data['pages'] = 'Detail Transaksi';
        $this->load_page($data);
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

    public function addCart()
    {
        $this->Model_auth->check();
        $data['sess'] = $this->session->userdata('user');

        // validate data barang
        $barang = $this->Model_barang->get($this->input->post('id_barang'));
        if (isset($barang->id)) {
            $data = array(
                'id_barang' => $barang->id,
                'qty' => $this->input->post('qty'),
                'status' => 'cart',
                'id_staff' => $data['sess']['id'],
                'harga' => $barang->harga,
            );
            $this->Model_transaksi->addCart($data);
        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Barang tidak ditemukan');
        }
        redirect('index.php/Transaksi/requeststaff');
    }

    public function deleteCart()
    {
        $this->Model_auth->check();
        $data = array(
            'id' => $this->input->post('id_det_request'),
            'status' => 'deleted',
        );
        $this->Model_transaksi->deleteCart($data);
        redirect('index.php/Transaksi/requeststaff');
    }

    public function CreateRequest()
    {
        $this->Model_auth->check();
        $store = array();
        $sess = $this->session->userdata('user');

        // check list barang
        $cart = $this->Model_transaksi->getCart($sess['id']);
        if ($cart->num_rows()) {

            // assign to list store
            foreach ($cart->result_array() as $row) {
                array_push($store, $row['id_supplier']);
            }

            // remove duplicate store
            $store = array_unique($store);

            // loop insert request
            foreach ($store as $value) {

                // get cart based on store
                $sub_total = 0;
                $id_barang = array();
                $cart_store = $this->Model_transaksi->getCartStore($value);
                foreach ($cart_store->result_array() as $row) {
                    // get sub total
                    $sub_total += ($row['harga'] * $row['qty']);

                    // grouping id_barang
                    array_push($id_barang, $row['id_barang']);
                }

                // create head order
                $data = array(
                    'id_staff' => $sess['id'],
                    'id_supplier' => $value,
                    'status' => 'New',
                    'tgl_request' => date("Y-m-d"),
                    'noted' => $this->input->post('noted'),
                    'total' => $sub_total,
                );

                $inserted_id = $this->Model_transaksi->CreateTrx($data);
                if ($inserted_id) {

                    // update request detail
                    $data_barang = array(
                        'id_request' => $inserted_id,
                        'status' => 'order',
                    );
                    $this->Model_transaksi->orderCart($data_barang, $sess['id'], $id_barang);
                } else {
                    $this->session->set_flashdata('status', 'failed');
                    $this->session->set_flashdata('messages', 'Gagal memproses transaksi, silahkan coba beberapa saat lagi');
                    redirect('index.php/Transaksi/requeststaff');
                }
            }

            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('messages', 'Berhasil melakukan request baru');
            redirect('index.php/Transaksi/staff');

        } else {
            $this->session->set_flashdata('status', 'failed');
            $this->session->set_flashdata('messages', 'Barang tidak boleh kosong');
            redirect('index.php/Transaksi/requeststaff');
        }
    }

    public function ChangeStatus()
    {
        $this->Model_auth->check();
        $sess = $this->session->userdata('user');

        $status = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        // validate status
        if ($status == 'reject') {
            switch ($sess['group']) {
                case 1:
                    $next_status = 'Reject_By_Staff';
                    break;

                case 3:
                    $next_status = 'Reject_By_Supplier';
                    break;
            }

        } else {
            $next_status = $status;
        }

        // update status
        $data = array(
            'id' => $id,
            'status' => $next_status,
        );

        if ($next_status == 'Received') {
            $data['tgl_selesai'] = date("Y-m-d");
        }
        $this->Model_transaksi->ChangeStatus($data);

        if ($next_status == 'Send') {
            // insert data pengiriman
            $send = array(
                'id_supplier' => $sess['id'],
                'id_request' => $id,
                'tgl_kirim' => date("Y-m-d"),
            );
            $this->Model_transaksi->SendOrder($send);
        }

        if ($sess['group'] == 1) {
            redirect('index.php/Transaksi/staff');
        } else {
            redirect('index.php/Transaksi/supplier');
        }

    }
    // validate status and group type
    public function validateStatus($status)
    {
        $sess = $this->session->userdata('user');
        switch ($status) {
            case 'New':
                if ($sess['group'] == 3) {
                    return 'Process';
                }
                break;

            case 'Process':
                if ($sess['group'] == 3) {
                    return 'Send';
                }
                break;

            case 'Send':
                if ($sess['group'] == 1) {
                    return 'Received';
                }
                break;
        }
    }
}
