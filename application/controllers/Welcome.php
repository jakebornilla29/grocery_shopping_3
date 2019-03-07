<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $data['prod'] = $this->Admin_model->getProd();

        $this->load->view('index',$data);
    }

    public function checkout()
    {
        redirect('Checkout');
    }

    public function shop()
    {
        redirect('Shop');
    }

    public function dish()
    {
        redirect('Dish');
    }

    public function cart()
    {
        if(isset($_SESSION['email'])){
            if($_SESSION['email'] != ''){
                $this->load->view('cart');
            }
        }
        else{
            ?>
            <script>
                alert('Access Denied');
                window.location = "<?php echo base_url() ?>";
            </script>
            <?php
        }
    }

    public function single()
    {
        $id = $_GET['id'];
        redirect('Single?id='.$id);
    }

    public function single2()
    {
        $id = $_GET['id'];
        redirect('Single2?id='.$id);
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function add_pro()
    {
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'admin'){
                $this->load->view('add_pro');
            }
        }
        else{
            ?>
            <script>
                alert('Access Denied');
                window.location = "<?php echo base_url() ?>";
            </script>
            <?php
        }
    }

    public function add_dish()
    {
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'admin'){
                $this->load->view('add_dish');
            }
        }
        else{
            ?>
            <script>
                alert('Access Denied');
                window.location = "<?php echo base_url() ?>";
            </script>
            <?php
        }
    }
    public function orders()
    {
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'admin'){
                $this->load->view('orders');
            }
        }
        else{
            ?>
            <script>
                alert('Access Denied');
                window.location = "<?php echo base_url() ?>";
            </script>
            <?php
        }
    }

    public function reciept()
    {
        $oh = $_GET['oh'];

        $query = $this->Checkout_model->getOrder($oh);

        $data['order'] = $query->result();

        $this->load->view('reciept',$data);
    }
    public function forgot_password()
    {
        $this->form_validation->set_rules('email','Email','required|valid_email');
        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('forgot_password');
        }
        else
        {
            $email = $this->input->post('email');
            $result = $this->Login_model->checkEmail($email);

            if (!$result) {
                $data['forgot_error'] = 'We cant find your email address.';
                $this->load->view('forgot_password',$data);
            }

            //token
            $token = $this->Login_model->insertToken($result->u_id);
            $tokenn = base64_encode($token);
            $url = 'welcome/reset_password/token/' . $tokenn;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>A password reset has been requested for this email account.</strong><br>';
            $message .= '<strong>Please click:</strong>' . $link;
            echo $message;
            exit;

        }
        
    }

    public function reset_password()
    {
        $token = base64_decode($this->uri->segment(4));
        $result = $this->Login_model->isTokenValid($token);

        if (!$result) {
            $data['reset_error'] = 'Token is invalid or expired';
            $this->load->view('welcome/login');
        }
    }
}
