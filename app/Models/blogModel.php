<?php namespace App\Models;

use CodeIgniter\Model;

class blogModel extends Model{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'image', 'body', 'status'];

    public function getPosts($slug=null){
        if(!$slug){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['slug'=> $slug])
                    ->first();
    }
    public function getBlog($title=null){
        if(!$title){
            return $this->findAll();
        }
        return $this->asArray()
                    ->where(['title'=> $title])
                    ->first();
    }
    public function getRow($id){
       return $this->where('id',$id)->first();
    }

    
}