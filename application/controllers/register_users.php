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
        $register_users_service = new Register_Users_service();
        
        $data['results']=$register_users_service->get_user_details();

        $parials = array('content' => 'register_user/register');
        $this->template->load('template/main_template', $parials,$data);
    }

    function add_new_user() {

        $register_users_model = new Register_Users_model();
        $register_users_service = new Register_Users_service();

        $register_users_model->set_name($this->input->post('name', TRUE));
        $register_users_model->set_user_name($this->input->post('user_name', TRUE));
        $register_users_model->set_user_type('Admin','Manager','Surgeon','Op');
        $register_users_model->set_email(trim($this->input->post('email', TRUE)));
        $register_users_model->set_address($this->input->post('address', TRUE));
        $register_users_model->set_password(md5($this->input->post('password', TRUE)));
        $register_users_model->set_contact1($this->input->post('contact_no_1', TRUE));       
        $register_users_model->set_is_deleted('0');
        
       echo $register_users_service->add_new_user_registration($register_users_model);
        
    }
   
}
