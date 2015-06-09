<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function validate_reg($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name','required|trim|ucwords');
		$this->form_validation->set_rules('last_name','Last Name','required|trim|ucwords');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]|strtolower');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required');
		if($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function insert_user($post)
	{
		$query = "INSERT INTO users(first_name, last_name, email, password, created_at, updated_at)
				  VALUES (?,?,?,?,NOW(),NOW())";
		$values = array($post['first_name'],$post['last_name'],$post['email'],$post['password']);
		$this->db->query($query,$values);
	}

	public function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login_email', 'Email', 'required');
		$this->form_validation->set_rules('login_password','Password','required|trim|md5');
		if($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function find_user($post)
	{
		$query = 'SELECT * FROM Users WHERE email = ? AND password = ?';
		$values = array($post['login_email'], $post['login_password']);
		$result = $this->db->query($query, $values)->row_array();
		return $result;
	}
}
