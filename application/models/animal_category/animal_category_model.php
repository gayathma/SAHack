<?php

class Animal_model extends CI_Model {

    var $a_id;
    var $a_name;
    var $a_description;
    var $a_ac_id;
    var $a_dob;
    var $a_dod;
    var $a_delete_index;

    function __construct() {
        parent::__construct();
    }

    public function get_a_id() {
        return $this->a_id;
    }

    public function set_a_id($a_id) {
        $this->a_id = $a_id;
    }

    public function get_a_name() {
        return $this->a_name;
    }

    public function set_a_name($a_name) {
        $this->a_name = $a_name;
    }

    public function get_a_description() {
        return $this->a_description;
    }

    public function set_a_description($a_description) {
        $this->a_description = $a_description;
    }

    public function get_a_ac_id() {
        return $this->a_ac_id;
    }

    public function set_a_ac_id($a_ac_id) {
        $this->a_ac_id = $a_ac_id;
    }

    public function get_a_dob() {
        return $this->a_dob;
    }

    public function set_a_dob($a_dob) {
        $this->a_dob = $a_dob;
    }

    public function get_a_dod() {
        return $this->a_dod;
    }

    public function set_a_dod($a_dod) {
        $this->a_dod = $a_dod;
    }

    public function get_a_delete_index() {
        return $this->a_delete_index;
    }

    public function set_a_delete_index($a_delete_index) {
        $this->a_delete_index = $a_delete_index;
    }

}
