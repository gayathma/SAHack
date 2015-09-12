<?php

class Treatment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('treatment/treatment_model');
    }
    
    
    function add_new_animal($animal_model) {
        return $this->db->insert('animal', $animal_model);
    }


    public function get_all_treatments() {

        $this->db->select('treatement.*');
        $this->db->from('treatement');
        //$this->db->join('user', 'user.id = transmission.added_by');
        $this->db->where('treatement.t_delete_index', '0');
      //  $this->db->order_by("transmission.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a transmission
     */

    function delete_transmission($_id) {
        $data = array('t_delete_index' => '1');
        $this->db->where('t_id', $t_id);
        return $this->db->update('treatement', $data);
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