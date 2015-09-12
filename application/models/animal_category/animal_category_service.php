<?php

class Animal_category_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('animal/animal_model');
    }



    function add_new_animal_category($animal_model) {
        return $this->db->insert('animal', $animal_model);
    }


    public function get_all_animals_category() {

        $this->db->select('animal_category.*');
        $this->db->from('animal_category');
        $this->db->where('animal_category.ac_delete_index', '0');
        $this->db->order_by("animal_category.ac_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a transmission
     */

    function delete_transmission($transmission_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $transmission_id);
        return $this->db->update('transmission', $data);
    }

    /*
     * This service function is to update publish status of a transmission
     */

    public function publish_transmission($transmission_model) {
        $data = array('is_published' => $transmission_model->get_is_published());
        $this->db->update('transmission', $data, array('id' => $transmission_model->get_id()));
        return $this->db->affected_rows();
    }

    //update transmission
    function update_transmission($transmission_model) {

        $data = array('name' => $transmission_model->get_name(),
            'updated_date' => $transmission_model->get_updated_date(),
            'updated_by' => $transmission_model->get_updated_by()
        );

        $this->db->where('id', $transmission_model->get_id());
        return $this->db->update('transmission', $data);
    }

    /*
     * This is the service function to get transmission detail by  passing the 
     * transmission_id as a parameter
     */

    function get_transmission_by_id($transmission_model) {

        $query = $this->db->get_where('transmission', array('id' => $transmission_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }

}
