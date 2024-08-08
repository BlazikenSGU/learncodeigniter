<?php

class BlogModel extends CI_Model
{
	public function insertBlog($data)
	{
		return $this->db->insert('blogs', $data);
	}

	public function selectBlog()
	{
		$query =  $this->db->get('blogs');
		return $query->result();
	}

	public function selectBlogById($id)
	{
		$query =  $this->db->get_where('blogs', ['id' => $id]);
		return $query->row();
	}

	public function updateBlog($id, $data)
	{
		return $this->db->update('blogs', $data, ['id' => $id]);
	}

	public function deleteBlog($id)
	{
		return $this->db->delete('blogs', ['id' => $id]);
	}
}
