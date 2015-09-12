<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register_Users extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('register_users/register_users_model');
        $this->load->model('register_users/register_users_service');
    }

    function load_registration() {

        $parials = array('content' => 'register_user/register');
        $this->template->load('template/main_template', $parials, $data);
    }

    function add_new_user() {

        $register_users_model = new Register_Users_model();
        $register_users_service = new Register_Users_service();

        $register_users_model->set_name($this->input->post('form_register_full_name', TRUE));
        $register_users_model->set_user_name($this->input->post('form_register_user_name', TRUE));
        $register_users_model->set_user_type('3');
        $register_users_model->set_email(trim($this->input->post('form_register_email', TRUE)));
        $register_users_model->set_address($this->input->post('form_register_address', TRUE));
        $register_users_model->set_contact1($this->input->post('form_register_contact', TRUE));
        $register_users_model->set_profile_pic('avatar.png');
        $register_users_model->set_password(md5($this->input->post('form_register_password', TRUE)));        
        $register_users_model->set_is_deleted('0');
        
        $register_users_service->add_new_user_registration($register_users_model);
        
    }
   
}
