<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct()
{
	parent::__construct();
        is_logged_in();
        $this->load->model('Posts_model');
        $this->load->model('Category_model');
        
}
public function index()
{
      
        $data['posts'] = $this->Category_model->dashboardPosts();
        $data['post'] = $this->Category_model->dashboardPost();
      
        $data['title'] = 'Read Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
   
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');

           // $this->load->model('Category_model', 'name_categori');
        // $data['posts'] = $this->name_categori->getPosts();

        // $data['posts'] = $this->Category_model->getPosts();
          // var_dump($data);
        // die;
        // $data['name_categori'] = $this->db->get('categories')->result_array();
        // $data['users'] = $this->db->get('user')->result_array();
        // $data['posts'] = $this->db->get_where('posts', ['id' => $this->session->userdata('id')])->row_array();
        // $data['posts'] = $this->db->get('posts')->result_array();
}

// public function search()
// {
//    $keyword = $this->input->post('keyword');
//    $data['post'] = $this->Category_model->get_keyword($keyword);

// }

public function categories()
{
        $data['title'] = 'All Categories';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['categories'] = $this->db->get('categories')->result_array();

        $this->load->view('templates/header',$data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('categories', $data);
        $this->load->view('templates/footer');
}

public function post()
{
        $data['title'] = 'All Categories';
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
         // untuk nama alias
         $this->load->model('Category_model', 'name_categori');

         $data['posts'] = $this->name_categori->getPosts();
         $data['name_categori'] = $this->db->get('categories')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('post', $data);
        $this->load->view('templates/footer');
}

public function myaccount()
{
        $data['title'] = 'My Account';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('myaccount', $data);
        $this->load->view('templates/footer');  
}   

public function editProfile()
{
	$data['title']= 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name','Full Name', 'required|trim');

        if($this->form_validation->run() == false){

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('myaccount', $data);
                $this->load->view('templates/footer', $data);         
       }else{
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        // Cek jika ada gambar yang akan di upload atau di edit di dokumentasi namanya setting reference
        $upload_image = $_FILES['image']['name'];
        if($upload_image){
	        $config['allowed_types'] = 'gif|jpg|png';
	        // ukuran file 2mb - 2048
	        $config['max_size']     = '2048';
	        $config['max_width']    = 1024;
	        $config['upload_path'] = './assets/profile/';
	        $this->load->library('upload', $config);
	     if( $this->upload->do_upload('image'))
	        {
                  $old_image = $data['user']['image'];
               if($old_image != 'default.jpg')
		{
					
		}
                $new_image = $this->upload->data('file_name');
		$this->db->set('image', $new_image);
	        }else{
		echo $this->upload->display_errors();
	        }

        }
        $this->db->set('name',$name);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Your profile has been update!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> 
         </button>
         </div>'); 
	redirect('user/myaccount');
	}
}

}