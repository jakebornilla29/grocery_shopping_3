<?php
class Single2_model extends CI_Model
{
    function getDish($id){
        $query = $this->db->get_where('dish',array('d_id' => $id));
        return $query;
    }

    function rel_dish(){
        $query = $this->db->get('dish');
        return $query;
    }
}