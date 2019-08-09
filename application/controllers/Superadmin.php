<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        $this->load->model('Crud_model');
      
        
    }
    
    /***default function, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('login_type') == "admin")
            redirect(base_url() . 'admin/maincategory');

        if ($this->session->userdata('login_type') == "superadmin")
          redirect(base_url() . 'superadmin/dashboard');
}

    /***superadmin DASHBOARD***/
    function dashboard()
    {


     $page_data['page_name']  = 'all_resturant';
        $page_data['page_title'] = ('All resturant');
        $page_data['resturant']=$this->db->from('admin')
  ->join('resturant','admin.admin_id=resturant.subadmin_id')
      ->where('admin.verify',1)
      ->order_by('created','desc')

  ->get()->result_array();


        $this->load->view('backend/index', $page_data);   
    }

function  validate($email){

  $supercredential = array('email' => $email);

        // Checking login credential for admin
        $query = $this->db->get_where('admin', $supercredential);
        if ($query->num_rows() > 0) {
           
            return 'success';
        }
        else{
           return 'fail'; 
        }


}

    
 function add_admin($param1=""){
if($param1=="create"){

$data['name']=$this->input->post('name');
$data['email']=$this->input->post('email');
$data['password']=md5($this->input->post('password'));
$data['location']=$this->input->post('address');
$data['latitute']=$this->input->post('lat');
$data['longitute']=$this->input->post('lng');
$data['status']=1;
$data['verify']=1;
$data['theme']="default";
echo $responce=$this->validate($this->input->post('email'));
if($responce=="fail"){
$this->db->insert('admin',$data);
$admin_id=$this->db->insert_id();

$datas['resturant_name']=$this->input->post('r_name');
$datas['subadmin_id']=$admin_id;
$this->db->insert('resturant',$data);
        $this->session->set_flashdata('flash_message' , ('Data added Successfully'));
        redirect(base_url().'superadmin/add_admin');
}
else{
     //  $this->session->set_flashdata('flash_message' , ('Email Alreaady exist'));
       // redirect(base_url().'superadmin/add_admin'); 
}



}













     $this->load->library('googlemaps');
        $config['center'] = '54.68097797285145,-2.7280421796874634';
        $config['zoom'] = '8';
$this->googlemaps->initialize($config);
$marker = array();
$marker['position'] = '54.68097797285145,-2.7280421796874634';
$marker['draggable'] = true;
$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
$this->googlemaps->add_marker($marker);
$page_data['map'] = $this->googlemaps->create_map();
    $page_data['page_name']  = 'modal_admin_add';
        $page_data['page_title'] = ('All Admin');  
 $this->load->view('backend/index', $page_data);
 }


//delete dynamically admin customer driver resturant id=tablefield name   paramid=field value
function delete($id,$paramid,$table,$return){
        $this->db->where($id,$paramid);
        $this->db->delete($table);   
          
        $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
        redirect(base_url().'superadmin/'.$return);

}


     /****************driver****************/
     function all_driver(){
    $page_data['page_name']  = 'all_driver';
        $page_data['page_title'] = ('All Driver');
        $page_data['driver']=$this->db->get_where('users', array(
                'user_type' => 'driver'
            ))->result_array();
        $this->load->view('backend/index', $page_data);

     }


     function block_driver($param1){
        $data['status']=0;
         $this->db->where('user_id',$param1);
         $this->db->update('users',$data);

$row=$this->db->get_where('users', array('user_id' =>$param1));
      $this->send_email($row['user_email'],$row['user_name'],'Block');

            $this->session->set_flashdata('flash_message', ('Driver suspend Successfully'));
          redirect(base_url() . 'superadmin/all_driver/');  

     }




     function unblock_driver($param1){
        $data['status']=1;
         $this->db->where('user_id',$param1);
         $this->db->update('users',$data);

         $row=$this->db->get_where('users' ,array('user_id' =>$param1));
      $this->send_email($row['user_email'],$row['user_name'],'Active');

            $this->session->set_flashdata('flash_message', ('Driver active Successfully'));
          redirect(base_url() . 'superadmin/all_driver/');          
     }



function active_driver(){
    
            $page_data['page_name']  = 'active_driver';
        $page_data['page_title'] = ('Active Driver');
        $page_data['driver']=$this->db->get_where('users', array(
                'status' => 1,
                'user_type' => 'driver'
            ))->result_array();
        $this->load->view('backend/index', $page_data);


}
function suspened_driver(){

            $page_data['page_name']  = 'block_driver';
        $page_data['page_title'] = ('All Block Driver');
       $page_data['driver']=$this->db->get_where('users', array(
                'status' => 0,
                'user_type' => 'driver'
            ))->result_array();
        $this->load->view('backend/index', $page_data);

}



// resturant module

