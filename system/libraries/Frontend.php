<?php
require_once(SYSDIR.'/core/Controller.php');

class Frontend extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    

    public function _render($template = 'frontend'){
        $this->ocular->render($template);
    }
    
    
    
}

