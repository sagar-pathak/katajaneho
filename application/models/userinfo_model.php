<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userinfo_model extends CI_Model{
	function user($userid){
		$this->db->select('*');
		$this->db->from('userinfo');
		$this->db->where('uid',$userid);
		$this->db->limit(1);
		$query = $this->db ->get();
		if($query->num_rows == 1){
			return $query->result();
		}
	}
}