<?php
defined('BASEPATH') or exit('No direct script access allowed');


class BrandController extends CI_Controller
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
        $this->load->view('brand/list');
        $this->load->view('admin_template/footer');
    }

    public function create()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->view('brand/create');
        $this->load->view('admin_template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'You must provide a %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'You must provide a %s']);
        $this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'You must provide a %s']);

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'slug' => $this->input->post('slug'),
                'status' => $this->input->post('status'),
            ];
            $this->load->model('BrandModel');
            $this->BrandModel->insertBrand($data);
            $this->session->set_flashdata('message', 'Add success');
            redirect(base_url('brand/create'));
        } else {
            $this->create();
        }
    }
}
