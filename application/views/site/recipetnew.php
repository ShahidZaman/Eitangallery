<?php
$message = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="'. base_url().'siteassets/'.'images/fav.png">
    <link href="'.base_url().'siteassets/'.'css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="'. base_url().'siteassets/'.'css/style.css">
    <link rel="stylesheet" href="'. base_url().'siteassets/'.'css/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  </head>
  <body>';


//$message = '<html><body>';
$message .= '<div style="background-color: #eece6c; padding: 4% 0;">

<div class="container">
  <p class="mailing_title" style="font-weight: 800;
    font-size: 36px;
    text-align: center;
    
    ">Order Receipt</p>
  <br>
</div>
</div>

  <div class="container" style="margin:10%">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row" style="width:100%">
                <div class="col-xs-6 col-sm-6 col-md-6" style="width:50%">
                    <address>
                    <br><br>
                        <strong>'. $address["fullname"].'</strong>
                        <br>
                        '. $address['address'].'<br>
						'. $address['city'].'
                        <br>
                        <abbr title="Phone">P:</abbr> (213) 484-6829
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="width:50%">
                    <p>
                        <em>Date: '. $order_detail['order_date'].'</em>
                    </p>
                    <p>
                        <em>Order N0 #: EithenOrder
                        '. $order_detail['order_id'].' </em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    
                </div>
                </span>
                <table class="table " style="text-align: center;
    margin: auto;
    border: 1px solid #dedede;
    padding: 1rem;
    width: 100%;">
                    <thead>
                        <tr>
                         
						<th class="text-center">#</th>                        
        <th class="text-center">Product Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Matrial Type</th>
      
                        </tr>
                    </thead>
                    <tbody>';
                    ?>
					<?php
	 $total=0;
     $i=0;
     $shipping_local=0;
     $shipping_int=0;
foreach($result as $re){
	$total_price=0;
?>
<?php $message .='<tr>
						<td>'. ++$i.'</td>
              
        <td>'.$re['property_name'].'</td>
        <td>'.$re['size_name'].'</td>
        <td>'. $re['materials_name'].'</td>';
        ?>
        <?php 
        
		  $total_price=  $re['price'] +$re['expenses_price'];
        $total=$total+$total_price;
        $shipping_local=$shipping_local+$re['shipping_price_il'];
       $shipping_int=$shipping_int+$re['shipping_price_int'];
       
       ?>
		
		
<?php } ?>
<?php
foreach($result2 as $re){
	$total_price=0;
?>
<?php $message .='<tr>
						<td>'. ++$i.'</td>
              
        <td>'.$re['property_name'].'</td>
        <td></td>
        <td></td>';
        ?>
        <?php 
        
		  $total_price=  $re['price'] +$re['expenses_price'];
        $total=$total+$total_price;
        $shipping_local=$shipping_local+$re['shipping_price_il'];
       $shipping_int=$shipping_int+$re['shipping_price_int'];
       
       ?>
		
		
<?php } ?>

<?php $message .='
	                    </tr>
                   
                       
                        <tr>
                            <td>   </td>
                            <td>   </td>
							
							
                            <td class="text-right"><h4><strong> </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>
                            ';?>
                            <?php if($address['country']=="IL"){
								//	$s=$this->db->select('shipping_local')->get('shipping')->row_array();
								//	echo $shipping_local;
									$total=	$shipping_local+$total;

							}else{
								//$s=$this->db->select('shipping_internation')->get('shipping')->row_array();
								//echo $shipping_int;
								$total=$shipping_int+$total;
							} ?>
				<?php $message .='			
							</strong></h4></td>
                        </tr>
						<tr>
							<td></td>
						<td></td>
						<td class="text-right"><h4><strong>Net Charges:</strong></h4></td>
						<td class="text-center text-danger"><h4><strong>
						
						'. $total.'  $</stronge>
						</tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
	</div>
  
</body>
</html>';
//echo $message;
$user_email=$address['email'];
 $manger_email = 'yourpicture.manager@gmail.com';
 //$manger_email = 'adarvaish0@gmail.com';
//$recipList= $manger_email.','.$user_email;
$subject = 'New order ';

//$headers = 'From: ebmacs@yourpicture.co.il ';
//$headers .= "yourpicture.co.il\r\n";
//$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//mail($recipList,$subject,$message,$headers);
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
        $this->email->to($user_email);
        $this->email->cc($manger_email);
        $this->email->subject($subject);
        $this->email->message($message);
         $this->email->set_mailtype("html");
     //   $this->email->send();
    //    $data['message'] = "Sorry Unable to send email...";

        if ($this->email->send()) {
         echo  "Mail sent...";
        }else{
            echo 'no';
        }




redirect(base_url().'Site/ReceivingSucess/'.$order_id.'/'.$customer_id);






?>


