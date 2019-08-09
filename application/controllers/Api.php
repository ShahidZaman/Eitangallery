<?php
class Api extends CI_Controller
{

    function __construct()
    {
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
	$this->load->model('Crud_model');
	  $this->load->model('user');
    
       /*cache control*/
	$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	$this->output->set_header('Pragma: no-cache');
	}

	function getbooksCategory(){
	$d=array();
	$d=$this->db->query("SELECT * FROM `maincategory`")->result_array();		
	if(count($d)>0){
		$data['sucess']=1;
		$data['total_books']=count($d);
		$data['booksCategory']=$d;


	}else{
		$data['sucess']=0;
		$data['total_books']=count($data);
		$data['booksCategory']=$d;

	}
		echo json_encode($data);

	}
	function getBooksFromCategory($cat_id){
		if($cat_id >0 && $cat_id !=""){
		$booksRecord=array();
		$booksRecord=$this->db->order_by('product_id','desc')->get_where('products', array(
                'maincat_id' => $cat_id
            ))->result_array();
		if (count($booksRecord)>0) {
			$data['sucess']=1;
			$data['total_books']=count($booksRecord);
			$data['book_record']=$booksRecord;
		}else{
			$data['sucess']=1;
			$data['total_books']=count($booksRecord);
			$data['book_record']=$booksRecord;
		}
	}else{
		$data['sucess']=0;
		$data['msg']="Error ! Please Try later";

		
	}

echo json_encode($data);


	}










function push($token,$body,$title){

#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAAVaCz40w:APA91bEQtzHXwIYOJSrvkuPB5Lw-pVqys6V_eLKk6PskibcYgZwnJ4hUuUYMasr31yNZmlw7AwVPGol5SYa6vNQgPXy9zhVKa-LlxZGbujQaA-vbKtXpajV-nQqeAPVeRZIjVB_Gb1pi');

$icon=base_url('uploads/logo.png');

#prep the bundle
     $msg = array
          (
		'body' 	=> $body,
		'title'	=> $title,
             	'icon'	=> 'myicon',/*Default Icon*/
             	//'icon'	=> $icon,/*Default Icon*/

             

              	'vibrate' => 1,
    'sound' => 'default'
          );
	$fields = array
			(
				'to'		=> $token,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
return $result;

}




//push notification testing

// function notify(){
// $title="MY FOOD PAL";
// $body="New job arrive";
// $notify_driver='c32-94L4jls:APA91bGeckK7bDW3_LYd9q7W26bJaXg5yZhfymvL-Cdk-_OBk4OZfTAvB9abW2SUK1kBd4cltEpX9QK8Apuwsw152yX5lHuvlb8yIjK8FdUGtubjf4Y_sgDwWUQOwbmvWU-QbxoxTwQI';
// $outputdata['result']=$this->push($notify_driver,$body,$title);
			    

// 	echo json_encode($outputdata);



//add_update token
function add_tokken(){

	$data['token_id']=$_REQUEST['token_id'];
	$this->db->where('user_id',$_REQUEST['user_id']);
$this->db->update('users',$data);

$d['sucess']=1;
echo json_encode($d);

} 



}
