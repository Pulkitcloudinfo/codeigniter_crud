<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index(){
		log_message('error', 'Some variable did not contain a value.'); 
		$data['users'] = $this->users_model->getAllUsers();
		$this->load->view('user_list.php', $data);
		
	}

	public function addnew(){
		log_message('error', 'Some variable did not contain a value.'); 
		$this->load->view('addform.php');

	}

	public function insert(){
		log_message('error', 'Some variable did not contain a value.'); 
		$user['username'] = $this->input->post('username');
		$user['password'] = $this->input->post('password');
		$user['fname'] = $this->input->post('fname');
		
		$query = $this->users_model->insertuser($user);

		if($query){
			header('location:'.base_url().$this->index());
		}

	}

	public function edit($id){
		log_message('error', 'Some variable did not contain a value.'); 
		$data['user'] = $this->users_model->getUser($id);
		$this->load->view('editform', $data);
	}

	public function update($id){
		log_message('error', 'Some variable did not contain a value.'); 
		$user['username'] = $this->input->post('username');
		$user['password'] = $this->input->post('password');
		$user['fname'] = $this->input->post('fname');

		$query = $this->users_model->updateuser($user, $id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		log_message('error', 'Some variable did not contain a value.'); 
		$query = $this->users_model->deleteuser($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>