<?php

class Animal_treatment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('animal_treatment/animal_treatment_model');
    }
}