<?php
defined('BASEPATH') or exit('No direct script access allowed');


class PostController extends CI_Controller
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
		$data['post'] = $this->BlogModel->selectAllPost();

		$this->load->view('posts/list', $data);
		$this->load->view('admin_template/footer');
	}

	public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('BlogModel');
		$data['blog2'] = $this->BlogModel->selectBlog();

		$this->load->view('posts/create', $data);
		$this->load->view('admin_template/footer');
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('content', 'Content', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('short_content', 'Short Content', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run() == TRUE) {

			//upload image
			$ori_filename  = $_FILES['image']['name'];

			$new_name =  time() . "" . str_replace(' ', '-', $ori_filename);
			$config = [
				'upload_path' => './uploads/post',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('posts/create', $error);
				$this->load->view('admin_template/footer');
			} else {
				$post_filename = $this->upload->data('file_name');
				$data = [
					'title' => $this->input->post('title'),
					'short_content' => $this->input->post('short_content'),
					'content' => $this->input->post('content'),
					'slug' => $this->input->post('slug'),
					'status' => $this->input->post('status'),
					'date_created' => Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
					'blog_id' => $this->input->post('blog_id'),
					'image' => $post_filename
				];
				$this->load->model('BlogModel');
				$this->BlogModel->insertPost($data);
				$this->session->set_flashdata('success', 'Add success');
				redirect(base_url('post/list'));
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
		$data['post'] = $this->BlogModel->selectPostById($id);

		$this->load->model('BlogModel');
		$data['blog2'] = $this->BlogModel->selectBlog();

		$this->load->view('posts/edit', $data);
		$this->load->view('admin_template/footer');
	}

	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('content', 'Content', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('short_content', 'Short Content', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run() == TRUE) {

			if (!empty($_FILES['image']['name'])) {

				//upload image
				$ori_filename  = $_FILES['image']['name'];
				$new_name =  time() . "" . str_replace(' ', '-', $ori_filename);
				$config = [
					'upload_path' => './uploads/post',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $new_name,
				];
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('admin_template/header');
					$this->load->view('admin_template/navbar');
					$this->load->view('posts/create', $error);
					$this->load->view('admin_template/footer');
				} else {
					$post_filename = $this->upload->data('file_name');
					$data = [
						'title' => $this->input->post('title'),
						'short_content' => $this->input->post('short_content'),
						'content' => $this->input->post('content'),
						'slug' => $this->input->post('slug'),
						'status' => $this->input->post('status'),
						'date_created' => Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
						'blog_id' => $this->input->post('blog_id'),
						'image' => $post_filename
					];
				}
			} else {
				$data = [
					'title' => $this->input->post('title'),
					'short_content' => $this->input->post('short_content'),
					'content' => $this->input->post('content'),
					'slug' => $this->input->post('slug'),
					'status' => $this->input->post('status'),
					'date_created' => Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
					'blog_id' => $this->input->post('blog_id'),

				];
			}
			$this->load->model('BlogModel');
			$this->BlogModel->updatePost($id, $data);
			$this->session->set_flashdata('success', 'Update success');
			redirect(base_url('post/list'));
		} else {
			$this->edit($id);
		}
	}

	public function delete($id)
	{
		$this->load->model('BlogModel');
		$this->BlogModel->deletePost($id);
		$this->session->set_flashdata('success', 'Delete success');
		redirect(base_url('post/list'));
	}
}
