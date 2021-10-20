<?php namespace App\Controllers;
 $cart = \Config\Services::cart();


use App\Models\productModel;
use App\Models\CustomModel;
use App\Models\customerModel;
use App\Models\orderModel;
use App\Models\orderItem;

class Products extends BaseController
{
	
	public function index()
	{
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		
		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_category'] = $model->get_all_published_category();
		$data['all_published_brand'] = $model->get_all_published_brand();
		$data['products'] = $model->getProduct();
	
		// $model = new productModel();
		// $data['products'] = $model->getproduct();

		echo view('templates/front_header',$data);
		echo view('products/products');
		echo view('templates/front_footer');
	}
	public function detail($id)
	{
        $cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_brand'] = $model->get_all_published_brand();
		

		$model = new productModel();
		$data['product'] = $model->getRow($id);


		echo view ('templates/detail_header',$data);
		echo view ('products/detail');
		echo view ('templates/detail_footer');
	}
	public function add()
	{	
		$data= [];
		helper('form');
		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_category'] = $model->get_all_published_category();
		$data['all_published_brand'] = $model->get_all_published_brand();
		$model =new productModel();
		echo view ('templates/post_header',$data);
		echo view ('products/add');
		echo view ('templates/post_footer');
	}
	public function store()
	{
		helper('form');
		$model =new productModel();
		$data= [];
		$file= $this->request->getFile('product_image');
		if ($file->isValid() && ! $file->hasMoved())
		{
			$imageName = $file->getRandomName();
			$file->move('public/uploads/products/',$imageName);
		}
		$data = [
			'product_title'             => $this->request->getPost('product_title'),
			'product_short_description' => $this->request->getPost('product_short_description'),
			'product_long_description'  => $this->request->getPost('product_long_description'),
			'product_price'             => $this->request->getPost('product_price'),
			'product_quantity'          => $this->request->getPost('product_quantity'),
			'product_category'          => $this->request->getPost('product_category'),
			'product_brand'             => $this->request->getPost('product_brand'),
			'product_feature'           => $this->request->getPost('product_feature'),
			'product_status'        	=> $this->request->getPost('product_status'),
			'product_image'        => $imageName,
			];
		$model->save($data);
		return redirect()->to('/soft/product_table');
			
	}
	public function product_table()
	{
		$model = new productModel();
		$data['product'] = $model->getproduct();

		echo view('templates/header',$data);
		echo view('products/product_table');
		echo view('templates/footer');
	}
	public function product_edit($id){
		$data = [];
		$data['title'] = "Product Edit";
		helper(['form']);
		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_category'] = $model->get_all_published_category();
		$data['all_published_brand'] = $model->get_all_published_brand();

		
		$model = new productModel();
		$products = $model->getRow($id);
		$data['products'] = $products;

		if (empty($products)){
			session()->setFlashdata('Error', 'Record not fond');
			return redirect()->to('/soft/product_table');
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'product_title' => 'required|min_length[3]|max_length[50]',
				'product_short_description' => 'required|min_length[3]|trim',
				'product_long_description' => 'required|min_length[3]|trim',
				'product_price' => 'required|min_length[3]|trim',
				'product_status' => 'required|trim',
				];


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				
				$file= $this->request->getFile('product_image');
				if ($file->isValid() && ! $file->hasMoved())
				{
					$old_image = $products['product_image'];
					if(file_exists("public/uploads/products/".$old_image)){
						unlink("public/uploads/products/".$old_image);
					}
					$imageName = $file->getRandomName();
					$file->move('public/uploads/products',$imageName);
				}
				else{
					$imageName = $products['product_image'];
				}
				$newData = [
					'product_title'             => $this->request->getPost('product_title'),
					'product_short_description' => $this->request->getPost('product_short_description'),
					'product_long_description'  => $this->request->getPost('product_long_description'),
					'product_price'             => $this->request->getPost('product_price'),
					'product_quantity'          => $this->request->getPost('product_quantity'),
					'product_category'          => $this->request->getPost('product_category'),
					'product_brand'             => $this->request->getPost('product_brand'),
					'product_feature'           => $this->request->getPost('product_feature'),
					'product_status'        	=> $this->request->getPost('product_status'),
					'product_image'        => $imageName,
					];
				$model->update($id,$newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/soft/product_table');

			}
		}
		echo view('templates/post_header', $data);
		echo view('products/product_edit');
		echo view('templates/post_footer');
	}
	public function delete($id)
    {
		$session = \Config\Services::session();
        $model = new productModel();

		$data = $model->find($id);
		$imageFile= $data['product_image'];
		if(file_exists("public/uploads/products/".$imageFile)){
			unlink("public/uploads/products/".$imageFile);
		}
		$post = $model->getRow($id);
		if (empty($post)){
			session()->setFlashdata('Error', 'Record not fond');
			return redirect()->to('/soft/product_table');
		}

		$model->delete($id);
        $session->setFlashdata('Delete', 'Product Deleted');

        return $this->response->redirect(site_url('/soft/product_table'));
    }

	public function published_post($id){
		$session = \Config\Services::session();
		$model = new productModel();
		$product = $model->getRow($id);
		$data['product'] = $product;
		$status=$product['product_status'];
			if ($status ==0) {

				$Data = [
						'product_status' => 1,
					];
				$model->update($id,$Data);

				session()->setFlashdata('message', 'Product Published Sucessfully');
				return redirect()->to('/soft/product_table');
			} else {
				session()->setFlashdata('message', 'Product Published Failed');
				return redirect()->to('/soft/product_table');
			}

		echo view('templates/header', $data);
		echo view('product_table');
		echo view('templates/footer');

	}
	public function unpublished_post($id){
		$session = \Config\Services::session();
		$model = new productModel();
		$product = $model->getRow($id);
		$data['product'] = $product;
		$status=$product['product_status'];
			if ($status ==1) {

				$Data = [
						'product_status' => 0,
					];
				$model->update($id,$Data);

				session()->setFlashdata('message', 'Product UnPublished Sucessfully');
				return redirect()->to('/soft/product_table');
			} else {
				session()->setFlashdata('message', 'Product UnPublished Failed');
				return redirect()->to('/soft/product_table');
			}

		echo view('templates/header', $data);
		echo view('product_table');
		echo view('templates/footer');

	}
	public function cart()
    {
        $cart = \Config\Services::cart();

		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_category'] = $model->get_all_published_category();
		$data['all_published_brand'] = $model->get_all_published_brand();
		$data['blog'] = $model->get_all_post();
		$data['products'] = $model->getProduct();
		$products = $data['products'];

		$data['cartItems']=$cart->contents();
		
		$data['total']=$cart->total();
		$data['totalItems']=$cart->totalItems();
		
		echo view('templates/front_header',$data);
		echo view('products/cart');
		echo view('products/feature_product');
		echo view('templates/front_footer');
    }
	function addToCart($id){
        $cart = \Config\Services::cart();
        
		$model = new productModel();
		$product = $model->getRow($id);
		$data['product'] = $product;


     // Insert an array of values
        $cart->insert(array(
            'id'    => $product['product_id'],
            'qty'    => 1,
            'price'    => $product['product_price'],
            'name'    => $product['product_title'],
            'brand'    => $product['product_brand'],
            'image' => $product['product_image']
		));
		
        // Redirect to the cart page
		return redirect()->to('soft/cart');
    }
	function deleteFromCart($rowid){
        $cart = \Config\Services::cart();

		$cart->remove($rowid);
  
		
        // Redirect to the cart page
		return redirect()->to('soft/cart');
    }
	public function update_cart()
    {
        $cart = \Config\Services::cart();
        $data          = array();
        $data['qty']   = $this->request->getPost('qty');
        $data['rowid'] = $this->request->getPost('rowid');

        $cart->update($data);
        return redirect()->to('soft/cart');
    }
	function buynow($id){
		$cart = \Config\Services::cart();
        
		$model = new productModel();
		$product = $model->getRow($id);
		$data['product'] = $product;


     // Insert an array of values
        $cart->insert(array(
            'id'    => $product['product_id'],
            'qty'    => 1,
            'price'    => $product['product_price'],
            'name'    => $product['product_title'],
            'brand'    => $product['product_brand'],
            'image' => $product['product_image']
		));
		
        // Redirect to the cart page
		return redirect()->to('soft/checkout');
    }
	function buy($id){ 
        // Set variables for paypal form 
        $returnURL = base_url().'paypal/success'; //payment success url 
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'paypal/ipn'; //ipn url 
         
        // Get product data from the database 
        $model = new productModel();
		$product = $model->getRow($id); 
         
        // Get current user ID from the session (optional) 
        $userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $product['name']); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $product['id']); 
        $this->paypal_lib->add_field('amount',  $product['price']); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
    }
	public function checkout(){
		$cart = \Config\Services::cart();
		helper(['form']);
		$data = [];
		
		$data['cartItems']=$cart->contents();
		$data['totalItems']=$cart->totalItems();
		$data['total']=$cart->total();
		$data['title'] = "Checkout";

		if($data['totalItems']>0){
			if ($this->request->getMethod() == 'post') {
				//let's do the validation here
				$rules = [
					'customer_name' => 'required|min_length[3]|max_length[20]',
					'customer_email' => 'required|min_length[6]|max_length[50]',
					'customer_address' => 'required|min_length[6]|max_length[255]',
				];

				if (!$this->validate($rules)) {
					$data['validation'] = $this->validator;
				}else{
					$db = db_connect();
					$model = new customerModel($db);

					$newData = [
						'customer_name' => $this->request->getVar('customer_name'),
						'customer_phone' => $this->request->getVar('customer_phone'),
						'customer_email' => $this->request->getVar('customer_email'),
						'customer_address' => $this->request->getVar('customer_address'),
						'customer_city' => $this->request->getVar('customer_city'),
						'customer_zipcode' => $this->request->getVar('customer_zipcode'),
						'customer_country' => $this->request->getVar('customer_country'),
						'customer_active' => $this->request->getVar('customer_active'),
					];
					$model->save($newData);
					$user_id = $model->getInsertID();
					
					$session = session();
					$session->setFlashdata('success', 'Successful Registration');
					$order= $this->stripe($user_id);
					return redirect()->to('/soft/paymentform/'.$user_id);

				}
			}
		}else{
			return redirect()->to('soft/cart');
		}
		echo view('templates/checkout_header', $data);
		echo view('products/checkout');
		echo view('templates/front_footer');
	}
	public function stripe($id)
    {
        $cart = \Config\Services::cart();
		$data['user_id']=$id;
		$db = db_connect();
		$model = new CustomModel($db);
		// $data['all_published_brand'] = $model->get_all_published_brand();
		$data['products'] = $model->getProduct();
		$products = $data['products'];

		$data['cartItems']=$cart->contents();
		$data['total']=$cart->total();
		$data['totalItems']=$cart->totalItems();

		if($data['totalItems']>0){
				echo view('templates/detail_header',$data);
				echo view('products/paymentform');
				echo view('templates/detail_footer');
			}else{
				return redirect()->to('soft/cart');
		}
    }
	

}
