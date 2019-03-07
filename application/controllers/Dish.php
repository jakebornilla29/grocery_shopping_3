<?php
class Dish extends CI_Controller
{
    function index(){

        $query = $this->Dish_model->getDish();

        $data['dish'] = $query->result();

        $this->load->view('dish',$data);
    }

    function catFilterD()
    {
        $cat = $_POST['catd'];

        $query = $this->Shop_model->getDishCat($cat);

        $data['catDatad']=$query->result();

        $this->load->view('dish',$data);
    }
 
}