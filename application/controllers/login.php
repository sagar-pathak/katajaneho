<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();	
        $this->load->helper('form');
        $this->load->model('authenticate_model','authorize');
        $this->load->model('userinfo_model','getinfo');
        $this->load->model('session_model');
        $this->load->helper('error');
	}
    public function index() {
    	if($this->session_model->checksession()){
    		redirect('home');
    	}else{
	        $this->load->view('header');
	        $this->load->view('login_header');
	        $this->load->view('login');
	        $this->load->view('footer');
	    }
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
                    $this->setsessionflag($userinfo,$userid);
                    redirect('home');
                }else{
                   seterror('login','usersuspended','login');
                }
            }else{
            	seterror('login','authfailed','login');
            }
     	}else{
     		show_404();
     	}
    }
    function setsessionflag($userinfo,$userid){
        $name = $userinfo[0]->firstName." ".$userinfo[0]->middleName." ".$userinfo[0]->lastName;
        $userdata['name'] = $name;
        $userdata['email']= $userinfo[0]->email;
        $userdata['id'] = $userid;
        $this->session->set_userdata($userdata);
        $this->session_model->setsession($this->session->userdata('session_id'),$userid);
    }
}