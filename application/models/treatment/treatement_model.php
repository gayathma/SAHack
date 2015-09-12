<?php
class Treatment_model extends CI_Model {
    
    
     var $t_id;
     var $t_name;
     var $t_description;
     var $t_delete_index;
     
     
     public function get_t_id() {
         return $this->t_id;
     }

     public function set_t_id($t_id) {
         $this->t_id = $t_id;
     }

     public function get_t_name() {
         return $this->t_name;
     }

     public function set_t_name($t_name) {
         $this->t_name = $t_name;
     }

     public function get_t_description() {
         return $this->t_description;
     }

     public function set_t_description($t_description) {
         $this->t_description = $t_description;
     }

     public function get_t_delete_index() {
         return $this->t_delete_index;
     }

     public function set_t_delete_index($t_delete_index) {
         $this->t_delete_index = $t_delete_index;
     }


     
     
    
    
    
}