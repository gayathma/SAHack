<?php

class Animal_treatment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('animal_treatment/animal_treatment_model');
    }
    
    
     public function get_all_animal_treatments() {

        $this->db->select('animal_treatment.*');
        $this->db->from('animal_treatment');
        //$this->db->join('user', 'user.id = transmission.added_by');
        $this->db->where('animal_treatment.at_delete_index', '0');
      //  $this->db->order_by("transmission.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

}