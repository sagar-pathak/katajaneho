<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session_model extends CI_Model{
	function setsession($string,$userid){
		$array = array(
			'session' => $string
			);
		$this->db->where('uid',$userid);
		$this->db->update('login',$array);
	}

	function checksession(){
		$sessid = $this->session->userdata('session_id');
        $uid   = $this->session->userdata('id');

		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('session',$sessid);
		$this->db->where('uid',$uid);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows()==1){
			return true;
		}else{
			return false;
		}
	}
}