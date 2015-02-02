<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(SYSDIR.'/libraries/Backend.php');

class Administrar extends Backend{
    public function __construct(){
        parent::__construct();
         //Mensajes de validacion
        $this->form_validation->set_message('required','El campo %s es obligatorio');
        $this->form_validation->set_message('min_length[3]','El campo %s debe tener mas de 3 caracteres');
        $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
        $this->form_validation->set_message('matches','El campo %s no coincide');
    }
    
    public function index(){
        parent::_render();
    }
    
    public function agentes(){
        $object = Doctrine_Query::create()
                ->from('AclUsers')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    public function departamentos(){
        $object = Doctrine_Query::create()
                ->from('Departments')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    public function categorias(){
        $object = Doctrine_Query::create()
                ->from('ServiceCategory')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    public function productos(){
        $object = Doctrine_Query::create()
                ->from('ServiceLine')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    public function paquetes(){
        $object = Doctrine_Query::create()
                ->from('ServicePack')
                ->where('customer_id = ?',$this->user->customer_id)
                ->execute();
        
        $this->ocular->set('object',$object);
        parent::_render();
    }
    //-----------NUEVOS REGISTROS----------------
    public function newAgent(){
        //Reglas de validacion
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $this->form_validation->set_rules('last_name', 'Apellidos', 'required|min_length[5]');
        $this->form_validation->set_rules('username', 'Usuario', 'required|min_length[5]|trim');
        $this->form_validation->set_rules('password','Password','matches[rpassword]|trim|required|sha1');
        $this->form_validation->set_rules('rpassword','Repite','trim|required|sha1');
        $this->form_validation->set_rules('email', 'E-mail', 'required|min_length[6]|trim');

       

        if(!empty($_POST)){ 
            $check = false;
            if($this->form_validation->run()!=false){//Si la validación es correcta
                if($this->input->post('active') == 'on') $check = true;
                    $AclUsers = new AclUsers();
                    $AclUsers->username = $this->input->post('username');
                    $AclUsers->password = $this->input->post('password');
                    $AclUsers->site_id = 1;
                    $AclUsers->email = $this->input->post('email');
                    $AclUsers->name = $this->input->post('name');
                    $AclUsers->last_name = $this->input->post('last_name');
                    $AclUsers->active = $check;
                    $AclUsers->last_joined_datetime = date('Y-m-d H:i:s');
                    $AclUsers->created_datetime = date('Y-m-d H:i:s');
                    $AclUsers->modified_datetime = date('Y-m-d H:i:s');
                    $AclUsers->customer_id = $this->user->customer_id;
                    $AclUsers->save();
                    $AclUserHasRole = new AclUserHasRole();
                    $AclUserHasRole->user_id = $AclUsers->id;
                    $AclUserHasRole->role_id = 2;
                    $AclUserHasRole->save();
                    $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
                    redirect(base_url().'backend/administrar/agentes');
                }
            }
         parent::_render();
    }
    public function newDepartament(){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        if($this->form_validation->run()!=false){
            if($this->input->post('active') == 'on')$check = true;
            $Departments = new Departments();
            $Departments->name = $this->input->post('name');
            $Departments->active = $check;
            $Departments->customer_id = $this->user->customer_id;
            $Departments->save();
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/departamentos');
        }
         parent::_render();
    }
    public function newCategory(){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|min_length[5]');
        if($this->form_validation->run()!=false){
            if($this->input->post('active') == 'on')$check = true;
            $ServiceCategory = new ServiceCategory();
            $ServiceCategory->name = $this->input->post('name');
            $ServiceCategory->description = $this->input->post('description');
            $ServiceCategory->active = $check;
            $ServiceCategory->image = "";
            $ServiceCategory->customer_id = $this->user->customer_id;
            $ServiceCategory->save();
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/categorias');
        }
         parent::_render();
    }
    public function newProducts(){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|min_length[2]');
        $this->form_validation->set_rules('price', 'Precio', 'required|numeric|trim');

       
        if($this->form_validation->run()!=false){

            //id categoria seleccionada
            $object = Doctrine_Core::getTable('ServiceCategory')->findOneByname($this->input->post('theinput'));
            if($this->input->post('active') == 'on')$check = true;

            //guardo producto
            $ServiceLine = new ServiceLine();
            $ServiceLine->name = $this->input->post('name');
            $ServiceLine->description = $this->input->post('description');
            $ServiceLine->price = $this->input->post('price');
            $ServiceLine->active = $check;
            $ServiceLine->customer_id = $this->user->customer_id;
            $ServiceLine->save();

            //mensaje ok y redireccion
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/productos');
        }
        parent::_render();
    }

    //----------------MODIFICACIONES------------------

    public function updateAgente($id){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $this->form_validation->set_rules('last_name', 'Apellidos', 'required|min_length[5]');
        $this->form_validation->set_rules('username', 'Usuario', 'required|min_length[5]|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|min_length[6]|trim');
        $object = Doctrine_Core::getTable('AclUsers')->findOneById($id);      
        $this->ocular->set('object',$object);
        if($this->form_validation->run()!=false || !empty($_POST)){
            if($this->input->post('active') == 'on')$check = true;
            $object->name = $this->input->post('name');
            $object->last_name = $this->input->post('last_name');
            $object->username = $this->input->post('username');
            $object->email = $this->input->post('email');
            $object->active = $check;
            $object->save();
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/agentes');
        }
        parent::_render();        
    }
    public function updateDepartament($id){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $object = Doctrine_Core::getTable('Departments')->findOneById($id);
        $this->ocular->set('object',$object);
        if($this->form_validation->run()!=false || !empty($_POST)){ 
            if($this->input->post('active') == 'on')$check = true;
            $object->name = $this->input->post('name');
            $object->active = $check;
            $object->save();
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/departamentos');
        }
        parent::_render();
    }
    public function updateCategory($id){
        $check = false;
        $this->form_validation->set_rules('name', 'Nombre', 'required|min_length[2]|trim');
        $this->form_validation->set_rules('description', 'Descripción', 'required|min_length[2]');
        $object = Doctrine_Core::getTable('ServiceCategory')->findOneById($id);
        $this->ocular->set('object',$object);
        if($this->form_validation->run()!=false || !empty($_POST)){ 
            if($this->input->post('active') == 'on')$check = true;
            $object->name = $this->input->post('name');
            $object->description = $this->input->post('description');
            $object->active = $check;
            $object->save();
            $this->session->set_flashdata('mensaje','Se ha guardado con éxito');
            redirect(base_url().'backend/administrar/categorias');
        }
        parent::_render();
    }
}  
?>