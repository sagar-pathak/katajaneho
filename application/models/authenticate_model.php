<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authenticate_model extends CI_Model{
	function user($username, $password){
		$this->db->select('status,uid');
		$this->db->from('login');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}
}