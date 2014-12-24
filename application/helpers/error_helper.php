<?php if( !defined('BASEPATH')) exit('No direct script acess allowed');

if(!function_exists('seterror')){
	function errormessage(){
		$errors = array(
			'login' => array(
					'authfailed' => 'Authentication failed. Try again!',
					'usersuspended' => 'Authentication failed. Try again! sus'
				)
		);
		return $errors;
	}
	
	function seterror($egroup, $ekey, $pageToRedirect=NULL){
		$CI = &get_instance(); 
		$errors = errormessage();
		$errValue = $errors[$egroup][$ekey];
		$errorArray = array(
					$egroup => array(
							$ekey => $errValue
						)
			);
		if(!empty($CI->session->userdata('errors'))){
			$existingErrors = $CI->session->userdata('errors');
			$updatedErrorArray  = array_merge_recursive($existingErrors, $errorArray);
			$CI->session->set_userdata('errors',$updatedErrorArray);
		}else{
			$CI->session->set_userdata('errors',$errorArray);
		}
		if(!empty($pageToRedirect)){
			redirect($pageToRedirect);
		}
	}

	function printerror($egroup=NULL, $ekey=NULL){
		$CI = &get_instance();
		$errors = $CI->session->userdata('errors');
		if(!empty($errors)){
			if(array_key_exists($egroup, $errors)){
				$errorGroup = $errors[$egroup];
				if(is_array($ekey)){
					foreach($ekey as $key):
						if(array_key_exists($key, $errorGroup)){
							echo $errors[$egroup][$key];
							unset($errors[$egroup][$key]);
							$CI->session->set_userdata('errors',$errors);
						}
					endforeach;
				}else{
					if(array_key_exists($ekey, $errorGroup)){
						echo $errors[$egroup][$ekey];
						unset($errors[$egroup][$ekey]);
						$CI->session->set_userdata('errors',$errors);
					}
				}
			}
		}	
	}

	function error_exists($egroup=NULL, $ekey=NULL){
		$CI = &get_instance();
		$errors = $CI->session->userdata('errors');
		$flag = false;
		if(!empty($errors)){
			if(!empty($egroup) || !empty($ekey)){
				if(array_key_exists($egroup, $errors)){
					$errorGroup = $errors[$egroup];
					if(is_array($ekey)){
						foreach($ekey as $key):
							if(array_key_exists($key, $errorGroup)){
								$flag = true;
								break;
							}
						endforeach;
					}else{
						if(array_key_exists($ekey, $errorGroup)){
							$flag = true;
						}
					}
				}
			}else{
				$flag = true;
			}
		}	
		return $flag;
	}
}