<?php if ( ! defined('BASEPATH')) exit('No se puede acceder directamente al script');

require_once(SYSDIR.'/libraries/Backend.php');

class Login extends Backend{
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
    	$this->load->library('encrypt');
        
        $this->session->unset_userdata('user');
       
        
        if(!empty($_POST)){
            $user = Doctrine_Core::getTable('AclUsers')->findOneByUsernameAndPasswordAndActive($_POST['username'],$this->encrypt->sha1($_POST['password']),1);
            if($user){
            	$user->last_joined_datetime = date('Y-m-d H:i:s');
            	$user->save();
            	$this->session->set_userdata('user',$user);
                redirect('backend/main');
            }else{
                $this->error = true;
                $this->ocular->set('error', 'The email address and password you entered do not match.');
            }
        }
        parent::_render('login');

    } 
}  
?>