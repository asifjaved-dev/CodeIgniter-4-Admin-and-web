<?php namespace App\Models;

use CodeIgniter\Model;

class orderItem extends Model{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'product_id', 'price', 'Qty', 'sub_total'];
                                

    public function getproduct($ordId=null){
        if(!$ordId){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['order_id'=> $ordId])
                    ->first();
    }
    public function getItem($ordId){
        return $this->where('order_id',$ordId)->first();
     }
    
}