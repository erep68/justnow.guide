<?php
require_once(SYSDIR.'/core/Controller.php');

class Backend extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }
    
    public function _render($template = 'backend'){
        $this->ocular->render($template);
    }
    
}

