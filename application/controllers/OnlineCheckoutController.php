<?php
defined('BASEPATH') or exit('No direct script access allowed');


class OnlineCheckoutController extends CI_Controller
{

	public function execPostRequest($url, $data)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data)
			)
		);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		//execute post
		$result = curl_exec($ch);
		//close connection
		curl_close($ch);
		return $result;
	}

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

	// public function checkout()
	// {
	// 	$this->config->config['pageTitle'] = 'Checkout Payment';
	// 	$this->load->library('form_validation');
	// 	if ($this->session->userdata('LoggedInCustomer') && $this->cart->contents()) {
	// 		$this->load->view('pages/template/header', $this->data);
	// 		$this->load->view('pages/checkout');
	// 		$this->load->view('pages/template/footer');
	// 	} else {
	// 		redirect(base_url('/gio-hang'));
	// 	}
	// }


	public function online_checkout()
	{
		$this->load->library('cart');
		$this->load->library('form_validation');

		$total = 0;
		$subtotal = 0;
		$total = 0;
		foreach ($this->cart->contents() as $items) {
			$subtotal = $items['qty'] * $items['price'];
			$total += $subtotal;
		}

		if (isset($_POST['cod'])) {


			$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required' => 'You must provide a %s']);
			$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required' => 'You must provide a %s']);
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required' => 'You must provide a %s']);
			$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'You must provide a %s']);


			if ($this->form_validation->run() == TRUE) {

				$email = $this->input->post('email');
				// $shipMethod = $this->input->post('shipMethod');
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');

				$data = array(
					'email' => $email,
					'name' => $name,
					'method' => 'cod',
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
				redirect(base_url('/checkout'));
			};
		} elseif (isset($_POST['payUrl'])) {

			$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
			$partnerCode = 'MOMOBKUN20180529';
			$accessKey = 'klm05TvNBzhg7h7j';
			$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
			$orderInfo = "Thanh toán qua MoMo";
			$amount = $total;
			$orderId = time() . "";
			// $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
			$redirectUrl = "http://localhost:8080/thanks";
			// $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
			$ipnUrl = "http://localhost:8080/thanks";
			$extraData = "";

			$partnerCode = $partnerCode;
			$accessKey = $accessKey;
			$serectkey = $secretKey;
			$orderId = $orderId; // Mã đơn hàng
			$orderInfo = $orderInfo;
			$amount = $amount;
			$ipnUrl = $ipnUrl;
			$redirectUrl = $redirectUrl;
			$extraData = $extraData;

			$requestId = time() . "";
			$requestType = "payWithATM";
			$extraData = ($extraData ? $extraData : "");
			//before sign HMAC SHA256 signature
			$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
			$signature = hash_hmac("sha256", $rawHash, $serectkey);
			$data = array(
				'partnerCode' => $partnerCode,
				'partnerName' => "Test",
				"storeId" => "MomoTestStore",
				'requestId' => $requestId,
				'amount' => $amount,
				'orderId' => $orderId,
				'orderInfo' => $orderInfo,
				'redirectUrl' => $redirectUrl,
				'ipnUrl' => $ipnUrl,
				'lang' => 'vi',
				'extraData' => $extraData,
				'requestType' => $requestType,
				'signature' => $signature
			);
			$result = $this->execPostRequest($endpoint, json_encode($data));
			$jsonResult = json_decode($result, true);  // decode json

			//Just a example, please check more in there

			if (isset($jsonResult['payUrl'])) {
				header('Location: ' . $jsonResult['payUrl']);
			} else {
				// Xử lý khi không có 'payUrl'
				echo 'Không có payUrl trong kết quả.';
				echo $result;
				// Có thể thêm các bước xử lý lỗi hoặc hiển thị thông báo cho người dùng ở đây
			}
		} elseif (isset($_POST['vnpay'])) {
			echo 'vnpay';
		}
	}
}
