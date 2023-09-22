<?php 

	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){

			$this->load->view('login/index');
		}

		function act_login(){

			$username = $this->input->post('username');
			$pass = $this->input->post('pass');

			$this->db->where('username', $username);
			$cekuser = $this->db->get('tbl_pengguna')->row_array();

			if($cekuser == true){

				if (password_verify($pass, $cekuser['password'])) {

					$data = [
						'username' => $username,
						'level' => $cekuser['level'],
					];
					$this->session->set_userdata($data);
					redirect('app/');
				}else{

					$this->session->set_flashdata('message', 'swal("Ops", "Password anda salah", "error" );');
					redirect('login');

				}
			}else{
				$this->session->set_flashdata('message', 'swal("Ops", "Akun anda tidak terdaftar", "error" );');
				redirect('login');
			}
		}

		function logout(){

			$this->session->unset_userdata('username');
			$this->session->unset_userdata('level');
			redirect('login/');
		}
	}

?>