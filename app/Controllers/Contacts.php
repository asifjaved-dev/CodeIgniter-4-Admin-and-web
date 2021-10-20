<?php namespace App\Controllers;
 $cart = \Config\Services::cart();

use App\Models\contactModel;

class Contacts extends BaseController
{
    public function index()
	{
		$model = new contactModel();
		$data['news'] = $model->getData();

		echo view('templates/header',$data);
		echo view('Admin/contact_us');
		echo view('templates/footer');
	}
	public function contactus(){
		$data = [];
		helper(['form']);
		$data['title'] = "Contact Us";

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'name' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'phone' => 'required|min_length[11]',
				'message' => 'required|min_length[8]|max_length[255]',
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$model = new contactModel();

				$newData = [
					'name' => $this->request->getVar('name'),
					'email' => $this->request->getVar('email'),
					'phone' => $this->request->getVar('phone'),
					'message' => $this->request->getVar('message'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Submission');
				return redirect()->to('/soft/home');

			}
		}

		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		echo view('templates/front_header', $data);
		echo view('contactus');
		echo view('templates/front_footer');
	}
	public function delete($id)
    {
		$session = \Config\Services::session();
        $model = new contactModel();
		$data = $model->find($id);
		$model->delete($id);
        $session->setFlashdata('Delete', 'Contact Message Deleted');

        return $this->response->redirect(site_url('/soft/contact_us'));
    }

}
