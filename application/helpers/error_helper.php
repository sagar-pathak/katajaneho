<?php if( !defined('BASEPATH')) exit('No direct script acess allowed');

if(!function_exists('geterror')){
	$errors = array(
			'login' => array(
					'authfailed' => 'Authentication failed. Try again!',
					''
				),
		);
	
	function geterror(){
		
	}
}