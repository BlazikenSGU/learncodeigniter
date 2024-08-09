<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');


class BlogController extends CI_Controller
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

		$this->load->model('BlogModel');
		$data['blog'] = $this->BlogModel->selectBlog();

		$this->load->view('blog/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('blog/create');
		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run() == TRUE) {

			//upload image
			$ori_filename  = $_FILES['image']['name'];

			$new_name =  time() . "" . str_replace(' ', '-', $ori_filename);
			$config = [
				'upload_path' => './uploads/blog',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('blog/create', $error);
				$this->load->view('admin_template/footer');
			} else {
				$blog_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'slug' => $this->input->post('slug'),
					'status' => $this->input->post('status'),
					
					'image' => $blog_filename
				];
				$this->load->model('BlogModel');
				$this->BlogModel->insertBlog($data);
				$this->session->set_flashdata('success', 'Add success');
				redirect(base_url('blog/list'));
			}
		} else {
			$this->create();
		}
	}

	public function edit($id)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->model('BlogModel');
		$data['blog'] = $this->BlogModel->selectBlogById($id);
		$this->load->view('blog/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run() == TRUE) {

			if (!empty($_FILES['image']['name'])) {

				//upload image
				$ori_filename  = $_FILES['image']['name'];
				$new_name =  time() . "" . str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/blog',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('admin_template/header');
					$this->load->view('admin_template/navbar');
					$this->load->view('blog/create', $error);
					$this->load->view('admin_template/footer');
				} else {
					$blog_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'slug' => $this->input->post('slug'),
						'status' => $this->input->post('status'),
						
						'image' => $blog_filename
					];
				}
			} else {
				$data = [
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'slug' => $this->input->post('slug'),
					'status' => $this->input->post('status'),
					

				];
			}
			$this->load->model('BlogModel');
			$this->BlogModel->updateBlog($id, $data);
			$this->session->set_flashdata('success', 'Update success');
			redirect(base_url('blog/list'));
		} else {
			$this->edit($id);
		}
	}

	public function delete($id)
	{
		$this->load->model('BlogModel');
		$this->BlogModel->deleteBlog($id);
		$this->session->set_flashdata('success', 'Delete success');
		redirect(base_url('blog/list'));
	}
}
