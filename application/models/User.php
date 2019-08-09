<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
	function __construct() {
		$this->tableName = 'users';
		$this->primaryKey = 'id';
	}
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
		
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
			$userID = $prevResult['id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}
		return $userID?$userID:FALSE;
    }
    function get_user($email, $pwd)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
        $query = $this->db->get('users');
		return $query->row();
	}

	
	function get_user_by_email($email)
	{
		$this->db->where('email', $email);
        $query = $this->db->get('admin');
		return $query->row();
	}
	
	// get user
	function get_user_by_id($id)
	{
		$this->db->where('id', $id);
        $query = $this->db->get('user');
		return $query->result();
	}
	
	// insert
	function insert_user($data)
    {
		return $this->db->insert('admin', $data);
	}



//send confirm mail
    public function sendEmail($receiver,$name,$type=""){
            
         $from_email = "ubereats@ebmacs.net"; 
         $to_email =$receiver ; 
   
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
    background-color:#E0FFFF;
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
       Thank you for registering at MyFoodPal. Your account is created and must be activated before you can use it. To activate the account click verify email below:<br>
      <br>
      <a href='.base_url('login/confirmEmail/').md5($receiver).'/'.$type.'  >Verify Email</a><br>
      <br>
      Thanks</div>
  </body>
</html>';

         $this->email->from($from_email, 'MY FOOD PAL'); 
         $this->email->to($to_email);
         $this->email->subject('Verify email address'); 
         $this->email->message($message); 

         //Send mail 
         if($this->email->send()) 
         {return TRUE;}
         else 
         {return false;} 
         
      }
        
    //activate account
    function verifyEmail($key){
        $data = array('verify' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('admin', $data);    //update status as 1 to make active user
    }
    //activate customer driver
    function verify($key){
        $data = array('verify' => 1,'status' => 1);
             
        $this->db->where('md5(user_email)',$key);
        return $this->db->update('users', $data);    //update status as 1 to make active user
    }


}
