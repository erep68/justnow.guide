<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(SYSDIR.'/libraries/Backend.php');

class Configuraciones extends Backend{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        parent::_render();
    }
}  
?>