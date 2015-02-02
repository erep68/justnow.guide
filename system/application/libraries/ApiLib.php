<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');
class ApiLib {

    function __construct(){
    	$this->CI = & get_instance();
     	$this->CI->load->model('model_api');
      
    }
  
    public function login($user, $identy)
    {
    	$response = $this->CI->model_api->login($user, $identy);
    	if ($response->num_rows() > 0){
    		return true;
    	}else{
    		return false;
    	}
    }
    
}

