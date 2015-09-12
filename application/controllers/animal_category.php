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

    function add_animal_cat() {

        $animal_category_model   = new Animal_category_model();
        $animal_category_service = new Animal_category_service();

        $animal_category_model->set_ac_name($this->input->post('name', TRUE));
        $animal_category_model->set_ac_description($this->input->post('desc', TRUE));
        $animal_category_model->set_ac_latitude($this->input->post('latitude', TRUE));
        $animal_category_model->set_ac_longitude($this->input->post('longitude', TRUE));
        $animal_category_model->set_ac_delete_index('0');

        echo $animal_category_service->add_new_animal_category($animal_category_model);
    }

    /*
     * This is to delete a animal_cat
     */

    function delete_animal_cats() {

        $animal_category_service = new Animal_category_service();

        echo $animal_category_service->delete_animals_category(trim($this->input->post('id', TRUE)));
    }

    /*
     * Edit animal_cat pop up content set up and then send .
     */

    function load_edit_animal_cat_content() {
        $animal_category_model   = new Animal_category_model();
        $animal_category_service = new Animal_category_service();

        $animal_category_model->set_ac_id(trim($this->input->post('animal_cat_id', TRUE)));
        $animal_cat         = $animal_category_service->get_animals_category_by_id($animal_category_model);
        $data['animal_cat'] = $animal_cat;


        echo $this->load->view('animal_category/animal_category_edit_pop_up', $data, TRUE);
    }

    /*
     * This function is to update the animal_cat details
     */

    function edit_animal_cat() {

        $animal_category_model   = new Animal_category_model();
        $animal_category_service = new Animal_category_service();

        $animal_category_model->set_ac_id($this->input->post('animal_cat_id', TRUE));
        $animal_category_model->set_ac_name($this->input->post('name', TRUE));
        $animal_category_model->set_ac_description($this->input->post('desc', TRUE));
        $animal_category_model->set_ac_latitude($this->input->post('latitude', TRUE));
        $animal_category_model->set_ac_longitude($this->input->post('longitude', TRUE));


        echo $animal_category_service->update_animals_category($animal_category_model);
    }

}
