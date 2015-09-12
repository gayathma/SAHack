<?php

class Register_Users_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('register_users/register_users_model');
    }
    
    function get_user_details(){
        
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.is_deleted', '0');
        $this->db->order_by("user.id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * update user
     */

    function update_user($register_users_model) {

        $data = array(//'id'=>$register_users_model->get_id(),
        'name' => $register_users_model->get_name(),
        'user_name' => $register_users_model->get_user_name(),
        'email' => $register_users_model->get_email(),
        'address' => $register_users_model->get_address(),
        'contact_no_1' => $register_users_model->get_contact1(),
        'user_type' => $register_users_model->get_user_type(),
        'password' => $register_users_model->get_password(),
        //'$is_published'=>$register_users_model->get_is_published(),
        //'$is_deleted'=>$register_users_model->get_is_deleted(),
        //'$added_date'=>$register_users_model->get_added_date(),
        '$updated_date' => $register_users_model->get_updated_date());
        
        $this->db->where('id', $register_users_model->get_id());
        return $this->db->update('user', $data);
    }

    /*
     * update user profile
     */

    function update_user_profile($register_users_model) {

        $data = array('name' => $register_users_model->get_name(),
            'email' => $register_users_model->get_email(),
            '$contact_no_1' => $register_users_model->get_contact_no_1(),
            'user_name' => $register_users_model->get_user_name(),
            '$password' => $register_users_model->get_password(),
            '$password' => $register_users_model->get_password());

        $this->db->where('id', $register_users_model->get_id());
        return $this->db->update('user', $data);
    }

    function add_new_user_registration($register_users_model) {

        return $this->db->insert('user', $register_users_model);
    }

}
