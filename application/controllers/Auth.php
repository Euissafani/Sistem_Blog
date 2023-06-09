<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->library('form_validation');
	}

	public function index()
	{
        // Agar tidak bisa akses auth setelah login
		// if($this->session->userdata('email'))
		// {
		// 	redirect('user');
		// }
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password','trim|required');

		if($this->form_validation->run() == false){
            
            $data['title'] = 'User Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login' , $data);
            $this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
      
	}

    private function _login()
	{
       $email= $this->input->post('email');
	   $password = $this->input->post('password');

	// get where artinya select * form table user where emailnya = $email, row_array untuk dapatkan satu baris
	   $user = $this->db->get_where('user', ['email' => $email])->row_array();
	//    var_dump($user);
	//    die;

	// jika user ada
	if($user){
		// Jika Usernya Aktif
		if($user['is_active'] == 1){
			// Cek Password
			if(password_verify($password, $user['password'])){
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				// untuk cek role
				if($user['role_id'] == 1)
				{
					redirect('admin');
				}  else{
					redirect('user');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Wrong password !
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');  
				redirect('auth');
			}
			
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		    This email has not been activated!
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
	        </div>');  
	        redirect('auth');
		}

	}else{
		// Berikan pesan error
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Email is not registered!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');  
	  redirect('auth');
	}

	}


	public function registration()
	{

        // Agar tidak bisa akses registrasi setelah login
		// if($this->session->userdata('email'))
		// {
		// 	redirect('user');
		// }

    // Untuk Mengatur rule yang akan di berikan
		$this->form_validation->set_rules('name', 'Name','required|trim');
		$this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password dont matches!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');
       

          // Kondisi jika berhasil registrasi dan tidak 
		if($this->form_validation->run() == false){

			$data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
		}else{
            // $data ini di gunakan untuk agara user yang registrasi adalah memeber 
			$data = [
				// true di gunakan untuk menghindaro cross side scripting
				'name' => htmlspecialchars($this->input->post('name',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'image' => 'default.jpg',
				// 'password' => md5($this->input->post('password1')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Congratulation your account has been created. Please Login!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span> 
			</button>
		    </div>');                                                                        
			redirect('auth');
		}
      
	}	

    public function logout()
	{
           $this->session->unset_userdata('email');
           $this->session->unset_userdata('role_id');

           $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            You have been logout!
	         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	         <span aria-hidden="true">&times;</span> 
	        </button>
	        </div>');                                                                        
	        redirect('auth');
	}

}