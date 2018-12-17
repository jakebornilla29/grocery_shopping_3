<?php
class Admin extends CI_Controller
{
    function index()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $query = $this->Admin2_model->getDish();
                $data['dish'] = $query;

                $this->load->view('admin', $data);
            }
        }
        else {
            $this->load->view('index.html');
        }
    }

    public function add_dish()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->add_dish('userfile')) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('add_dish', $error);
                } else {
                    $dish_name = $_POST['dish_name'];
                    $dish_category = $_POST['dish_cat'];
                    $dish_recipe = $_POST['dish_recipe'];
                    $file_name = $this->upload->data('file_name');
                    $file_path = $this->upload->data('file_path');
                    $file_ext = $this->upload->data('file_ext');
                    $d_id = '';

                    $query = $this->Admin2_model->dID();

                    foreach ($query->result() as $row) {
                        $d_id = $row->d_id;
                    }

                    $d_id++;


                    $data = array(
                        'd_id' => $d_id,
                        'dish_name' => $dish_name,
                        'dish_cat' => $dish_category,
                        'dish_recipe' => $dish_recipe,
                        'file_name' => $file_name,
                        'file_path' => $file_path,
                        'file_ext' => $file_ext,
                    );

                    $this->Admin2_model->addDish($data);

                    $data['suc_mess'] = 'Dish Sucessfully Added';

                    $this->load->view('add_dish', $data);
                }
            }
        }
        else{
            $this->load->view('index.html');
        }
    }


    function delDish()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $id = $_GET['id'];

                $this->Admin2model->del_dish($id);

                redirect('Admin2');
            }
        }
        else{
            $this->load->view('index.html');
        }
    }

    function editPro()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $id = $_GET['id'];

                $query = $this->Admin2_model->edit_dish($id);

                $data['edDish'] = $query->result();

                $this->load->view('edit_dish', $data);
            }
        }
        else{
            $this->load->view('index.html');
        }
    }

    function updateDish()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);

                $dish_name = $_POST['dish_name'];
                $dish_category = $_POST['dish_cat'];
                $dish_recipe = $_POST['dish_recipe'];
                $file_name = $this->upload->data('file_name');
                $file_path = $this->upload->data('file_path');
                $file_ext = $this->upload->data('file_ext');
                $id = $_POST['id'];

                $data = array(
                    'dish_name' => $dish_name,
                    'dish_category' => $dish_category,
                    'dish_recipe' => $dish_recipe
                    
                );

                $this->Admin2_model->upd_dish($id, $data);

                $data['suc_mess'] = 'Dish Sucessfully Updated';

                $this->load->view('edit_dish', $data);
            }
        }
        else{
            $this->load->view('index.html');
        }
    }
    
    function order()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $query = $this->Admin_model->getOrders();

                $data['order1'] = $query->result();

                $this->load->view('orders', $data);
            }
        }
        else {
            $this->load->view('index.html');
        }
    }

    function changeStatus()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION['status'] == 'admin') {
                $po_id = $_GET['po_id'];

                $this->Admin_model->updStatus($po_id, 'delivered');

                redirect('Admin/order');
            }
        }
        else {
            $this->load->view('index.html');
        }
    }

}