function all_resturant(){
 $page_data['page_name']  = 'all_resturant';
        $page_data['page_title'] = ('All resturant');
        $page_data['resturant']=$this->db->from('admin')
  ->join('resturant','admin.admin_id=resturant.subadmin_id')
      ->where('admin.verify',1)
      ->order_by('created','desc')

  ->get()->result_array();


        $this->load->view('backend/index', $page_data);    
}



     function block_resturant($param1){
$data['status']=0;
         $this->db->where('admin_id',$param1);
         $this->db->update('admin',$data);

    $row=$this->db->get_where('admin',array('admin_id' =>$param1))->row_array();

         $this->send_email($row['email'],$row['name'],'Block');
            $this->session->set_flashdata('flash_message', ('resturant suspend Successfully'));

          redirect(base_url() . 'superadmin/all_resturant/');    
     }

     function unblock_resturant($param1){
$data['status']=1;
         $this->db->where('admin_id',$param1);
         $this->db->update('admin',$data);


         $row=$this->db->get_where('admin',array('admin_id' =>$param1))->row_array();

         $this->send_email($row['email'],$row['name'],'Active');

            $this->session->set_flashdata('flash_message', ('resturant active Successfully'));
          redirect(base_url() . 'superadmin/all_resturant/');        
     }



function active_resturant(){
 $page_data['page_name']  = 'active_resturant';
        $page_data['page_title'] = ('Active Resturant');
        $page_data['resturant']=$this->db->from('admin')
        ->join('resturant','admin.admin_id=resturant.subadmin_id')

        ->where('admin.status',1)
      ->where('admin.verify',1)
      ->order_by('created','desc')

   
        ->get()->result_array();
        $this->load->view('backend/index', $page_data);      
}


  function suspened_resturant(){
 $page_data['page_name']  = 'suspened_resturant';
        $page_data['page_title'] = ('Suspened Resturant');
        $page_data['resturant']=$this->db->from('admin')
        ->join('resturant','admin.admin_id=resturant.subadmin_id')
        ->where('admin.status',0)
      ->where('admin.verify',1)
      ->order_by('created','desc')

        ->get()->result_array();
        $this->load->view('backend/index', $page_data);         
  }



//customer

function all_customer(){
 $page_data['page_name']  = 'all_customer';
        $page_data['page_title'] = ('All Customer');
        $page_data['driver']=$this->db->get_where('users', array(
                'user_type' => 'customer'
            ))->result_array();
        $this->load->view('backend/index', $page_data);    
}





    

    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($param1 == 'do_update') {
            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type' , 'system_title');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type' , 'address');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type' , 'phone');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type' , 'paypal_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type' , 'currency');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type' , 'system_email');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type' , 'system_name');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type' , 'language');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type' , 'text_align');
            $this->db->update('settings' , $data);
            
            $this->session->set_flashdata('flash_message' , ('data_updated')); 
            redirect(base_url() . 'superadmin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', ('settings_updated'));
            redirect(base_url() . 'superadmin/system_settings/');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , ('theme_selected')); 
            redirect(base_url() . 'superadmin/system_settings/'); 
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = ('System Settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }



    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
    
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('superadmin_id', $this->session->userdata('superadmin_id'));
            $this->db->update('superadmin', $data);
           
            $this->session->set_flashdata('flash_message', ('account_updated'));
            redirect(base_url() . 'superadmin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = md5($this->input->post('password'));
            $data['new_password']         = md5($this->input->post('new_password'));
            $data['confirm_new_password'] = md5($this->input->post('confirm_new_password'));
            //print_r($data);
            //exit();
            $current_password = $this->db->get_where('superadmin', array(
                'superadmin_id' => $this->session->userdata('superadmin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('superadmin_id', $this->session->userdata('superadmin_id'));
                $this->db->update('superadmin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', ('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', ('password_mismatch'));
            }
            redirect(base_url() . 'superadmin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = ('Manage Profile');
        $page_data['edit_data']  = $this->db->get_where('superadmin', array(
            'superadmin_id' => $this->session->userdata('superadmin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }





//email send atchange status(pending/active) of driver and resturant 
function send_email($to_email,$name="",$status=""){
         $from_email = "ubereats@ebmacs.net"; 

   
           //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://box554.bluehost.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] ='ubereats@ebmacs.net';
        $config['smtp_pass'] = 'Ubereats1234!@#$';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $message='<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
  .content {
    background-color:   #E0FFFF;
    font-size: 150%;
}
.user {
    background-color: #DAA520;
    background: -webkit-linear-gradient(red, yellow, green); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(red, yellow, green); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(red, yellow, green); /* For Firefox 3.6 to 15 */
    background: linear-gradient(red, yellow, green); /* Standard syntax (must be last) */
    
    height:50px;
text-align:center;
}
a:link {
  background: #3498db;

  text-decoration: none;
}

a:hover {
  background: #3cb0fd;

  text-decoration: none;
}
</style>
  </head>
  <body>
    <div class="user">  
    <h1>Dear '.$name.'</h1>
    </div>
    <br>
      
      <div class="content">
      You are '.$status.' on myfoodpal app:<br>
      <br>
   
      Thanks</div>
  </body>
</html>';

         $this->email->from($from_email, 'MY FOOD PAL'); 
         $this->email->to($to_email);
         $this->email->subject('Account status'); 
         $this->email->message($message); 

         //Send mail 
         if($this->email->send()) 
         {return TRUE;}
         else 
         {return false;} 

}




    
}

