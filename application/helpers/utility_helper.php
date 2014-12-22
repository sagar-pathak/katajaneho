<?php if( !defined('BASEPATH')) exit('No direct script acess allowed');

if(!function_exists('asset_url')){
	function asset_url(){
		return base_url().'assets/';
	}
}