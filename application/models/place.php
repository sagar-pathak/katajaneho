<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Place extends CI_Model{
	function add($placeInfo){
		$dataArray = $placeInfo;
		unset($dataArray['ettr']);
		/* get place no */
		$this->db->select('placeNo');
		$this->db->from('places');
		$this->db->order_by('placeNo','DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows == 1){
			$result = $query->result();
			$placeNo = $result[0]->placeNo + 1;
		}else{
			$placeNo = 1;
		}
		/*! place no */

		/* unique id */
		$uniqueId = substr(md5(microtime() + "_sagar#!$.@9"),6, 15);
		/*! unique id */
		$dataArray['uniqueId'] = $uniqueId;
		$this->db->insert('places',$dataArray);
		$placeInfo['ettr']['to'] = $placeNo;
		$this->db->insert('ettoreach',$placeInfo['ettr']);
		$this->session->set_flashdata('newPlaceAdded', TRUE);
		redirect(place_url().'addnew');
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('places');
		$this->db->order_by('name','ASC');
		$query = $this->db->get();
		if($query->num_rows > 0){
			$result = $query->result();
		}else{
			$result = array();
		}
		return $result;
	}

	function getTTR(){
		$this->db->select('*');
		$this->db->from('ettoreach');
		$query = $this->db->get();
		if($query->num_rows > 0){
			$result = $query->result();
		}else{
			$result = array();
		}
		return $result;
	}

	function getPlaceInfo($placeNo){
		$this->db->select('*');
		$this->db->from('places');
		$this->db->where('placeNo',$placeNo);
		$query = $this->db->get();
		if($query->num_rows > 0){
			$result = $query->result();
			$this->session->set_flashdata('pid', $result[0]->uniqueId);
		}else{
			$result = array();
		}
		return $result;
	}

	function getTTRof($placeNo){
		$this->db->select('*');
		$this->db->from('ettoreach');
		$this->db->where('to',$placeNo);
		$query = $this->db->get();
		if($query->num_rows > 0){
			$result = $query->result();
		}else{
			$result = array();
		}
		return $result;
	}

	function edit($placeInfo){
		$uniqueId = $this->session->flashdata('pid');
		$ettr = $placeInfo['ettr'];
		unset($placeInfo['ettr']);
		$this->db->where('uniqueId',$uniqueId);
		$this->db->update('places',$placeInfo); 
		$this->db->where('to',$placeInfo['placeNo']);
		$this->db->update('ettoreach',$ettr);
	}
}