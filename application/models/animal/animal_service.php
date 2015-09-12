<?php

class Animal_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('animal/animal_model');
    }



    function add_new_animal($animal_model) {
        return $this->db->insert('animal', $animal_model);
    }


    public function get_all_animals() {

        $this->db->select('animal.*,animal_category.ac_name as category');
        $this->db->from('animal');
        $this->db->join('animal_category', 'animal_category.ac_id = animal.a_ac_id');
        $this->db->where('animal.a_delete_index', '0');
        $this->db->order_by("animal.a_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a animal
     */

    function delete_animal($animal_id) {
        $data = array('a_delete_index' => '1');
        $this->db->where('a_id', $animal_id);
        return $this->db->update('animal', $data);
    }

    //update animal
    function update_animal($animal_model) {

        $data = array('name' => $animal_model->get_a_name(),
            'updated_date' => $animal_model->get_updated_date(),
            'updated_by' => $animal_model->get_updated_by()
        );

        $this->db->where('id', $animal_model->get_a_id());
        return $this->db->update('animal', $data);
    }

    /*
     * This is the service function to get animal detail by  passing the 
     * animal_id as a parameter
     */

    function get_animal_by_id($animal_model) {

        $query = $this->db->get_where('animal', array('a_id' => $animal_model->get_a_id(), 'a_delete_index' => '0'));
        return $query->row();
    }

}
