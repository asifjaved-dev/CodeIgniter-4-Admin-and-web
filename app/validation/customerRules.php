<?php
namespace App\Validation;
use App\Models\customerModel;

class CustomerRules
{

  public function validatecustomer(string $str, string $fields, array $data){
    $model = new customerModel();
    $customer = $model->where('customer_email', $data['customer_email'])
                  ->first();

    if(!$customer)
      return false;

    return password_verify($data['customer_password'], $customer['customer_password']);
  }
}