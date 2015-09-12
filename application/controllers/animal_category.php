<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Animal_category extends CI_Controller {

    function __construct() {
        parent::__construct();

//        if (!$this->session->userdata('USER_LOGGED_IN')) {
//            redirect(site_url() . '/login/load_login');
//        } else {
            $this->load->model('animal_category/animal_category_model');
            $this->load->model('animal_category/animal_category_service');

//        }
    }

    function manage_animal_category() {

        $animal_category_service = new Animal_category_service();

        $data['heading'] = "Manage Animal Categories";
        $data['results'] = $animal_category_service->get_all_animals_category();

        $parials = array('content' => 'animal_category/manage_animal_category_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function add_transmission() {

        $transmission_model = new Transmission_model();
        $transmission_service = new Transmission_service();

        $transmission_model->set_name($this->input->post('name', TRUE));
        $transmission_model->set_added_by($this->session->userdata('USER_ID'));
        $transmission_model->set_added_date(date("Y-m-d H:i:s"));
        $transmission_model->set_is_published('1');
        $transmission_model->set_is_deleted('0');

        echo $transmission_service->add_new_transmission($transmission_model);
    }

    /*
     * This is to delete a transmission
     */

    function delete_transmissions() {

        $transmission_service = new Transmission_service();

        echo $transmission_service->delete_transmission(trim($this->input->post('id', TRUE)));
    }

    /*
     * This is to change the published status of the transmission 
     */

    function change_publish_status() {
        $transmission_model = new Transmission_model();
        $transmission_service = new Transmission_service();

        $transmission_model->set_id(trim($this->input->post('id', TRUE)));
        $transmission_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $transmission_service->publish_transmission($transmission_model);
    }

    /*
     * Edit transmission pop up content set up and then send .
     */

    function load_edit_transmission_content() {
        $transmission_model = new Transmission_model();
        $transmission_service = new Transmission_service();

        $transmission_model->set_id(trim($this->input->post('transmission_id', TRUE)));
        $transmission = $transmission_service->get_transmission_by_id($transmission_model);
        $data['transmission'] = $transmission;


        echo $this->load->view('transmission/transmission_edit_pop_up', $data, TRUE);
    }

    /*
     * This function is to update the transmission details
     */

    function edit_transmission() {

        $transmission_model = new Transmission_model();
        $transmission_service = new Transmission_service();

        $transmission_model->set_id($this->input->post('transmission_id', TRUE));
        $transmission_model->set_name($this->input->post('name', TRUE));
        $transmission_model->set_updated_by($this->session->userdata('USER_ID'));
        $transmission_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $transmission_service->update_transmission($transmission_model);
    }

}
