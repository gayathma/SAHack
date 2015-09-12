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

    function delete_animals_category($ac_id) {
        $data = array('ac_delete_index' => '1');
        $this->db->where('ac_id', $ac_id);
        return $this->db->update('animal_category', $data);
    }

    function update_animals_category($animal_model) {

        $data = array('name' => $animal_model->get_name()
        );

        $this->db->where('id', $transmission_model->get_id());
        return $this->db->update('transmission', $data);
    }


    function get_transmission_by_id($transmission_model) {

        $query = $this->db->get_where('transmission', array('id' => $transmission_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }

}
