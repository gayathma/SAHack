<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Animal_treatment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('animal_treatment/Animal_treatment_model');
        $this->load->model('animal_treatment/Animal_treatment_service');
    }

    function index() {
        $this->load->view('login/login');
    }
}
