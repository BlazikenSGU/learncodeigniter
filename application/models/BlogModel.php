<?php

class BlogModel extends CI_Model
{
	public function insertBlog($data)
	{
		return $this->db->insert('blogs', $data);
	}

	public function insertPost($data)
	{
		return $this->db->insert('posts', $data);
	}

	public function selectBlog()
	{
		$query =  $this->db->get('blogs');
		return $query->result();
	}

	public function selectPosts()
	{
		$query =  $this->db->get('posts');
		return $query->result();
	}

	public function selectAllPost()
	{
		$query =  $this->db->select('blogs.title as tendanhmuc, posts.*,')
			->from('blogs')
			->join('posts', 'posts.blog_id=blogs.id')
			->get();
		return $query->result();
	}

	public function selectBlogById($id)
	{
		$query =  $this->db->get_where('blogs', ['id' => $id]);
		return $query->row();
	}

	public function selectPostById($id)
	{
		$query =  $this->db->get_where('posts', ['id' => $id]);
		return $query->row();
	}

	public function updateBlog($id, $data)
	{
		return $this->db->update('blogs', $data, ['id' => $id]);
	}

	public function updatePost($id, $data)
	{
		return $this->db->update('posts', $data, ['id' => $id]);
	}

	public function deleteBlog($id)
	{
		return $this->db->delete('blogs', ['id' => $id]);
	}


	public function deletePost($id)
	{
		return $this->db->delete('posts', ['id' => $id]);
	}
}
