<?php
defined('BASEPATH') or exit('No direct script access allowed');


class OrderController extends CI_Controller
{

    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
    }

    public function index()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order'] = $this->OrderModel->selectAllOrder();

        $this->load->view('order/list', $data);
        $this->load->view('admin_template/footer');
    }

    public function view($order_code)
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('OrderModel');
        $data['order_details'] = $this->OrderModel->selectOrderDetails($order_code);

        $this->load->view('order/view', $data);
        $this->load->view('admin_template/footer');
    }
}
