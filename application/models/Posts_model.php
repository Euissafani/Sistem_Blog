<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model
{
    public function delete($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
    public function detail_data($id = NULL)
    {
      // $this->db->select('*');
	    // $this->db->from('posts'); // this is first table name
      // $this->db->where('posts.id', $id);
	    // $this->db->join('categories', 'categories.id = posts.category_id'); // this is second table name with both table ids
	    // $this->db->join('user', 'user.id = posts.user_id'); // this is second table name with both table ids
	    // $query = $this->db->get();
	    // return $query->row();

      return $this->db->get_where('posts', ['id' => $id])->row();
      // $query = $this->db->get_where('posts', array('id'=>$id))->row();
      // return $query;
    }
    public function detail($id)
    {
      $this->db->select('*');
	    $this->db->from('posts'); // this is first table name
      $this->db->where('posts.id', $id);
	    $this->db->join('categories', 'categories.id = posts.category_id'); // this is second table name with both table ids
	    $this->db->join('user', 'user.id = posts.user_id'); // this is second table name with both table ids
	    $query = $this->db->get();
	    return $query->row();

      // return $this->db->get_where('posts', ['id' => $id])->row();
      // $query = $this->db->get_where('posts', array('id'=>$id))->row();
      // return $query;
    }

    public function edit_post($id)
    {
      return $this->db->get_where('posts', ['id' => $id])->row_array();
      // $this->db->where('id_siswa', $data['id_siswa']);
    }
    public function proses_edit_pot()
    {
      $data = [
                "category_id" => $this->input->post('category_id'),
                // "user_id" => $this->input->post('user_id'),
                "title" => $this->input->post('title'),
                "slug" => $this->input->post('slug'),
                "excerpt" => $this->input->post('excerpt'),
                "body" => $this->input->post('body')
               ];
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('posts', $data);
    }
   
    public function delete_category($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }

    // tabel join category dan posts
    // public function category_viewdetail()
    // {
    //   $this->db->select('*');
    //   $this->db->from('categories');
    //   $this->db->join('posts', 'posts.category_id = categories.id');
    //   return $this->db->get('');
    // }
    public function category_viewdetail()
    {
      $this->db->select('*');
      $this->db->from('categories');
      $this->db->join('posts', 'posts.category_id = categories.id');
      return $this->db->get('');

    }
}