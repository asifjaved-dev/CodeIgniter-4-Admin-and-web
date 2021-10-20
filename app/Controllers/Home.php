<?php namespace App\Controllers;
 $cart = \Config\Services::cart();


use App\Models\productModel;
use App\Models\blogModel;
use App\Models\CustomModel;

class Home extends BaseController
{
	public function index()
	{
		$cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
		
		$db = db_connect();
		$model = new CustomModel($db);
		$data['all_published_category'] = $model->get_all_published_category();
		$data['all_published_brand'] = $model->get_all_published_brand();
		$data['blog'] = $model->get_all_post();
		$data['products'] = $model->getProduct();
		$products = $data['products'];


		echo view('templates/front_header',$data);
		echo view('home');
		echo view('products/products');
		echo view('blog/blog');
		echo view('templates/front_footer');
	}
}
