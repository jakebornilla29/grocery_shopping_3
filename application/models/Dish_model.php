<?php
class Dish_model extends CI_Model
{
    function get(){
        $query = $this->db->get('dish');
        return $query;
    }

    function getDishCat($cat){
        $query = $this->db->get_where('dish',array('dish_category' =>$cat));
        return $query;
    }
}