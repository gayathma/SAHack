<?php

class Animal_category_model extends CI_Model {

    var $ac_id;
    var $ac_name;
    var $ac_description;
    var $ac_latitude;
    var $ac_longitude;
    var $ac_delete_index;

    function __construct() {
        parent::__construct();
    }

    public function get_ac_id() {
        return $this->ac_id;
    }

    public function set_ac_id($ac_id) {
        $this->ac_id = $ac_id;
    }

    public function get_ac_name() {
        return $this->ac_name;
    }

    public function set_ac_name($ac_name) {
        $this->ac_name = $ac_name;
    }

    public function get_ac_description() {
        return $this->ac_description;
    }

    public function set_ac_description($ac_description) {
        $this->ac_description = $ac_description;
    }

    public function get_ac_latitude() {
        return $this->ac_latitude;
    }

    public function set_ac_latitude($ac_latitude) {
        $this->ac_latitude = $ac_latitude;
    }

    public function get_ac_longitude() {
        return $this->ac_longitude;
    }

    public function set_ac_longitude($ac_longitude) {
        $this->ac_longitude = $ac_longitude;
    }

    public function get_ac_delete_index() {
        return $this->ac_delete_index;
    }

    public function set_ac_delete_index($ac_delete_index) {
        $this->ac_delete_index = $ac_delete_index;
    }

}
