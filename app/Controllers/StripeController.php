<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use Stripe;
$cart = \Config\Services::cart();

use App\Models\productModel;
use App\Models\orderModel;
use App\Models\CustomModel;
use App\Models\customerModel;
use App\Models\Payment;
use App\Models\orderItem;

class StripeController extends BaseController
{
    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        helper(["url"]);
    }

    public function payment($id){

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $data['user_id']=$id;

        $cart = \Config\Services::cart();
		$total=$cart->total();
        $data['cartItems']=$cart->contents();
     
        $token = $_REQUEST["stripeToken"];

        $model = new Payment();
        $stripe = Stripe\Customer::create([
            'email'     =>  $this->request->getPost('payer_email'),
            'metadata'  =>  ["txn_id" => $_REQUEST["stripeToken"]],
          ]);

        $stripe = Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $_REQUEST["stripeToken"],
                "description" => "Test payment via Stripe From SoftWebsite",
        ]);

        //insert data in order table
        if ($this->request->getMethod() == 'post') {

            $db = db_connect();
            $orders = new orderModel($db);
            $newOrder = [
                'customer_id' => $id,
                'grand_total' => $total,
            ];
            $orders->save($newOrder);
            $order_id = $orders->getInsertID();
        }

        // after successfull payment, you can store payment related information into 
        // payments table
        $data = [
            
			'customer_id'           =>  $id,
			'order_id'              =>  $order_id,
			'txn_id'                =>  $_REQUEST["stripeToken"],
			'payment_gross'         =>  $stripe['amount']/100,
			'currency_code'         =>  $stripe['currency'],
			'payer_email'           =>  $this->request->getPost('payer_email'),
			'payment_status'        =>  $stripe["status"],
			];
		$model->save($data);
        $user_id = $model->getInsertID();

        if($stripe['status'] = 'succeeded'){
            $db = db_connect();
            $data['cartItems']=$cart->contents();
            $cartItems = $data['cartItems'];
            if($cartItems!=null){
                foreach($cartItems as $item){
                    $product_id     =   $item['id'] ;
                    $qty            =   $item['qty'] ;
                    $price          =   $item['price'] ;
                    $subtotal       =   $item['subtotal'] ;

               
                    $cartProduct = new orderItem($db);
                    $newProduct = [
                        'order_id'          =>      $order_id,
                        'product_id'        =>      $product_id,
                        'price'             =>      $price,
                        'Qty'               =>      $qty,
                        'sub_total'         =>      $subtotal,
                    ];
                    $cartProduct->save($newProduct);
                }
            }
        }
        
        //$data = array('success' => true, 'data' => $stripe);
        //echo json_encode($data);
        
        session()->setFlashdata("message", "Payment done successfully");
        return redirect()->to('soft/paymentsuccess/'.$user_id);
    }
    
    public function success($id)
    {
        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $cart = \Config\Services::cart();
		$data['totalItems']=$cart->totalItems();
        

        $model = new Payment();
		$data['Payment'] = $model->getRow($id);
        $Payment = $data['Payment'];
        $custId = $Payment['customer_id'];
        $ordId = $Payment['order_id'];

        $model = new customerModel();
		$data['customer'] = $model->getcust($custId);

        $model = new orderItem();
		$data['items'] = $model->getproduct();

        $items = $data['items'];
        
        if($items){
            foreach($items as $item){
                $ord_id = $item['order_id'];
              
                    $Proid = $item['product_id'];
                 
           
            }
        }
        

        $model = new productModel();
		$data['products'] = $model->getCartProduct();

        
        if($stripe['status'] = 'succeeded'){
            $cart->destroy();
        }
        
		echo view('templates/header',$data);
        echo view('products/paymentsuccess');
		echo view('templates/detail_footer');
        
    }
}