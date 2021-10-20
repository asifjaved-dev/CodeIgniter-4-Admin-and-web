<?php namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model{
  protected $table = 'users';
  protected $allowedFields = ['firstname', 'lastname',
                                'email', 'password',
                                'phone', 'designation',
                                'location', 'personal_information',
                                'image', 'facebook',
                                'twitter', 'instagram',
                                'organization	','updated_at'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];




  protected function beforeInsert(array $data){
    $data = $this->passwordHash($data);
    $data['data']['created_at'] = date('Y-m-d H:i:s');

    return $data;
  }

  protected function beforeUpdate(array $data){
    $data = $this->passwordHash($data);
    $data['data']['updated_at'] = date('Y-m-d H:i:s');
    return $data;
  }

  protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }
  public function getContact($name=null){
      if(!$name){
          return $this->findAll();
      }
      return $this->asArray()
                  ->where(['firstname'=> $name])
                  ->first();
  }


}