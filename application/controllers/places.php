<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Places extends CI_Controller {
	function __construct(){
		parent::__construct();	
		$this->load->model('session_model');
	}

	public function index(){
		if($this->session_model->checksession()){
			$this->load->view('header');
			$data['active'] = "places";
			$this->load->view('home_header',$data);
			/* retrive places */
			$this->load->model('Place','places');
			$data = array();
			if(!empty($this->places->getAll())) {
				$data['places'] = $this->places->getAll();
				$data['ettoreach'] = $this->places->getTTR();
			}

			$this->load->view('places',$data);
			$this->load->view('footer');
    	}else{
	       redirect('login');
	    }
	}

	public function addnew(){
		if($this->session_model->checksession()){
			$this->load->view('header');
			$data['active'] = 'places';
			$this->load->view('home_header',$data);
			$this->load->view('addnewplace');
			$this->load->view('footer');
    	}else{
	       redirect('login');
	    }
	}

	public function save(){
		if($this->session_model->checksession()){
			$name = $this->input->post('name');
			$location = $this->input->post('location');
			$locationMap = $this->input->post('locationMap');
			if($this->input->post('byfoot')){
				$byfoot = $this->input->post('byfoot');
			}else{
				$byfoot = "";
			}
			if($this->input->post('bybus')){
				$bybus = $this->input->post('bybus');
			}else{
				$bybus = "";
			}
			if($this->input->post('bycar')){
				$bycar = $this->input->post('bycar');
			}else{
				$bycar = "";
			}
			$menuItems = $this->input->post('description');

			$newPlace = array(
					'name' => $name,
					'location' => $location,
					'locationMap' => $locationMap,
					'ettr' => array(
							'byfoot' => $byfoot,
							'bybus' => $bybus,
							'bycar' => $bycar,
						),
					'description' => $menuItems
				);
			$this->load->model('Place','newplace');
			$this->newplace->add($newPlace);
    	}else{
	       redirect('login');
	    }
	}

	public function manage($placeNo = NULL){
		if($this->session_model->checksession()){
			$this->load->view('header');
			$data['active'] = 'places';
			$this->load->view('home_header',$data);
			$this->load->model('Place','places');
			$data = array();
			if(empty($placeNo)){
				/* retrive places */
				if(!empty($this->places->getAll())) {
					$data['places'] = $this->places->getAll();
					$data['ettoreach'] = $this->places->getTTR();
				}
				$this->load->view('manageplace',$data);
			}else{
				if(!empty($this->places->getPlaceInfo($placeNo))) {
					$data['placeInfo'] = $this->places->getPlaceInfo($placeNo);
					$data['ettr'] = $this->places->getTTRof($placeNo);
				}
				$this->load->view('editplace',$data);
			}
			$this->load->view('footer');
    	}else{
	       redirect('login');
	    }
	}

	public function edit(){
		if($this->session_model->checksession()){
			$name = $this->input->post('name');
			$placeNo = $this->input->post('placeNo');
			$location = $this->input->post('location');
			$locationMap = $this->input->post('locationMap');
			if($this->input->post('byfoot')){
				$byfoot = $this->input->post('byfoot');
			}else{
				$byfoot = "";
			}
			if($this->input->post('bybus')){
				$bybus = $this->input->post('bybus');
			}else{
				$bybus = "";
			}
			if($this->input->post('bycar')){
				$bycar = $this->input->post('bycar');
			}else{
				$bycar = "";
			}
			$description = $this->input->post('description');
			$uniqueId = substr(md5(microtime() + "_sagar#!$.@9"),6, 15);
			$modifyPlace = array(
					'name' => $name,
					'location' => $location,
					'locationMap' => $locationMap,
					'ettr' => array(
							'byfoot' => $byfoot,
							'bybus' => $bybus,
							'bycar' => $bycar,
						),
					'description' => $description,
					'uniqueId' => $uniqueId
				);
			$this->load->model('Place','editplace');

			/* check for valid place */
			$placeInfo = $this->editplace->getPlaceInfo($placeNo);

			if($placeInfo[0]->uniqueId == $this->session->flashdata('pid')){
				$modifyPlace['placeNo'] = $placeNo;
				$this->editplace->edit($modifyPlace,$placeNo);
				$this->session->set_flashdata('placeEdited', TRUE);
				redirect('places/manage/'.$placeNo);
			}else{
				$this->session->set_flashdata('wrongpid', TRUE);
				redirect('places/manage/'.$placeNo);
			}
			
    	}else{
	       redirect('login');
	    }
	}
	
	public function remove(){
		if($this->session_model->checksession()){
			$output = $this->input->post('places');
			//print_r($output);
			echo 'sdfd';
		}else{
			redirect('login');	
		}
	}
}

?>