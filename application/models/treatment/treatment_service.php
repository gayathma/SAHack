<?php

class Treatment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('treatment/treatment_model');
    }
    
    
    function add_new_treatment($treatment_model) {
        return $this->db->insert('treatment', $treatment_model);
    }


    public function get_all_treatments() {

        $this->db->select('treatment.*');
        $this->db->from('treatment');
        //$this->db->join('user', 'user.id = transmission.added_by');
        $this->db->where('treatment.t_delete_index', '0');
      //  $this->db->order_by("transmission.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a transmission
     */

    function delete_treatment($t_id) {
        $data = array('t_delete_index' => '1');
        $this->db->where('t_id', $t_id);
        return $this->db->update('treatment', $data);
    }
    
    
    //update transmission
    function update_treatment($treatment_model) {

        $data = array('t_name' => $treatment_model->get_t_name(),
            't_description' => $treatment_model->get_t_description(),
           
        );

        $this->db->where('t_id', $treatment_model->get_t_id());
        return $this->db->update('treatment', $data);
    }
    
    
    
    

    /*
     * This service function is to update publish status of a transmission
     */

    public function publish_transmission($transmission_model) {
        $data = array('is_published' => $transmission_model->get_is_published());
        $this->db->update('transmission', $data, array('id' => $transmission_model->get_id()));
        return $this->db->affected_rows();
    }

    

    /*
     * This is the service function to get transmission detail by  passing the 
     * transmission_id as a parameter
     */

    function get_treatment_by_id($treatment_model) {

        $query = $this->db->get_where('treatment', array('t_id' => $treatment_model->get_t_id(), 't_delete_index' => '0'));
        return $query->row();
    }

    
    
    
}