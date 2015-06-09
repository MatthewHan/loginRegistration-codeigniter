<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$this->load->model('user');
		if($this->user->validate_login($this->input->post())==FALSE)
		{
			$this->index();
		}
		else
		{

			$user = $this->user->find_user($this->input->post());
			if($user)
			{
				$this->session->set_flashdata('homepage', 'YOU MADE IT !>!?!!?!?!');
				redirect('/home');
			}
			else
			{
				$this->session->set_flashdata('login_error','Email/Password Combination Does Not Match');
				$this->index();
			}
		}
		$this->session->set_flashdata('login_errors','Email/Password does not match');
	}
	public function register()
	{
		$this->load->model('user');
		if($this->user->validate_reg($this->input->post())==FALSE)
		{
			$this->index();
		}
		else
		{
			$this->user->insert_user($this->input->post());
			$this->session->set_flashdata('registered', 'You have successfully registered. Please login to continue.');
			redirect(base_url());
		}
	}
	public function home()
	{
		$this->load->view('homepage');
	}
}
