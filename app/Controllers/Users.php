<?php
namespace App\Controllers;

use App\Models\userModel;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);
		$data['title'] = "Sign In";

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/soft/dashboard');

			}
		}

		echo view('templates/header', $data);
		echo view('Admin/login');
		echo view('templates/footer');
	}
	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		$data = [];
		helper(['form']);
		$data['title'] = "Register";

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$model = new userModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/soft');

			}
		}


		echo view('templates/header', $data);
		echo view('Admin/register');
		echo view('templates/footer');
	}
	public function profile()
		{
			$data=[];
			$data['title'] = "Profile";
			helper(['form']);
			$model = new UserModel();
			$data['user'] = $model->where('id', session()->get('id'))->first();
			echo view('templates/header', $data);
			echo view('Admin/profile');
			echo view('templates/footer');
		}
		public function employee()
		{
			$model = new UserModel();
			$data['user'] = $model->getContact();
	
			echo view('templates/header',$data);
			echo view('Admin/employee');
			echo view('templates/footer');
		}

	public function profile_info(){
			
		$data = [];
		$data['title'] = "Profile_info";
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					'phone' => $this->request->getPost('phone'),
					'designation' => $this->request->getPost('designation'),
					'location' => $this->request->getPost('location'),
					'personal_information' => $this->request->getPost('personal_information'),
					'image' => $this->request->getPost('image'),
					'facebook' => $this->request->getPost('facebook'),
					'twitter' => $this->request->getPost('twitter'),
					'instagram' => $this->request->getPost('instagram'),
					'organization' => $this->request->getPost('organization'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
				$model->save($newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/soft/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		echo view('templates/header', $data);
		echo view('Admin/profile_info');
		echo view('templates/footer');
}


	public function logout(){
		session()->destroy();
		return redirect()->to('/soft');
	}

//--------------------------------------------------------------------

}