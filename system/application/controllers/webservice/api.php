<?php if ( ! defined('BASEPATH')) exit('No té permis per accedir directament');
require APPPATH.'/libraries/REST_Controller.php';


class Api extends REST_Controller {

	function __construct() {
            parent::__construct();
            //$this->load->library('ApiLib');
        }
		
	public function init_get(){
            echo 1;
        }    
	  
	public function test1_get()
	{

		$user = $this->uri->segment(3);
		$identy = $this->uri->segment(4);
		$response =$this->apilib->login($user, $identy);
		
		 if ($response){
			$data['contenido'] = 'test';
			$this->load->view('test', $data);
		}else{
			echo 'no tiene permiso';
			exit();
		}
	}

	public function product_get()
	{
		$user = $this->uri->segment(5);
		$identy = $this->uri->segment(6);
		$response =$this->apilib->login($user, $identy);
		if ($response){
			$this->load->model('model_productos');
	    	$producto = $this->model_productos->all();
	    	 if($producto)
		        {
		            $this->response($producto, 200); // 200 being the HTTP response code
		        }

		        else
		        {
		            $this->response(array('error' => 'No existen productos'), 404);
		        }
		    }else{
		    	$this->response(array('error' => 'No existen productos'), 404);
				exit();
		    }
	}
	
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */