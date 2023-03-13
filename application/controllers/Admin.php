<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
	{
		parent::__construct();

		is_logged_in();
		$this->load->model('Posts_model');
    $this->load->model('Category_model');
	}

    public function index()
    {
        
    }
    public function mypost()
    {
        $data['title'] = 'My Post';
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        // untuk nama alias
        $this->load->model('Category_model', 'name_categori');
        // $data['posts'] = $this->Category_model->getPosts()->result_array();
        $data['posts'] = $this->name_categori->getPosts();
        $data['name_categori'] = $this->db->get('categories')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mypost');
        $this->load->view('templates/footer');
    }
    public function addmypost()
    {

        // $this->load->model('Category_model');
        // $data['getuser'] = $this->Category_model->getUser()->result_array();
        // var_dump($data[0]['name']);
        // die;

        $data['title'] = 'My Post';
        // $data['postt'] = $this->db->get('posts')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // untuk nama alias join
        $this->load->model('Category_model', 'name_categori');
        $data['posts'] = $this->name_categori->getPosts();
        $data['name_categori'] = $this->db->get('categories')->result_array();

        $this->_rules();

        if($this->form_validation->run() == false)
        {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('addmypost');
        $this->load->view('templates/footer');
        }else{
            $data=[
             'category_id' => $this->input->post('category_id'),
             'user_id' => $this->input->post('user_id'),
             'title' => $this->input->post('title'),
             'slug' => $this->input->post('slug'),
             'excerpt' => $this->input->post('excerpt'),
             'body' => $this->input->post('body')
            ];
            $this->db->insert('posts', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            New Post Added!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span> 
            </button>
          </div>');                                                                        
            redirect('admin/mypost');
        }
    }
    public function viewMypost($id)
    {
        //  $this->load->model('Posts_model');
        $data['detail']  = $this->Posts_model->detail_data($id);
        $data['d']  = $this->Posts_model->detail($id);
      
       $this->load->model('Category_model');
        $data['get'] = $this->Category_model->getPosts();
   
    $this->load->model('Posts_model', 'name_categori');
    $data['posts'] = $this->name_categori->category_viewdetail();
    $data['categori'] = $this->db->get('categories')->result();

    
      $data['title'] = 'View My Post';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 

    

       $this->load->view('templates/header', $data);
       $this->load->view('templates/sidebar');
       $this->load->view('viewMyPost', $data);
       $this->load->view('templates/footer');

    }
    public function edit_post($id)
    {
         $this->_rules();
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      // untuk nama alias
      $this->load->model('Category_model', 'name_categori');
      $data['posts'] = $this->name_categori->getPosts();
      $data['name_categori'] = $this->db->get('categories')->result_array();

      // $where = array('id' => $id);
      $data['edit'] = $this->Posts_model->edit_post($id);
      

        if($this->form_validation->run() == false)
        {
          $data['title'] = 'Edit Post';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('editmypost', $data);
          $this->load->view('templates/footer');
        }else{
          $data = [
            'id'=>$id,
            'category_id' => $this->input->post('category_id'),
            'title' => $this->input->post('title'),
            'slug' => $this->input->post('slug'),
            'excerpt' => $this->input->post('excerpt'),
            'body' => $this->input->post('body')
           ];
           $this->Category_model->update_post($data, 'posts');
           redirect('admin/mypost');
        }

    }


    public function _rules()
    {
      // $this->form_validation->set_rules('category_id', 'Category', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('slug', 'Slug', 'required');
      $this->form_validation->set_rules('excerpt', 'Excerpt', 'required');
      $this->form_validation->set_rules('body', 'body', 'required');
    }
    public function delete($id)
    {
      $where = array('id' => $id);
      $this->Posts_model->delete($where, 'posts');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Data Berhasil Didelete !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>');

      redirect('admin/mypost');
    }

    // Categories
    public function viewCategory()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['category'] = $this->db->get('categories')->result_array();
      $data['title'] = 'Categories';
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('Category/view_category');
      $this->load->view('templates/footer');
    }
    public function addcategory()
    {
      $data=[
        'name_categori' => $this->input->post('name_categori'),
       ];
       $this->db->insert('categories', $data);
       $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
       New Post Added!
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span> 
       </button>
     </div>');                                                                        
       redirect('admin/viewCategory');
    }
    public function edit_category($id)
    {
      $data = [
        'id'=> $id,
        'name_categori' => $this->input->post('name_categori')
      ];
      $this->Category_model->update_data($data, 'categories');
      redirect('admin/viewCategory');
    }
    public function delete_category($id)
    {
      $this->load->model('Posts_model');
      $where = array('id' => $id);
      $this->Posts_model->delete_category($where, 'categories');

      redirect('admin/viewCategory');
    }

}