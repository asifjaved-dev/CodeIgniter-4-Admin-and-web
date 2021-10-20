<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;

class CustomModel{

    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }
    function getProduct(){
        $builder = $this->db->table('product');
        $builder->join('category','product.product_category = category.category_id');
        $builder->join('brand','product.product_brand = brand.brand_id');
        $product = $builder->get()->getResult();
        return $product;
    }
   
   
    public function get_all_published_category()
    {
        return $this->db->table('category')
                    ->where('publication_status', 1)
                    ->get()
                    ->getResult();
    }
    public function get_all_published_brand()
    {
        return $this->db->table('brand')
                        ->where('publication_status', 1)
                        ->get()
                        ->getResult();
    }
    public function get_all_post()
    {
        return $this->db->table('posts')
                        ->where('status', 1)
                        ->get()
                        ->getResult();
    }
}