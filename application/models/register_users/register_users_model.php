<?php

class Register_Users_model extends CI_Model {

    var $id;
    var $name;
    var $email;
    var $address;
    var $contact_no_1;
    var $user_name;
    var $password;
    var $user_type;
    var $added_date;
    var $is_published;
    var $is_deleted;
    var $profile_pic;
    var $updated_date;

    function __construct() {
        parent::__construct();
    }

    function set_id($id) {
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

    function set_user_name($user_name) {
        $this->user_name = $user_name;
    }

    function get_user_name() {
        return $this->user_name;
    }

    function set_user_type($user_type) {
        $this->user_type = $user_type;
    }

    function get_user_type() {
        return $this->user_type;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function get_email() {
        return $this->email;
    }

    function set_profile_pic($profile_pic) {
        $this->profile_pic = $profile_pic;
    }

    function get_profile_pic() {
        return $this->profile_pic;
    }

    function set_address($address) {
        $this->address = $address;
    }

    function get_address() {
        return $this->address;
    }

    function set_contact1($contact_no_1) {
        $this->contact_no_1 = $contact_no_1;
    }

    function get_contact1() {
        return $this->contact_no_1;
    }

    function set_password($password) {
        $this->password = $password;
    }

    function get_password() {
        return $this->password;
    }

    function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    function get_is_published() {
        return $this->is_published;
    }

    function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    function get_is_deleted() {
        return $this->is_deleted;
    }

    function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    function get_added_date() {
        return $this->added_date;
    }

    function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    function get_updated_date() {
        return $this->updated_date;
    }

}
