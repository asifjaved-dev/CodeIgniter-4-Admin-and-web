<?php namespace App\Controllers;
$cart = \Config\Services::cart();

use App\Models\customerModel;

class Customers extends BaseController
{
	public function login()
	{
		
		$data = [];
		helper(['form']);
		$data['title'] = "Customer Login";

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'customer_email' => 'required|min_length[6]|max_length[50]|valid_email',
				'customer_password' => 'required|min_length[6]|max_length[255]|validatecustomer[customer_email,customer_password]',
			];

			$errors = [
				'customer_password' => [
				'validatecustomer' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new customerModel();

				$customer = $model->where('customer_email', $this->request->getVar('customer_email'))
											->first();

				$this->setUserSession($customer);
				return redirect()->to('/soft/home');

			}
		}
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();

		echo view('templates/detail_header', $data);
		echo view('login');
		echo view('templates/detail_footer');
	}
	private function setUserSession($customer){
		$data = [
			'customer_id' => $customer['id'],
			'customer_name' => $customer['customer_name'],
			'customer_address' => $customer['customer_address'],
			'customer_email' => $customer['customer_email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function signup(){
		$data = [];
		helper(['form']);
		$data['title'] = "Customer Signup";

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'customer_name' => 'required|min_length[3]|max_length[20]',
				'customer_email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[customer.customer_email]',
				'customer_password' => 'required|min_length[6]|max_length[255]',
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$model = new customerModel();

				$newData = [
					'customer_name' => $this->request->getVar('customer_name'),
					'customer_email' => $this->request->getVar('customer_email'),
					'customer_password' => $this->request->getVar('customer_password'),
					'customer_address' => $this->request->getVar('customer_address'),
					'customer_city' => $this->request->getVar('customer_city'),
					'customer_zipcode' => $this->request->getVar('customer_zipcode'),
					'customer_phone' => $this->request->getVar('customer_phone'),
					'customer_country' => $this->request->getVar('customer_country'),
					'customer_active' => $this->request->getVar('customer_active'),
				];
				$model->save($newData);
				
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/soft/home');

			}
		}
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();

		echo view('templates/front_header', $data);
		echo view('signup');
		echo view('templates/front_footer');
	}
	public function logout(){
		session()->destroy();
		return redirect()->to('/soft/home');
	}

//--------------------------------------------------------------------

}