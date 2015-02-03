<?php if( !defined('BASEPATH')) exit('No direct script acess allowed');

if(!function_exists('asset_url')){
	function asset_url(){
		return base_url().'assets/';
	}
}

if(!function_exists('place_url')){
	function place_url(){
		return base_url().'places/';
	}
}

if(!function_exists('user_url')){
	function user_url(){
		return base_url().'users/';
	}
}