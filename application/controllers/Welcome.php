<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Welcome extends CI_Controller 
{
	public function index()
	{

		$this->load->model('IndexModel');
		$data['allproduct'] = $this->IndexModel->getallproduct();
		var_dump($data);

		$this->load->view('layout');
	}
}
