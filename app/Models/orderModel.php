<?php namespace App\Models;

use CodeIgniter\Model;

class orderModel extends Model{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['customer_id', 'grand_total', 'created', 'modified'];
                                

    public function getRows($id=null){
        if(!$id){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['order_id'=> $id])
                    ->first();
    }
    public function getRow($id=null){
        return $this->where('order_id',$id)->first();
     }

     public function insertOrder($data){

        $insert = $this->insert($data);
        return $this->asArray()
                    ->where(['order_id'=> $data]);
      }
}