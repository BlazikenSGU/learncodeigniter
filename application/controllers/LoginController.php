<?php
defined('BASEPATH') or exit('No direct script access allowed');


class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('login/index');
		$this->load->view('template/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run()) {

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('LoginModel');

			$result = $this->LoginModel->checkLogin($email, $password);

			if ($result) {
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->username,
					'email' => $result[0]->email,
				];
				$this->session->set_userdata('LoggedIn', $session_array);
				$this->session->set_flashdata('success', 'LOGIN SUCCESS');
				redirect(base_url('/dashboard'));
			} else {
				$this->session->set_flashdata('error', 'WRONG EMAIL OR PASSWORD');
				redirect(base_url('login'));
			}
		} else {
			$this->index();
		}
	}

	public function register_admin()
	{
		$this->load->view('template/header');
		$this->load->view('register_admin/index');
		$this->load->view('template/footer');
	}

	public function register_insert()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run()) {

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$data  = [
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'status' => 1
			];

			$this->load->model('LoginModel');
			$result = $this->LoginModel->registerAdmin($data);

			if ($result) {


				$this->session->set_flashdata('success', 'register admin SUCCESS');
				redirect(base_url('/register-admin'));
			} else {
				$this->session->set_flashdata('error', 'WRONG');
				redirect(base_url('/register-admin'));
			}
		} else {
			$this->index();
		}
	}
}
