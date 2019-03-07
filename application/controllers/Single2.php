<?php
class Single extends CI_Controller
{
    function index(){
        $id = $_GET['id'];

        $query = $this->Single2_model->getDish($id);

        $data['dish'] = $query->result();

        $query = $this->Single2_model->rel_dish();

        $data['reldish'] = $query->result();

        $this->load->view('single-dish',$data);
    }
}
