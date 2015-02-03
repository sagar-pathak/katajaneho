<?php

if(!(defined("BASEPATH")))
	exit('No direct script access allowed');

class Users extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('session_model');
	}

	public function index(){
		if($this->session_model->checksession()){
			$this->load->view('header');
			$data['active'] = 'users';
			$this->load->view('home_header',$data);
			$this->load->view('users');
			$this->load->view('footer');
    	}else{
	       redirect('login');
	    }
	}
}