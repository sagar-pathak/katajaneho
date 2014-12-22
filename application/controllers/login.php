<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();	
        $this->load->helper('form');
        $this->load->model('authenticate_model','authorize');
        $this->load->model('userinfo_model','getinfo');
	}
    public function index() {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }
    function authenticate(){
    	if($_POST){
     		$username = $this->input->post('username');
     		$password = $this->input->post('password');
     		$result = $this->authorize->user($username, $password);
            if($result){
                if($result[0]->status == 1){
                    $userid = $result[0]->uid;
                    $userinfo = $this->getinfo->user($userid);
                    $name = $userinfo[0]->firstName." ".$userinfo[0]->middleName." ".$userinfo[0]->lastName;
                    echo $name;
                }else{
                    //user suspended
                }
            }else{
                $errors['login']['message'] = 'Authentication failed. Try again!';
                $data['errors'] = $errors;
                redirect('login');
            }
     	}else{
     		show_404();
     	}
    }

    function setusersession($user){

    }
}