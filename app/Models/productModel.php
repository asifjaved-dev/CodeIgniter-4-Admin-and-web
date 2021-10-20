<?php namespace App\Models;

use CodeIgniter\Model;

class productModel extends Model{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_title', 'product_short_description',
                                'product_long_description', 'product_image', 'product_price',
                                'product_quantity', 'product_feature', 'product_category',
                                'product_brand', 'product_author', 'product_view',
                                'published_date', 'product_status'];
                                

    public function getproduct($id=null){
        if(!$id){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['product_id'=> $id])
                    ->first();
    }
    public function getRow($id){
       return $this->where('product_id',$id)->first();
    }
    public function getCartProduct($Proid=null){
        if(!$Proid){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['product_id'=> $Proid])
                    ->first();
    }
    

    
}