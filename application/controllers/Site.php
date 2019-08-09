<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller
{
    
//resturant side
function __construct()
{
    parent::__construct();
    $this->load->database();
     $this->load->helper('url');
    $this->load->helper('string');
      $this->load->library('pagination');
    $this->load->library('session');
    if ($this->session->userdata('guest_id') == ''){
    $this->session->set_userdata('notification_alert',"show");
    }
    if ($this->session->userdata('guest_id') == ''){
        $this->session->set_userdata('guest_id', random_string('alnum', 32)); 
    }    




    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
  //  log_message('error','admin id ='.$resturant['subadmin_id']);

    $this->output->set_header('Pragma: no-cache');
    
}
function balti(){
 // echo 'yes';
     $this->load->library('email'); 
      $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.yourpicture.co.il.',
            'smtp_port' => 465,
            'smtp_user' => 'ebmacs@yourpicture.co.il', // change it to yours
            'smtp_pass' => '0312alee', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        
        $this->load->library('email', $config);
        
        $this->email->from('ebmacs@yourpicture.co.il', "yourpicture.co.il");
        $this->email->to("adarvaish0@gmail.com");
    //    $this->email->cc("testcc@domainname.com");
        $this->email->subject("This is test subject line");
        $this->email->message("<h1>Mail sent test message...</h1>");
         $this->email->set_mailtype("html");
        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
         echo  "Mail sent...";
        }else{
            echo 'no';
        }
}





public function index(){
    
    
    $this->load->view('site/index.php');


}
public function loadData($record=0) {
		$recordPerPage = 8;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
      	$recordCount = $this->Emp_model->getRecordCount();
      	$empRecord = $this->Emp_model->getRecord($record,$recordPerPage);
      	$config['base_url'] = base_url().'Site/loadData';
      	$config['use_page_numbers'] = TRUE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['empData'] = $empRecord;
		echo json_encode($data);		
	}


