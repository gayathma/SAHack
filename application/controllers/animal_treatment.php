<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Animal_treatment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('animal_treatment/Animal_treatment_model');
        $this->load->model('animal_treatment/Animal_treatment_service');
        
        
           $this->load->model('animal/Animal_model');
        $this->load->model('animal/Animal_service');
        
             $this->load->model('animal/Animal_model');
        $this->load->model('animal/Animal_service');
        
         $this->load->model('treatment/Treatment_model');
        $this->load->model('treatment/Treatment_service');
        
        
    }

    function index() {
         $animal_treatment_service = new Animal_treatment_service();
         $animal_service=new Animal_service();
         $treatment_service=new Treatment_service();

        $data['heading'] = "Animal Treatment";
        $data['treatment_detils']=$treatment_service->get_all_treatments();
        $data['animal_details']=$animal_service->get_all_animals();
        $data['results'] = $animal_treatment_service->get_all_animal_treatments();

        $parials = array('content' => 'treatment/animal_treatment_view');
        $this->template->load('template/main_template', $parials, $data);
    }
}
