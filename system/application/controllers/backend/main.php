<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(SYSDIR.'/libraries/Backend.php');

class Main extends Backend{
    public function __construct(){
        parent::__construct();
	if(!$this->session->userdata('user')->id)
		redirect('/backend/login');
    }
    
    public function index(){
        parent::_render();
    }
    public function visitas(){
        parent::_render();
    }
    public function pedidos(){
        parent::_render();
    }
    public function help(){
        parent::_render();
    }
}  
?>