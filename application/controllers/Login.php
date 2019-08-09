<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->model('user');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('login_type') == "admin")
            redirect(base_url() . 'admin/dashboard', 'refresh');

        

        $this->load->view('backend/login');
    }


  function register(){

       $this->load->view('backend/register');

  }


function register_enter(){
        // set form validation rules
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');

        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean');
        // submit


        if ($this->form_validation->run() == FALSE)
        {
            // fails
          $this->load->view('backend/register');
        }
        else
        {



 $array = array();
   $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($this->input->post('location')).'&sensor=false');

   // We convert the JSON to an array
   $geo = json_decode($geo, true);

   // If everything is cool
   if ($geo['status'] = 'OK') {
      $latitude = $geo['results'][0]['geometry']['location']['lat'];
      $longitude = $geo['results'][0]['geometry']['location']['lng'];
      $array = array('lat'=> $latitude ,'lng'=>$longitude);
   }




            //insert user details into db
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'account_type' => 'resturant',
                'location' => $this->input->post('location'),
                'latitute' => $array['lat'],
                'longitute' => $array['lng'],
                'created' => date("Y-m-d"),
                'password' => md5($this->input->post('password'))
            );

          if($this->user->sendEmail($this->input->post('email'),$this->input->post('name'),'resturant')){
if($this->user->insert_user($data)){
      
              
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');

        $data2 = array(
                'subadmin_id'=>$this->db->insert_id()

            );
         $this->db->insert('resturant', $data2);
                
             }

    redirect('login/register');

        }
    }
    }


      


    //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = $_POST["password"];
     //   $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
        $response['login_status'] = $login_status;
        
        if ($login_status == 'success') {
            //alert('succes');
            //$response['redirect_url'] = '';

            $response['redirect_url'] = base_url() . 'login';
            //console.log($response);
        }

        //Replying ajax request with validation response
        echo json_encode($response);
         
    }

    //Validating login from ajax request
    function validate_login($email = '', $password = '') {
       
          $credential2 = array('email' => $email, 'password' =>$password);
         $supercredential = array('email' => $email, 'password' =>$password);

        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential2);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'admin');
            return 'success';
        }


       

        return 'invalid';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password()
    {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password()
    {
        $resp                   = array();
        $resp['status']         = 'false';
        $email                  = $_POST["email"];
        $reset_account_type     = '';
        //resetting user password here
        $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);

        // Checking credential for admin
        $query = $this->db->get_where('admin' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'admin';
            $this->db->where('email' , $email);
            $this->db->update('admin' , array('password' => $new_password));
            $resp['status']         = 'true';
        }
        // Checking credential for student
        $query = $this->db->get_where('student' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'student';
            $this->db->where('email' , $email);
            $this->db->update('student' , array('password' => $new_password));
            $resp['status']         = 'true';
        }
        // Checking credential for teacher
        $query = $this->db->get_where('teacher' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'teacher';
            $this->db->where('email' , $email);
            $this->db->update('teacher' , array('password' => $new_password));
            $resp['status']         = 'true';
        }
        // Checking credential for parent
        $query = $this->db->get_where('parent' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'parent';
            $this->db->where('email' , $email);
            $this->db->update('parent' , array('password' => $new_password));
            $resp['status']         = 'true';
        }

        // send new password to user email  
        $this->email_model->password_reset_email($new_password , $reset_account_type , $email);

        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url().'login', 'refresh');
    }

}
