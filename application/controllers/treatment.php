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
        $this->load->view('login/login');
    }
}


