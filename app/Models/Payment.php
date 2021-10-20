<?php namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model{
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $allowedFields = ['customer_id', 'order_id', 'txn_id', 'payment_gross',
                                'currency_code', 'payer_email', 'payment_status'];
                                

    public function getRows($id=null){
        if(!$id){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['payment_id'=> $id])
                    ->first();
    }
    public function getRow($id=null){
        return $this->where('payment_id',$id)->first();
     }

     public function insertOrder($data){

        $insert = $this->insert($data);
        return $this->asArray()
                    ->where(['payment_id'=> $data]);
      }
}