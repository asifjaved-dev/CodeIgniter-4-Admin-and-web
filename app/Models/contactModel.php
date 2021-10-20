<?php namespace App\Models;

use CodeIgniter\Model;

class contactModel extends Model{
    protected $table = 'contact';
    protected $allowedFields = ['name', 'email', 'phone','message',];

    public function getData($name=null){
        if(!$name){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['name'=> $name])
                    ->first();
    }
}