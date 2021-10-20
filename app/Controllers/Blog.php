<?php namespace App\Controllers;
 $cart = \Config\Services::cart();


use App\Models\blogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
	public function index()
	{
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		$db = db_connect();
		$model = new CustomModel($db);
		$data['blog'] = $model->get_all_post();

		echo view('templates/front_header',$data);
		echo view('blog/blog');
		echo view('templates/front_footer');
	}
	public function post($slug)
	{
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		$model =new blogModel();

		$data['post'] = $model->getPosts($slug);

		echo view ('templates/detail_header',$data);
		echo view ('blog/post');
		echo view ('templates/detail_footer');
	}

	public function create()
	{	
		helper('form');
		$model =new blogModel();
		$data= [];
		echo view ('blog/create',$data);
	}
	public function store()
	{
		helper('form');
		$model =new blogModel();
		$data= [];
		$file= $this->request->getFile('image');
		if ($file->isValid() && ! $file->hasMoved())
		{
			$imageName = $file->getRandomName();
			$file->move('public/uploads/',$imageName);
		}
		$data = [
				'title' => $this->request->getPost('title'),
				'body' => $this->request->getPost('body'),
				'slug' => url_title($this->request->getPost('title')),
				'image' => $imageName,
			];
		$model->save($data);
		return redirect()->to('/soft/blog');
			
	}
	public function blogtable()
	{
		$model = new blogModel();
		$data['post'] = $model->getBlog();

		echo view('templates/header',$data);
		echo view('blog/blogtable');
		echo view('templates/footer');
	}
	public function editblog($id){
			
		$data = [];
		$data['title'] = "Edit blog";
		helper(['form']);
		$model = new blogModel();
		$post = $model->getRow($id);
		$data['post'] = $post;
		if (empty($post)){
			session()->setFlashdata('Error', 'Record not fond');
			return redirect()->to('/soft/blogtable');
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'title' => 'required|min_length[3]|max_length[50]',
				'body' => 'required|min_length[3]|max_length[2000]',
				];


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$file= $this->request->getFile('image');
				if ($file->isValid() && ! $file->hasMoved())
				{
					$old_image = $post['image'];
					if(file_exists("public/uploads/".$old_image)){
						unlink("public/uploads/".$old_image);
					}
					$imageName = $file->getRandomName();
					$file->move('public/uploads/',$imageName);
				}
				else{
					$imageName = $post['image'];
				}
				$newData = [
						'title' => $this->request->getPost('title'),
						'body' => $this->request->getPost('body'),
						'slug' => url_title($this->request->getPost('title')),
						'image' => $imageName,
					];
				$model->update($id,$newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/soft/blogtable');

			}
		}

		
		echo view('templates/post_header', $data);
		echo view('blog/editblog');
		echo view('templates/post_footer');

	}
	public function delete($id)
    {
		$session = \Config\Services::session();
        $model = new blogModel();

		$data = $model->find($id);
		$imageFile= $data['image'];
		if(file_exists("public/uploads/".$imageFile)){
			unlink("public/uploads/".$imageFile);
		}
		$post = $model->getRow($id);
		if (empty($post)){
			session()->setFlashdata('Error', 'Record not fond');
			return redirect()->to('/soft/blogtable');
		}

		$model->delete($id);
        $session->setFlashdata('Delete', 'Post Data Deleted');

        return $this->response->redirect(site_url('/soft/blogtable'));
    }

	public function published_post($id){
		$session = \Config\Services::session();
		$model = new blogModel();
		$post = $model->getRow($id);
		$data['post'] = $post;
		$status=$post['status'];
			if ($status ==0) {

				$Data = [
						'status' => 1,
					];
				$model->update($id,$Data);

				session()->setFlashdata('message', 'Post Published Sucessfully');
				return redirect()->to('/soft/blogtable');
			} else {
				session()->setFlashdata('message', 'Post Published Failed');
				return redirect()->to('/soft/blogtable');
			}

		echo view('templates/header', $data);
		echo view('blogtable');
		echo view('templates/footer');

	}
	public function unpublished_post($id){
		$session = \Config\Services::session();
		$model = new blogModel();
		$post = $model->getRow($id);
		$data['post'] = $post;
		$status=$post['status'];
			if ($status ==1) {

				$Data = [
						'status' => 0,
					];
				$model->update($id,$Data);

				session()->setFlashdata('message', 'UnPublished Post Sucessfully');
				return redirect()->to('/soft/blogtable');
			} else {
				session()->setFlashdata('message', 'UnPublished Post  Failed');
				return redirect()->to('/soft/blogtable');
			}

		echo view('templates/header', $data);
		echo view('blogtable');
		echo view('templates/footer');

	}

}