function getProducts($record=0){
	$recordPerPage = 8;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
		

      	$recordCount = $this->getCOunt();
      	$pak['l'] = $this->getRecord($record,$recordPerPage);
      	$config['base_url'] =base_url().'site/getProducts';
      	$config['use_page_numbers'] = TRUE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$pak['pagination'] = $this->pagination->create_links();
		//$data['empData'] = $empRecord;
	 	$output=$this->load->view('site/pagination_post.php',$pak);   
		$data['output']=($output);
	//	$data['sucess']=1;
		
echo json_encode($data);	

       
}
function getCOunt(){
    $cat_id=$this->input->post('cat_id');
    $subcat_id=$this->input->post('subcat_id');
    $order_by=$this->input->post('order_by');

if(!empty($cat_id)){
    $this->db->where('cat_id',$cat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}
if(!empty($order_by)){
    $this->db->order_by('property_id',$order_by);
}
$query=$this->db->select('count(*) as allcount')->where('type','gallery')->get('property');

	$result = $query->result_array();      
      	return $result[0]['allcount'];

}
public function getRecord($rowno,$rowperpage) {			

		
		    $cat_id=$this->input->post('cat_id');
    $subcat_id=$this->input->post('subcat_id');
    $order_by=$this->input->post('order_by');

if(!empty($cat_id)){
    $this->db->where('cat_id',$cat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}
if(!empty($order_by)){
    $this->db->order_by('property_id',$order_by);
}
$query=$this->db->select('*')->limit($rowperpage, $rowno)->where('type','gallery')->get('property')->result_array();
return $query;
	}
	






function about(){
    $this->load->view('site/about.php');
}
function cart(){
    $this->load->view('site/cart.php');
    
}
function sendEmail($name,$email){
    $to_email = 'yourpicture.manager@gmail.com';
$subject = 'New Subscription';
$message = 'You Have New Subscription from '.$email.'<br>Thanks.';
$headers = 'From: rehan@ebmacshost.com ';

mail($to_email,$subject,$message,$headers);

}

function addtoSubscibe(){
	$l=array();
	$data['user_name']=$this->input->post('user_name');
	$data['email']=$this->input->post('email');
	
	$subscription=$this->db->where('email',$data['email'])->get('subscibe')->result_array();	
	if(count($subscription)>0){
		$l['sucess']=1;
		$l['status']=0;
		$l['msg']="You has Already subscribed.";
	}else{
		$this->db->insert('subscibe',$data);
		$l['sucess']=1;
		$l['status']=1;
		$l['msg']="You have been subscibe sucessfully.";
	    
	    $this->sendEmail($data['user_name'],$data['email']);
	    
	}
	echo json_encode($l);

}

function addtoCart(){
    $order_id=0;
    $data['product_id']=$this->input->post('product_id');
    $data['size_id']=$this->input->post('size_id');
    $data['material_id']=$this->input->post('material_id');
    $data['price']=$this->input->post('price');
	$data['guest_id']=$this->session->userdata('guest_id');
	$data['type']=$this->input->post('type');
	$data['shipping_price_il']=$this->input->post('shipping_price_il');
	$data['shipping_price_int']=$this->input->post('shipping_price_int');
	$data['package_size']=$this->input->post('package_size');
	$data['weight']=$this->input->post('weight');
     $query=$this->db->where('guest_id',$data['guest_id'])->where('order_status',0)->get('order')->result_array();
        if(count($query)>0){
           foreach($query as $q){
            $order_id=$q['order_id'];  
           }
        }else{
            $pdata['guest_id'] =$this->session->userdata('guest_id');
            $this->db->insert('order',$pdata);
            $order_id=$this->db->insert_id();



        }
        $data['order_id	']=$order_id;
        $this->db->insert('order_product',$data);
        $resp['sucees']=1;


    echo json_encode($resp);
    
}
function getPrice(){
	$myPrice=0;
	$shipping_price_il=0;
	$shipping_price=0;
	$weight=0;
	$package_size=0;
	$n=$this->db->select('price,shipping_price_il,shipping_price,weight,package_size')->where('size_id',$this->input->post('size_id'))->where('material_id',$this->input->post('material_id'))
	->where('product_id',$this->input->post('product_id'))->get('material_size_price')->row_array();

	if(!empty($n)){
	  $myPrice=$n['price'];
	  $shipping_price_il=$n['shipping_price_il'];
	  $shipping_price=$n['shipping_price'];
		$weight=$n['weight'];
		$package_size=$n['package_size'];	

	  $resp['sucees']=1;
	}else{
	  $myPrice=0;
	  $resp['sucees']=0;
	}

	$resp['price']=$myPrice;
	$resp['shipping_price_il']=$shipping_price_il;
	$resp['shipping_price']=$shipping_price;
	$resp['weight']=$weight;
	$resp['package_size']=$package_size;

	echo json_encode($resp);

}


function removetoCart(){
	$cart_id=$this->input->post('cart_id');
	$this->db->where('order_product_id',$cart_id);
	$this->db->delete('order_product');


	$storeDetaildata=array();
	$order_detail=$this->db->where('order.order_status',0)->where('order.guest_id',$this->session->userdata('guest_id'))->get('order')->row_array();
	$storeDetail=  $this->db->where('order.order_status',0)
	   ->where('order.guest_id',$this->session->userdata('guest_id'))
	   ->get('order')
	   ->row_array();
	  if(!empty($storeDetail)){
		   $this->db->where('order_product.order_id',$storeDetail['order_id']);
		  $this->db->where('order_product.guest_id',$this->session->userdata('guest_id'));
		  $this->db->where('order_product.type','store');
		  $this->db->from('order_product');
		  $this->db->join('property', 'property.property_id = order_product.product_id');
		  $storeDetaildata= $this->db->get()->result_array();
		 
	  }else{
	
	  }
	  
	  
      $total=0;
      
$total_price=0;
$total_local_price=0;
      $this->db->where('order.order_status',0)->where('order.guest_id',$this->session->userdata('guest_id'))
      ->select('order.order_id,order.guest_id,order_product.product_id,order_product.package_size,order_product.weight,order_product.shipping_price_il,order_product.shipping_price_int,order_product.price,materials.materials_price,materials.materials_name,order_product.order_product_id,size.size_price,size.size_name,property.expenses_price,property.property_name,property.property_name,image_url,');
      $this->db->from('order');
        $this->db->join('order_product', 'order.order_id = order_product.order_id');
        $this->db->join('property', 'property.property_id = order_product.product_id');
        $this->db->join('size', 'size.size_id = order_product.size_id');
        $this->db->join('materials', 'materials.materials_id = order_product.material_id');
        $result = $this->db->get()->result_array();
			?>
			<tr>
			<td rowspan="2" colspan="2"><p style="margin:8px 0 0 63px;"><b>Product Details</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>Order NO</td>
			<td colspan="2"><?php echo $order_detail['order_id']; ?></td>
		</tr>									
		<tr>
			<td>Date/Time</td>  
			<td colspan="2"><?php echo $order_detail['order_date']; ?></td>  											
	                        
<?php foreach($result as $re){ ?>

							<tr>
								<td colspan="2">Product Name: <?php echo $re['property_name']; ?> </td>
								<td colspan="1">	<a href="#" class="delete_cart" data-id="<?php echo $re['order_product_id']; ?>">Delete</a></td>
								<td colspan="2"></td>
							</tr>
              <!--
							<tr>
								<td colspan="3">Size: <?php echo $re['size_name']; ?></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
							</tr>
	
  						<tr>
								<td colspan="3">Material: <?php echo $re['materials_name']; ?></td>
								<td colspan="1"></td>
								<td colspan="1"> </td>
							</tr>
      -->
              <tr>
								<td colspan="3">Price ( <?php echo $re['materials_name']; ?> + <?php echo $re['size_name']; ?>) , Package Size:<?php echo $re['package_size'] ?>, Weight :<?php echo $re['weight']; ?> </td>
								<td colspan="1">For Local : <?php echo ($re['price']+$re['expenses_price']+$re['shipping_price_il']).' $';
								$total_local_price=$total_local_price+$re['price']+$re['expenses_price']+$re['shipping_price_il']
								
								
								?></td>
								<td colspan="1">For Other : <?php echo ($re['price']+$re['expenses_price']+$re['shipping_price_int']).' $'; 
                
                $total_price=$total_price+$re['price']+$re['expenses_price']+$re['shipping_price_int'];
                
                ?></td>
							</tr>
					<!--
          		<tr>
								<td colspan="3">Expenses Price:</td>
								<td colspan="1">Price:</td>
								<td colspan="1"><?php echo $re['expenses_price'].' $'; 
								//	$total_price=$total_price+$re['expenses_price'];
								?></td>
							</tr>
						-->
              <?php
              //$total_price=$total_price+$re['expenses_price'];
								?>
<?php } ?>
<?php  foreach($storeDetaildata as $sd){ ?>

<tr>
								<td colspan="2">Product Name: <?php echo $sd['property_name']; ?> </td>
								<td colspan="1">	<a href="#" class="delete_cart" data-id="<?php echo $sd['order_product_id']; ?>">Delete</a></td>
								<td colspan="1">For Local:<?php echo ($sd['price']+$sd['shipping_price_il']) .' $'; 
									$total_local_price=$total_local_price+$sd['price']+$sd['shipping_price_il'];
								?></td>
								<td colspan="1">For Other:<?php echo ($sd['price']+$sd['shipping_price_int']) .' $'; 
									$total_price=$total_price+$sd['price']+$sd['shipping_price_int'];
								?></td>
							</tr>
<?php } ?>
<tr>
							<td colspan="5">	<hr style=" height: 1px;
  color: red;
  background-color: green;
  border: none;"> </td>
						
							</tr>

								<tr>
								<td colspan="3"> ToTal Price</td>
								<td colspan="1"> For Local: <?php echo $total_local_price.' $'; ?></td>
						
								<td colspan="1">For Other:<?php echo $total_price.' $'; ?></td>
					
							</tr>
		<tr>
			<td colspan="5"> <a  class="btn btn-success" style="float: right;
margin-top: 10px;
margin-bottom: 10px;" href="<?php echo base_url().'site/checkout' ?>">CheckOut</a></td>
		</tr>

 <?php
}


function sreach(){
	$sreach=array();
	$query = $this->input->get('sreach');
    if(!empty($query)){
        $this->db->like('property_name', $query);
	$this->db->or_like('property_description', $query);
	
	$this->db->select("property.*,maincategory.*");
	
	$this->db->from("property");
	
	$this->db->join("maincategory ","maincategory.maincat_id = property.cat_id","Left");
	$this->db->join("subcategory ","subcategory.subcategory_id = property.subcat_id","Left");

	$this->db->like('property.property_name', $query);
	$this->db->or_like('property.property_description', $query);
	$this->db->or_like('maincategory.name',$query);
	
	$this->db->or_like('subcategory.name',$query);

	$sreach=$this->db->get()->result_array();
	
	}else{
		//$sreach=$this->db->where('type','gallery')->get('property')->result_array();
	}
	



    
   $result_data['keyword'] =$query ;

    $result_data['mydata'] =$sreach ;
$this->load->view('site/Sreach.php',$result_data);

}
function sreachStore(){
	$sreach=array();
	$query = $this->input->get('sreach');
    if($query!=""){
       // $this->db->like('property_name', $query);
	//$this->db->or_like('property_description', $query);

	$this->db->select("property.*,maincategory.*");
	
	$this->db->from("property");
	
	$this->db->join("maincategory ","maincategory.maincat_id = property.cat_id","Left");
	$this->db->join("subcategory ","subcategory.subcategory_id = property.subcat_id","Left");

	$this->db->like('property.property_name', $query);
	$this->db->or_like('property.property_description', $query);
	$this->db->or_like('maincategory.name',$query);
	
	$this->db->or_like('subcategory.name',$query);

	$sreach=$this->db->get()->result_array();

	
	}else{
		//$sreach=$this->db->where('type','gallery')->get('property')->result_array();
	}
	



    
   $result_data['keyword'] =$query ;

    $result_data['mydata'] =$sreach ;
$this->load->view('site/sreachStore.php',$result_data);

}

function gallery($param = ''){
    $this->load->database();
    if(!empty($param)){
         $this->session->set_userdata('gallery_id', $param);
        	$this->db->select('*')
		->where(array('property.type' => 'gallery' , 'gallery_type' => $param) 
		    )	
         ->from('property')
         ->join('maincategory', 'property.cat_id = maincategory.maincat_id');
    $data['mydata'] = $this->db->get()->result_array();
    $data['slug_name']=   $this->db->get_where('type',array('type_id' => $param))->row();
    
    }else{
        $this->db->select('*')
		->where('property.type', 'gallery') 
		    
         ->from('property')
         ->join('maincategory', 'property.cat_id = maincategory.maincat_id');
$data['mydata'] = $this->db->get()->result_array();
    }

    $this->load->view('site/gallery.php',$data);
}
function store(){

    $query = $this->db->where('type','store')->get('property')->result_array();

    $data['mydata']=$query;


    $this->load->view('site/store.php',$data);
}
function successPayment(){
	//get the transaction data
	   $chekdata=$this->db->where('guest_id',$this->session->userdata('guest_id'))->get('order')->row_array();
	   
	 
	 $order_id =$chekdata['order_id'];
	 
	 
	 
	// $this->uri->segment('3');


	$l['order_status']=1;
	 $this->db->where('order_id',$order_id);
	$this->db->update('order',$l);	




	  $customer_id = "DMX3Vu2nH9NY4TB6QwWxLefsaZREbkzA";
	  $data['address']=$this->db->where('order_id',$order_id)->get('address')->row_array();
	  $this->db->where('order.order_id',$order_id)
	  ->where('order_product.type','gallery')
	  ->select('order.order_id,order.guest_id,order_product.product_id,order_product.shipping_price_int,order_product.shipping_price_il,order_product.price,materials.materials_price,materials.materials_name,order_product.order_product_id,size.size_price,size.size_name,property.expenses_price,property.property_name,property.property_name,image_url,');
	 $this->db->from('order');
		 $this->db->join('order_product', 'order.order_id = order_product.order_id');
		 $this->db->join('property', 'property.property_id = order_product.product_id');
		 $this->db->join('size', 'size.size_id = order_product.size_id');
		 $this->db->join('materials', 'materials.materials_id = order_product.material_id');
		 $data['result'] = $this->db->get()->result_array();
		   $this->db->where('order.order_id',$order_id)
		   ->where('order_product.type','store')
	  ->select('order.order_id,order.guest_id,order_product.product_id,order_product.shipping_price_int,order_product.shipping_price_il,order_product.price,order_product.order_product_id,property.expenses_price,property.property_name,property.property_name,image_url,');
	 $this->db->from('order');
		 $this->db->join('order_product', 'order.order_id = order_product.order_id');
		 $this->db->join('property', 'property.property_id = order_product.product_id');
	
		 $data['result2'] = $this->db->get()->result_array();
		$data['order_detail']	=$this->db->where('order_id',$order_id)->get('order')->row_array();
		$data['order_id']=$this->uri->segment('3');
		$data['customer_id']=$this->uri->segment('4');
		      $this->session->set_userdata('guest_id', random_string('alnum', 32)); 
		$this->load->view('site/recipetnew',$data);
     
     
		
	}
 
 function cancelPayment(){
	$this->load->view('site/cancel_receipt');
 }
 
 
 
 function ReceivingSucess($param1="",$param2=""){
    	 $order_id = $param1;
     	//get the transaction data
  $customer_id = $param2;
	  $data['address']=$this->db->where('order_id',$order_id)->get('address')->row_array();
	  $this->db->where('order.order_id',$order_id)
	  ->where('order_product.type','gallery')
	  ->select('order.order_id,order.guest_id,order_product.product_id,order_product.shipping_price_int,order_product.shipping_price_il,order_product.price,materials.materials_price,materials.materials_name,order_product.order_product_id,size.size_price,size.size_name,property.expenses_price,property.property_name,property.property_name,image_url,');
	 $this->db->from('order');
		 $this->db->join('order_product', 'order.order_id = order_product.order_id');
		 $this->db->join('property', 'property.property_id = order_product.product_id');
		 $this->db->join('size', 'size.size_id = order_product.size_id');
		 $this->db->join('materials', 'materials.materials_id = order_product.material_id');
		 $data['result'] = $this->db->get()->result_array();
		$data['order_detail']	=$this->db->where('order_id',$order_id)->get('order')->row_array();
  $this->db->where('order.order_id',$order_id)->where('order_product.type','store')
	  ->select('order.order_id,order.guest_id,order_product.product_id,order_product.shipping_price_int,order_product.shipping_price_il,order_product.price,order_product.order_product_id,property.expenses_price,property.property_name,property.property_name,image_url,');
	 $this->db->from('order');
		 $this->db->join('order_product', 'order.order_id = order_product.order_id');
		 $this->db->join('property', 'property.property_id = order_product.product_id');
	
		 $data['result2'] = $this->db->get()->result_array();
		$this->load->view('site/recipet',$data);
		
     
     
 }
 
 
 function ipn(){
	//paypal return transaction details array
	$paypalInfo    = $this->input->post();

	$data['user_id'] = $paypalInfo['custom'];
	$data['product_id']    = $paypalInfo["item_number"];
	$data['txn_id']    = $paypalInfo["txn_id"];
	$data['payment_gross'] = $paypalInfo["payment_gross"];
	$data['currency_code'] = $paypalInfo["mc_currency"];
	$data['payer_email'] = $paypalInfo["payer_email"];
	$data['payment_status']    = $paypalInfo["payment_status"];

	$paypalURL = $this->paypal_lib->paypal_url;        
	$result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
	
	//check whether the payment is verified
	if(preg_match("/VERIFIED/i",$result)){
		//insert the transaction data into the database
					$this->db->insert('insertTransaction',$data);
	}
}


function payment(){
	$this->load->library('paypal_lib');
	$data=$this->input->post();



	$userID = 1; //current user id
	$logo = base_url().'siteassets/images/17.png';

	

$total_product=0;
$order_id;
$total_product=$this->input->post('total_product');
for($i=0;$i<$total_product;$i++){
	$order_id=$this->input->post('order_id'.$i);
	$this->paypal_lib->add_field('item_number', $this->input->post('order_id'.$i));
}
/////////////////inssert address///////////
$p['fullname']=$this->input->post('firstname');
$p['email']=$this->input->post('email');
$p['address']=$this->input->post('address');
$p['city']=$this->input->post('city');
$p['state']=$this->input->post('state');
$p['zip']=$this->input->post('zip');
$p['country']=$this->input->post('country');
$p['order_id']=$order_id;
$p['guest_id']=$this->session->userdata('guest_id');
$this->db->insert('address',$p);

 $t_price=$this->input->post('total_price');

$returnURL = base_url().'Site/successPayment/'.$order_id.'/'.$this->session->userdata('guest_id'); //payment success url
$cancelURL = base_url().'Site/cancelPayment'; //payment cancel url
$notifyURL = base_url().'Site/ipn'; //ipn url
$this->paypal_lib->add_field('return', $returnURL);
$this->paypal_lib->add_field('cancel_return', $cancelURL);
$this->paypal_lib->add_field('notify_url', $notifyURL);
$this->paypal_lib->add_field('item_name', 'None');
            $this->paypal_lib->add_field('amount',$t_price);  
            $this->paypal_lib->add_field('quantity', 1);    
            $this->paypal_lib->add_field('discount_amount', '0');   

            // additional information 
            $this->paypal_lib->add_field('custom', 'test');
	
	
	$this->paypal_lib->image($logo);
	
	$this->paypal_lib->paypal_auto_form();

}
function subscribe(){
    $this->load->view('site/mailing.php');
}
function faq(){
    $this->load->view('site/faq.php');
}
function slider($param1){
    $data['property_id']=$param1;
    $this->load->view('site/slider.php',$data);
}
function detail_product($param1){
    $data['property_id']=$param1;
    $this->load->view('site/sliderproduct.php',$data);
}

function checkout(){
	$this->load->view('site/checkout.php');
}


}
