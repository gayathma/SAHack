<?php

class Animal_treatment_model extends CI_Model {

    var $at_id;
    var $at_name;
    var $at_description;
    var $at_date;
    var $at_done_by;
    var $at_animal_id;
    var $at_treatment_id;
    var $at_delete_index;
    
    public function get_at_id() {
        return $this->at_id;
    }

    public function set_at_id($at_id) {
        $this->at_id = $at_id;
    }

    public function get_at_name() {
        return $this->at_name;
    }

    public function set_at_name($at_name) {
        $this->at_name = $at_name;
    }

    public function get_at_description() {
        return $this->at_description;
    }

    public function set_at_description($at_description) {
        $this->at_description = $at_description;
    }

    public function get_at_date() {
        return $this->at_date;
    }

    public function set_at_date($at_date) {
        $this->at_date = $at_date;
    }

    public function get_at_done_by() {
        return $this->at_done_by;
    }

    public function set_at_done_by($at_done_by) {
        $this->at_done_by = $at_done_by;
    }

    public function get_at_animal_id() {
        return $this->at_animal_id;
    }

    public function set_at_animal_id($at_animal_id) {
        $this->at_animal_id = $at_animal_id;
    }

    public function get_at_treatment_id() {
        return $this->at_treatment_id;
    }

    public function set_at_treatment_id($at_treatment_id) {
        $this->at_treatment_id = $at_treatment_id;
    }

    public function get_at_delete_index() {
        return $this->at_delete_index;
    }

    public function set_at_delete_index($at_delete_index) {
        $this->at_delete_index = $at_delete_index;
    }


    
}