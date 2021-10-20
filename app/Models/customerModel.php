<?php namespace App\Models;

use CodeIgniter\Model;

class customerModel extends Model{
  protected $table = 'customer';
  protected $allowedFields = ['customer_id ', 'customer_name',
                                'customer_phone','customer_email',
                                'customer_address', 'customer_city', 
                                'customer_zipcode', 'customer_country',
                                ];



    public function getCustomer($name=null){
        if(!$name){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['customer_name'=> $name])
                    ->first();
    }
    public function getcust($custId){
      return $this->where('customer_id',$custId)->first();
    }
}