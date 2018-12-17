<?php
class Admin2_model extends CI_Model
{
    function dId(){
        $this->db->select_max('d_id', 'd_id');
        $query = $this->db->get('dish');
        return $query;
    }

    function addDish($data){
        $this->db->insert('dish' , $data);
    }

    function getDish(){
        $query = $this->db->get('dish');
        return $query->result();
    }

    function del_dish($id){
        $this->db->where('d_id', $id);
        $this->db->delete('dish');
    }

    function edit_dish($id){
        $query = $this->db->get_where('dish',array('d_id' => $id));
        return $query;
    }

    function upd_dish($id,$data){
        $this->db->where('d_id', $id);
        $this->db->update('dish', $data);
    }

    function getOrders(){
        $query = $this->db->get('pending_orders');
        return $query;
    }

    function updStatus($po_id,$value){
        $this->db->set('status', $value);
        $this->db->where('po_id', $po_id);
        $this->db->update('pending_orders');
    }


}
