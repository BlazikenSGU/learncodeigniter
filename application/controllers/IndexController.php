<?php
defined('BASEPATH') or exit('No direct script access allowed');


class IndexController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		$this->load->library('cart');
		$this->load->library('pagination');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
	}

	public function index()
	{

		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/pagination';
		$config['total_rows'] = ceil($this->IndexModel->countAllProduct()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		var_dump($config['total_rows']);
		$config["per_page"] = 3; //từng trang 3 sản phẩn
		$config["uri_segment"] = 2; //lấy số trang hiện tại
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0; //current page active 
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproduct_pagination'] = $this->IndexModel->getIndexPagination($config["per_page"], $this->page);
		// //pagination


		$this->config->config['pageTitle'] = 'Shop TF Futsal';
		// $this->data['allproduct'] = $this->IndexModel->getAllProduct();
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{
		$this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{
		$this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{

		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		$this->data['title'] = $this->IndexModel->getProductTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/product_details', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function cart()
	{
		$this->config->config['pageTitle'] = 'Cart';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}

	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_details'] = $this->IndexModel->getProductDetails($product_id);

		//dat hang
		foreach ($this->data['product_details'] as $key => $pro) {
			$cart = array(
				'id' => $pro->id,
				'qty' => $quantity,
				'price' => $pro->price,
				'name' => $pro->title,
				'options' => array('image' => $pro->image),
			);
		}
		$this->cart->insert($cart);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function delete_all_cart()
	{
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	public function delete_item($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function update_cart_item()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');

		foreach ($this->cart->contents() as $items) {
			if ($rowid == $items['rowid']) {
				$cart = array(
					'rowid' => $rowid,
					'qty' => $quantity,
				);
			}
		}
		$this->cart->update($cart);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function checkout()
	{
		$this->config->config['pageTitle'] = 'Checkout Payment';
		if ($this->session->userdata('LoggedInCustomer') && $this->cart->contents()) {
			$this->load->view('pages/template/header', $this->data);
			$this->load->view('pages/checkout');
			$this->load->view('pages/template/footer');
		} else {
			redirect(base_url('/gio-hang'));
		}
	}

	public function confirmCheckout()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('shipMethod', 'ShipMethod', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run() == TRUE) {

			$email = $this->input->post('email');
			$shipMethod = $this->input->post('shipMethod');
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');

			$data = array(
				'email' => $email,
				'name' => $name,
				'method' => $shipMethod,
				'phone' => $phone,
				'address' => $address,
			);

			$this->load->model('LoginModel');
			$result = $this->LoginModel->newShipping($data);
			if ($result) {

				//order
				$order_code = rand(00, 9999);
				$data_order = array(
					'order_code' => $order_code,
					'ship_id' => $result,
					'status' => 1
				);

				$insert_order = $this->LoginModel->insert_order($data_order);

				//order_details
				foreach ($this->cart->contents() as $item) {
					$data_order_details = array(
						'order_code' => $order_code,
						'product_id' => $item['id'],
						'quantity' => $item['qty'],
					);

					$insert_order_details = $this->LoginModel->insert_order_details($data_order_details);
				}

				$this->session->set_flashdata('success', 'DONE !');
				$this->cart->destroy();
				redirect(base_url('/thanks'));
			} else {
				$this->session->set_flashdata('error', 'PAYMENT FAILLL');
				redirect(base_url('/checkout'));
			}
		} else {
			$this->checkout();
		}
	}

	public function login()
	{
		$this->config->config['pageTitle'] = 'Login User | Register User';
		$this->load->view('pages/template/header');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Logout success');
		redirect(base_url('/dang-nhap'));
	}

	public function login_customer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$this->load->model('LoginModel');
			$result = $this->LoginModel->checkLoginCustomer($email, $password);

			if ($result) {
				$session_array = [
					'id' => $result[0]->id,
					'username' => $result[0]->name,
					'email' => $result[0]->email,
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'LOGIN SUCCESS');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'WRONG EMAIL OR PASSWORD');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function signup()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'You must provide a %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'You must provide a %s']);

		if ($this->form_validation->run()) {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');

			$data = array(
				'email' => $email,
				'name' => $name,
				'password' => $password,
				'phone' => $phone,
				'address' => $address,
			);


			$this->load->model('LoginModel');
			$result = $this->LoginModel->newCustomer($data);

			if ($result) {
				$session_array = [
					'username' => $name,
					'email' => $email,
				];
				$this->session->set_userdata('LoggedInCustomer', $session_array);
				$this->session->set_flashdata('success', 'LOGIN SUCCESS');
				redirect(base_url('/checkout'));
			} else {
				$this->session->set_flashdata('error', 'WRONG EMAIL OR PASSWORD');
				redirect(base_url('/dang-nhap'));
			}
		} else {
			$this->login();
		}
	}

	public function thanks()
	{
		$this->config->config['pageTitle'] = 'Thanks';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');
	}
	public function tim_kiem()
	{
		$keyword2 = '';
		if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
			$keyword = $_GET['keyword'];
		}
		$this->data['product'] = $this->IndexModel->getProductyKeyword($keyword);
		$this->data['title'] = $keyword;
		$this->data['no_product'] = $keyword2;
		$this->config->config['pageTitle'] = 'Search: ' . $keyword;
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/search', $this->data);
		$this->load->view('pages/template/footer');
	}
}
