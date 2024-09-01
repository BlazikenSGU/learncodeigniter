<?php

use Carbon\Carbon;

defined('BASEPATH') or exit('No direct script access allowed');


class IndexController extends CI_Controller
{

	public function checkLogin()
	{
		if (!$this->session->userdata('LoggedInCustomer')) {
			redirect(base_url('/dang-nhap'));
		}
	}


	public function __construct()
	{
		parent::__construct();
		$this->load->model('IndexModel');
		// $this->load->model('SliderModel');
		$this->load->library('cart');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->data['category'] = $this->IndexModel->getCategoryHome();
		$this->data['blog'] = $this->IndexModel->getBlogHome();
		$this->data['slider'] = $this->IndexModel->getSliderHome();
		$this->data['brand'] = $this->IndexModel->getBrandHome();
	}
	//$to_email, $title, $message
	public function send_mail($to_email, $title, $message)
	{
		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_user'] = 'truongnhat.nguyen.41@gmail.com';
		$config['smtp_pass'] = 'eevsknwmetgajtxe';
		$config['smtp_port'] = 465;
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		//config_mail
		$this->email->from('truongnhat.nguyen.41@gmail.com', 'Facebook');
		$this->email->to($to_email);
		// $this->email->cc('another@another-example.com'); // gui 1 ban copy cho 1 hoac nhieu nguoi
		// $this->email->bcc('them@their-example.com'); // gui 1 ban copy cho 1 hoac nhieu nguoi && se k thay info ng gui hay nguoi nhan

		$this->email->subject($title); // tieu de
		$this->email->message($message); //noi dung

		//send mail
		$this->email->send();
	}

	public function index()
	{
		// echo Carbon::now();
		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/pagination';
		$config['total_rows'] = ceil($this->IndexModel->countAllProduct()); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 6; //từng trang 3 sản phẩn
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
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1; //current page active 
		$offset = ($page - 1) * $config['per_page'];
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproduct_pagination'] = $this->IndexModel->getIndexPagination($config["per_page"], $offset); // lay san pham
		// //pagination

		$this->config->config['pageTitle'] = 'Shop TF Futsal';
		// $this->data['allproduct'] = $this->IndexModel->getAllProduct();


		//show san pham theo danh muc
		$this->data['item_categories'] = $this->IndexModel->ItemCategories();

		$this->load->view('pages/template/header2');
		$this->load->view('pages/template/sidebar', $this->data);
		// $this->load->view('pages/template/slider');


		$this->load->view('pages/home2', $this->data);
		$this->load->view('pages/template/footer2');
	}

