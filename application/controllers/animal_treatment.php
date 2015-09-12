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
    
     function add_animal_treatment()
     {
          $animal_treatment_model = new Animal_treatment_model();
        $animal_treatment_service = new Animal_treatment_service();

        $animal_treatment_model->set_at_name($this->input->post('name', TRUE));
        $animal_treatment_model->set_at_animal_id($this->input->post('at_animal_id', TRUE));
        $animal_treatment_model->set_at_date(date('Y-m-d H:i:s'));
        $animal_treatment_model->set_at_done_by('fsfsfsfs', TRUE);
        $animal_treatment_model->set_at_treatment_id($this->input->post('at_t_id', TRUE));
        
        $animal_treatment_model->set_t_description($this->input->post('description', TRUE));
        $animal_treatment_model->set_t_delete_index('0');

        echo $animal_treatment_model->add_new_animal_treatment($animal_treatment_model);
         
     }
    
    
}
