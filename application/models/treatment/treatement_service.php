<?php

class Treatment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('treatment/treatment_model');
    }
}