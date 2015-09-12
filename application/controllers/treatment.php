<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Treatment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('treatment/Treatment_model');
        $this->load->model('treatment/Treatment_service');
    }

    function index() {
       $treatement_service = new Treatment_service();

        $data['heading'] = "Manage Treatment Categories";
        $data['results'] = $treatement_service->get_all_treatments();

        $parials = array('content' => 'treatment/treatment_view');
        $this->template->load('template/main_template', $parials, $data);
    }
    
    function add_treatment() {

        $treatment_model = new Treatment_model();
        $treatment_service = new Treatment_service();

        $treatment_model->set_t_name($this->input->post('name', TRUE));
        
        $treatment_model->set_t_description($this->input->post('description', TRUE));
        $treatment_model->set_t_delete_index('0');

        echo $treatment_service->add_new_treatment($treatment_model);
    } 
    
    
     /*
     * Edit transmission pop up content set up and then send .
     */

    function load_edit_treatment_content() {
        
        $treatment_model = new Treatment_model();
        $treatment_service = new Treatment_service();

        $treatment_model->set_t_id(trim($this->input->post('t_id', TRUE)));
        $treatment = $treatment_service->get_treatment_by_id($treatment_model);
        $data['treatment'] = $treatment;


        echo $this->load->view('treatment/treatment_edit_pop_up', $data, TRUE);
    }

    
    function edit_treat_cat() {

         $treatment_model = new Treatment_model();
        $treatment_service = new Treatment_service();

        $treatment_model->set_t_id($this->input->post('treat_cat_id', TRUE));
        $treatment_model->set_t_name($this->input->post('name', TRUE));
        $treatment_model->set_t_description($this->input->post('desc', TRUE));
        


        echo $treatment_service->update_treatment($treatment_model);
    }
    
    public function delete_treatment()
    {
        
            $treatment_service = new Treatment_service();

        echo $treatment_service->delete_treatment(trim($this->input->post('id', TRUE)));
    }
    
    
    
}


