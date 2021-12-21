<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PenjualanModel extends Model
{
     
    public function getProdukByBarcode($barcode=null)
    {
        $builder = $this->db->table('produk');
        $builder->where('barcode', $barcode);
        return $builder->get();
    }
 
    public function getProduct()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        $builder->join('category', 'category_id = product_category_id','left');
        return $builder->get();
    }
 
    public function saveProduct($data){
        $query = $this->db->table('product')->insert($data);
        return $query;
    }
 
    public function updateProduct($data, $id)
    {
        $query = $this->db->table('product')->update($data, array('product_id' => $id));
        return $query;
    }
 
    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 
 
   
}