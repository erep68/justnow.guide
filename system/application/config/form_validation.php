<?php

$ci = &get_instance();
$ci->load->helper('language');
$ci->lang->load('validation', $ci->session->userdata('lang'));

$config = array(
  'backend/auth' => array(
    array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
         ),
    array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
         )
    ),
  'frontend/contact' => array(
    array(
            'field' => 'contact_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
         ),
    array(
            'field' => 'contact_comments',
            'label' => 'Email',
            'rules' => 'trim|required'
         ),
    array(
            'field' => 'contact_name',
            'label' => 'Name',
            'rules' => 'trim|required'
         )
    ),
   
);
?>
