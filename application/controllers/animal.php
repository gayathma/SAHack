<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Animal extends CI_Controller {

    function __construct() {
        parent::__construct();

//        if (!$this->session->userdata('USER_LOGGED_IN')) {
//            redirect(site_url() . '/login/load_login');
//        } else {
        $this->load->model('animal/animal_model');
        $this->load->model('animal/animal_service');

        $this->load->model('animal_category/animal_category_model');
        $this->load->model('animal_category/animal_category_service');

//        }
    }

    function manage_animal() {

        $animal_service          = new Animal_service();
        $animal_category_service = new Animal_category_service();

        $data['heading'] = "Manage Animals";
        $data['results'] = $animal_service->get_all_animals();
        $data['cats']    = $animal_category_service->get_all_animals_category();

        $parials = array('content' => 'animal/manage_animal_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function view_animal_map() {

        $animal_service = new Animal_service();
        $data['animals']=  json_encode($animal_service->get_all_animals_for_map());

        $parials = array('content' => 'animal/map_view');
        $this->template->load('template/main_template', $parials,$data);
    }

    function add_animal() {

        $animal_model   = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_a_name($this->input->post('name', TRUE));
        $animal_model->set_a_description($this->input->post('desc', TRUE));
        $animal_model->set_a_dob(date("Y-m-d H:i:s", strtotime($this->input->post('dob', TRUE))));
        $animal_model->set_a_dod(date("Y-m-d H:i:s", strtotime($this->input->post('dod', TRUE))));
        $animal_model->set_a_ac_id($this->input->post('category', TRUE));
        $animal_model->set_image($this->input->post('logo_image', TRUE));
        $animal_model->set_a_delete_index('0');

        echo $animal_service->add_new_animal($animal_model);
    }

    /*
     * This is to delete a animal
     */

    function delete_animals() {

        $animal_service = new Animal_service();

        echo $animal_service->delete_animal(trim($this->input->post('id', TRUE)));
    }

    /*
     * This is to change the published status of the animal 
     */

    function change_publish_status() {
        $animal_model   = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_id(trim($this->input->post('id', TRUE)));
        $animal_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $animal_service->publish_animal($animal_model);
    }

    /*
     * Edit animal pop up content set up and then send .
     */

    function load_edit_animal_content() {
        $animal_model   = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_id(trim($this->input->post('animal_id', TRUE)));
        $animal         = $animal_service->get_animal_by_id($animal_model);
        $data['animal'] = $animal;


        echo $this->load->view('animal/animal_edit_pop_up', $data, TRUE);
    }

    /*
     * This function is to update the animal details
     */

    function edit_animal() {

        $animal_model   = new Animal_model();
        $animal_service = new Animal_service();

        $animal_model->set_id($this->input->post('animal_id', TRUE));
        $animal_model->set_name($this->input->post('name', TRUE));
        $animal_model->set_updated_by($this->session->userdata('USER_ID'));
        $animal_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $animal_service->update_animal($animal_model);
    }

    function upload_animal_image() {

        $uploaddir  = './uploads/animal_image/';
        $unique_tag = 'ani';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file     = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

}
