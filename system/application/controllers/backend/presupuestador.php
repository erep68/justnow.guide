<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(SYSDIR.'/libraries/Backend.php');

class Presupuestador extends Backend{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $object = Doctrine_Query::create()
                ->from('Budgets')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    
    public function nuevo(){
        parent::_render();
    }
}  
?>