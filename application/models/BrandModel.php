<?php

class BrandModel extends CI_Model
{
<<<<<<< HEAD
    public function insertBrand($data)
    {
      return $this->db->insert('brands',$data);
    }
=======
	public function insertBrand($data)
	{
		return $this->db->insert('brands', $data);
	}

	public function selectBrand()
	{
		$query =  $this->db->get('brands');
		return $query->result();
	}

	public function selectBrandById($id)
	{
		$query =  $this->db->get_where('brands', ['id' => $id]);
		return $query->row();
	}
>>>>>>> home
}
