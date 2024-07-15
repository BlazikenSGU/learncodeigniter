<?php

class IndexModel extends CI_Model
{

    public function getCategoryHome()
    {
        $query =  $this->db->get_where('categories', ['status' => 1]);
        return $query->result();
    }

    public function getBrandHome()
    {
        $query =  $this->db->get_where('brands', ['status' => 1]);
        return $query->result();
    }

	public function getAllProduct()
    {
        $query =  $this->db->get_where('products', ['status' => 1]);
        return $query->result();
    }
	
	public function getCategoryProduct($id)
    {
		$query =  $this->db->select('categories.title as tendanhmuc, products.*, brands.title as tenthuonghieu')
		->from('categories')
		->join('products', 'products.category_id=categories.id')
		->join('brands', 'brands.id = products.brand_id')
		->where('products.category_id', $id)
		->get();
	return $query->result();
    }
}
