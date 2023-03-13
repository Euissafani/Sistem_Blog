<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getPosts()
    {
        $query = "SELECT `posts`.*, `categories`.`name_categori`
                 FROM `posts` JOIN `categories`
                 ON `posts`.`category_id` = `categories`.`id`
                 ";
        return  $this->db->query($query)->result_array();
    }
    public function dashboardPosts()
    {
        $this->db->select('*');
	    $this->db->from('categories'); // this is first table name
	    $this->db->join('posts', 'posts.category_id = categories.id','right'); // this is second table name with both table ids
	    $this->db->join('user', 'user.id = posts.user_id','left'); // this is second table name with both table ids
	    $query = $this->db->get();
	    return $query->result_array();
    }
    public function dashboardPost()
    {
        $this->db->select('*');
	    $this->db->from('categories'); // this is first table name
	    $this->db->join('posts', 'posts.category_id = categories.id','right'); // this is second table name with both table ids
	    $this->db->join('user', 'user.id = posts.user_id','left'); // this is second table name with both table ids
	    $query = $this->db->get();
	    return $query->row();
    }
    public function getUser()
    {
 
        $query = "SELECT `posts`.*, `user`.`name`
                 FROM `posts` JOIN `user`
                 ON `posts`.`user_id` = `user`.`id`
                 ";
        return  $this->db->query($query)->result_array();
    }

    public function update_data($data, $table)
	{
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
	}
    public function update_post($data, $table)
	{
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
	}
}