	public function blog($id)
	{

		$this->data['slug'] = $this->IndexModel->getBlogSlug($id);
		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc-blog' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 3; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
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
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1; //current page active 
		$offset = ($page - 1) * $config['per_page'];
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// $this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePagination($id, $config["per_page"], $offset);
		// //pagination


		// $this->data['blog_product'] = $this->IndexModel->getBlogAll($id);
		$this->data['title'] = $this->IndexModel->getBlogTitle($id);
		$this->data['blog_with_id'] = $this->IndexModel->getBlogById($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/blog', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function category($id)
	{

		$this->data['slug'] = $this->IndexModel->getCategorySlug($id);
		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/danh-muc' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByCate($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 3; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
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
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1; //current page active 
		$offset = ($page - 1) * $config['per_page'];
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// $this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePagination($id, $config["per_page"], $offset);
		// //pagination

		//get min max price
		$this->data['min_price'] = $this->IndexModel->getMinProductPrice($id);
		$this->data['max_price'] = $this->IndexModel->getMaxProductPrice($id);

		//filter
		if (isset($_GET['kytu'])) {
			$kytu = $_GET['kytu'];
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCateKytuPagination($id, $kytu, $config["per_page"], $offset);
		} elseif (isset($_GET['gia'])) {
			$gia = $_GET['gia'];
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePricePagination($id, $gia, $config["per_page"], $offset);
		} elseif (isset($_GET['to']) && $_GET['from']) {
			$from_price = $_GET['from'];
			$to_price = $_GET['to'];

			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePriceRangePagination($id, $from_price, $to_price, $config["per_page"], $offset);
		} else {
			$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePagination($id, $config["per_page"], $offset);
		}

		// $this->data['category_product'] = $this->IndexModel->getCategoryProduct($id);
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function brand($id)
	{

		$this->data['slug'] = $this->IndexModel->getBrandSlug($id);
		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/thuong-hieu' . '/' . $id . '/' . $this->data['slug'];
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByBrand($id)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
		$config["per_page"] = 3; //từng trang 3 sản phẩn
		$config["uri_segment"] = 4; //lấy số trang hiện tại
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
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1; //current page active 
		$offset = ($page - 1) * $config['per_page'];
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproductbybrand_pagination'] = $this->IndexModel->getBrandPanigation($id, $config["per_page"], $offset);
		// //pagination

		// $this->data['brand_product'] = $this->IndexModel->getBrandProduct($id);
		$this->data['title'] = $this->IndexModel->getBrandTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function product($id)
	{

		$this->data['product_details'] = $this->IndexModel->getProductDetails($id);
		$this->data['list_comments'] = $this->IndexModel->getListComment($id);

		foreach ($this->data['product_details'] as $key => $val) {
			$category_id = $val->category_id;
		}


		//cac san pham khac
		$this->data['product_related'] = $this->IndexModel->getProductRelated($id, $category_id);

		$this->data['title'] = $this->IndexModel->getProductTitle($id);
		$this->config->config['pageTitle'] = $this->data['title'];

		$this->load->view('pages/template/header3');
		$this->load->view('pages/template/sidebar', $this->data);
		$this->load->view('pages/product_detail2', $this->data);
		$this->load->view('pages/template/footer2');
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

		$this->checkLogin();

		if ($this->cart->contents()) {
			$exists_in_cart = false;

			foreach ($this->cart->contents() as $items) {
				if ($items['id'] == $product_id) {
					$this->session->set_flashdata('success', 'Da co san trong gio hang!');
					redirect($_SERVER['HTTP_REFERER'], 'refresh');
					$exists_in_cart = true;
					break;
				}
			}

			// Nếu sản phẩm không có trong giỏ hàng
			if (!$exists_in_cart) {
				$product_found = false;

				foreach ($this->data['product_details'] as $key => $pro) {
					if ($pro->id == $product_id) {
						$product_found = true;

						if ($pro->quantity >= $quantity) {
							$cart = array(
								'id' => $pro->id,
								'qty' => $quantity,
								'price' => $pro->price,
								'name' => $pro->title,
								'options' => array('image' => $pro->image, 'stock' => $pro->quantity),
							);
							break;
						} else {
							$this->session->set_flashdata('error', 'Khong du so luong san pham de ban!');
							redirect($_SERVER['HTTP_REFERER']);
						}
					}
				}

				if ($product_found && !empty($cart)) {
					$this->session->set_flashdata('success', 'Them vao gio hang thanh cong!');
					$this->cart->insert($cart);
					redirect(base_url() . 'gio-hang', 'refresh');
				} else {
					// Xử lý khi không tìm thấy sản phẩm
					$this->session->set_flashdata('error', 'San pham khong ton tai!');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		} else {
			// Xử lý khi giỏ hàng rỗng
			foreach ($this->data['product_details'] as $key => $pro) {
				if ($pro->id == $product_id) {
					if ($pro->quantity >= $quantity) {
						$cart = array(
							'id' => $pro->id,
							'qty' => $quantity,
							'price' => $pro->price,
							'name' => $pro->title,
							'options' => array('image' => $pro->image, 'stock' => $pro->quantity),
						);
						$this->session->set_flashdata('success', 'Them vao gio hang thanh cong!');
						$this->cart->insert($cart);
						redirect(base_url() . 'gio-hang', 'refresh');
					} else {
						$this->session->set_flashdata('error', 'Khong du so luong san pham de ban!');
						redirect($_SERVER['HTTP_REFERER']);
					}
					break;
				}
			}
		}
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
				if ($quantity < $items['options']['stock']) {
					$cart = array(
						'rowid' => $rowid,
						'qty' => $quantity,
					);
				} else {
					$cart = array(
						'rowid' => $rowid,
						'qty' => $items['options']['stock'],
					);
				}
			}
		}
		$this->cart->update($cart);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function checkout()
	{
		$this->config->config['pageTitle'] = 'Checkout Payment';
		$this->load->library('form_validation');
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
				//gui mail xac nhan dat hang
				$to_email = $email;
				$title = 'Đơn hàng đặt tại website ...';
				$message = 'Vui lòng thanh toán dư nợ 2.350.000vnd cho chúng tôi';

				//call function send_mail
				$this->send_mail($to_email, $title, $message);

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
				$this->session->set_flashdata('error', 'Kiem tra xac thuc tai khoan Hoac mat khau.');
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
			$token = rand(0000, 9999);
			$date_create = Carbon::now('Asia/Ho_Chi_Minh');

			$data = array(
				'email' => $email,
				'name' => $name,
				'password' => $password,
				'phone' => $phone,
				'address' => $address,
				'token' => $token,
				'date_create' => $date_create
			);


			$this->load->model('LoginModel');
			$result = $this->LoginModel->newCustomer($data);

			if ($result) {
				// $session_array = [
				// 	'username' => $name,
				// 	'email' => $email,
				// ];
				// $this->session->set_userdata('LoggedInCustomer', $session_array);
				// $this->session->set_flashdata('success', 'LOGIN SUCCESS');

				//send mail
				$fullurl = base_url() . 'xac-thuc-dang-ky/?token=' . $token . '&email=' . $email;
				$title = 'Dang ky tai khoan thanh cong.';
				$message = 'Click vao duong link de kich hoat tai khoan: ' . $fullurl;
				$to_email = $email;
				$this->send_mail($to_email, $title, $message);
				$this->session->set_flashdata('success', 'Kiem tra email de xac thuc kich hoat tai khoan.');
				redirect(base_url('/dang-nhap'));
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

		//custom config link
		$config = array();
		$config["base_url"] = base_url() . '/tim-kiem';
		$config['reuse_query_string'] = TRUE; // tai su dung duong dan , chi thay doi trang index
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByKeyword($keyword)); //đếm tất cả sản phẩm //8 //hàm ceil làm tròn phân trang 
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
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1; //current page active 
		$offset = ($page - 1) * $config['per_page'];
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproductbykeyword_pagination'] = $this->IndexModel->getProductByKeyPagination($keyword, $config["per_page"], $offset);
		// //pagination

		// $this->data['product'] = $this->IndexModel->getProductyKeyword($keyword);
		$this->data['title'] = $keyword;
		$this->data['no_product'] = $keyword2;
		$this->config->config['pageTitle'] = 'Search: ' . $keyword;
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/search', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function xac_thuc_dang_ky()
	{
		if (isset($_GET['email']) && $_GET['token']) {
			$email = $_GET['email'];
			$token = $_GET['token'];
		}

		$data['get_customer'] = $this->IndexModel->getCustomerToken($email);

		$now  = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(5);
		$token2 = rand(0000, 9999);

		foreach ($data['get_customer'] as $key => $val) {
			if ($token != $val->token) {
				$this->session->set_flashdata('error', 'Link kich hoat chi su dung mot lan duy nhat.');
				redirect(base_url('/dang-nhap'));
			}
			$data_customer = [
				'status'  => 1,
				'token' => $token2
			];

			if ($val->date_create < $now) {
				$active_customer  = $this->IndexModel->activeCustomersToken($email, $data_customer);
				$this->session->set_flashdata('success', 'Kich hoat tai khoan thanh cong');
				redirect(base_url('/dang-nhap'));
			} else {
				$this->session->set_flashdata('error', 'Kich hoat that bai');
				redirect(base_url('/dang-nhap'));
			}
		}
	}

	public function notfound()
	{
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/404');
		$this->load->view('pages/template/footer');
	}

	public function blog_detail($id)
	{
		$this->load->view('pages/template/header', $this->data);

		$this->data['title'] = $this->IndexModel->getPostTitle($id);
		$this->data['post'] = $this->IndexModel->getBlogDetailById($id);
		$this->load->view('pages/blog_detail', $this->data);
		$this->load->view('pages/template/footer');
	}

	public function contact()
	{
		$this->config->config['pageTitle'] = 'Contact';
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/contact');
		$this->load->view('pages/template/footer');
	}

	public function send_contact()
	{
		$data = [
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'phone' => $this->input->post('phone'),
			'note' => $this->input->post('note'),
		];
		$result = $this->IndexModel->insertContact($data);
		if ($result) {
			$title = 'Gui yeu cau lien he thanh cong cua: ' . $this->input->post('name');
			$message = 'Noi dung yeu cau: ' . $this->input->post('note');
			$to_email = $this->input->post('email');
			$this->send_mail($to_email, $title, $message);
		}

		$this->session->set_flashdata('success', 'Gui yeu cau lien he thanh cong');
		redirect(base_url('contact'));
	}

	public function comment_send()
	{
		$data = array(
			'product_id' => $this->input->post('product_id'),
			'name' => $this->input->post('name_comment'),
			'email' => $this->input->post('email_comment'),
			'comment' => $this->input->post('comment'),
			'stars' => $this->input->post('star'),
			'status' => 0,
			'dated' => Carbon::now('Asia/Ho_Chi_Minh')
		);

		$result = $this->IndexModel->insertComment($data);

		if ($result) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}


	public function online_checkout()
	{
	}

	public function shop()
	{
		$this->config->config['pageTitle'] = 'Shop';
		$this->load->view('pages/template/header3');
		$this->load->view('pages/template/sidebar', $this->data);

		$this->data['allproduct'] = $this->IndexModel->getAllProduct();


		$this->load->view('pages/shop', $this->data);
		$this->load->view('pages/template/footer2');
	}
}
