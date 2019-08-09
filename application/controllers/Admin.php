<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


//resturant side


class Admin extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        $this->load->model('Crud_model');
       
      


        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
      //  log_message('error','admin id ='.$resturant['subadmin_id']);

        $this->output->set_header('Pragma: no-cache');
        
    }
    function jannn(){
        echo $_SERVER['DOCUMENT_ROOT'];
    }
    
    function genrate_pdf($param1){
        $data = array();            
        $htmlContent='';
      
        $data['postid']=$param1;
        $htmlContent = $this->load->view('backend/admin/pdfgenratefile', $data, TRUE);       
       
        $createPDFFile = time().'.pdf';
       
         $this->createPDFnew($createPDFFile, $htmlContent);
       
   redirect( base_url().'eitan/newoutput.pdf');
       
    }
    
    function genrate_pdf_subscribe(){
        $data = array();            
        $htmlContent='';
      
        
         $htmlContent = $this->load->view('backend/admin/subscriptionAll', $data, TRUE);       
         
         
         
       
         $createPDFFile = time().'.pdf';
       
        $this->createPDF($createPDFFile, $htmlContent);
       redirect( base_url().'eitan/output.pdf');
       
    }
    
        function genrate_email_pdf_subscribe(){
        $data = array();            
        $htmlContent='';
      
        
         $htmlContent = $this->load->view('backend/admin/subscriptionEmail', $data, TRUE);       
       
         $createPDFFile = time().'.pdf';
       
        $this->createPDF($createPDFFile, $htmlContent);
    redirect( base_url().'eitan/output.pdf');
       
    }
        
  // create pdf file 
  public function createPDFnew($fileName,$html) {
    ob_start(); 
    // Include the main TCPDF library (search for installation path).
    $this->load->library('Pdf');
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TechArise');
    $pdf->SetTitle('TechArise');
    $pdf->SetSubject('TechArise');
    $pdf->SetKeywords('TechArise');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);

    // set auto page breaks
    //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetAutoPageBreak(TRUE, 0);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }       

    // set font
    $pdf->SetFont('dejavusans', '', 10);

    // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();       
    ob_end_clean();
    //Close and output PDF document
   // $pdf->Output($fileName, 'F');  
   // $pdf->Output($_SERVER['DOCUMENT_ROOT']. '/codeigniter-create-pdf/output.pdf', 'F');      
   $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/eitan/newoutput.pdf', 'F');
}
    
  // create pdf file 
  public function createPDF($fileName,$html) {
    ob_start(); 
    // Include the main TCPDF library (search for installation path).
    $this->load->library('Pdf');
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('TechArise');
    $pdf->SetTitle('TechArise');
    $pdf->SetSubject('TechArise');
    $pdf->SetKeywords('TechArise');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);

    // set auto page breaks
    //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetAutoPageBreak(TRUE, 0);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }       

    // set font
    $pdf->SetFont('dejavusans', '', 10);

    // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // reset pointer to the last page
    $pdf->lastPage();       
    ob_end_clean();
    //Close and output PDF document
   // $pdf->Output($fileName, 'F');  
   // $pdf->Output($_SERVER['DOCUMENT_ROOT']. '/codeigniter-create-pdf/output.pdf', 'F');      
   $pdf->Output($_SERVER['DOCUMENT_ROOT'] . '/eitan/output.pdf', 'F');
}
    
    /***default function, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('login_type') != 'admin')
            redirect(base_url() . 'login', 'refresh');
      
    }
    function save_artist_collection(){
        $mydata=array();
         $mydata=$this->input->post('check_item');
        //$mydata=explode(",",$selected_item);
   
       $this->db->empty_table('artist_gallery'); 
if(count($mydata)>0){



        for($i=0; $i<count($mydata);$i++){
            $d['property_id']=$mydata[$i];
            $this->db->insert('artist_gallery',$d);

        }    

    }
    $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
                        redirect(base_url().'admin/artist');

    }

    

    /***resturant DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('login_type') != 'admin'){
            redirect(base_url().'login', 'refresh');
        }

    redirect(base_url().'admin/maincategory', 'refresh');
            

    }
 
/*****************typr*/
function type(){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');

             
        $page_data['page_name']  = 'type';
        $page_data['page_title'] = 'Gallery List';
        $this->load->view('backend/index', $page_data);



    }
    
    function type_add(){
                        if ($this->session->userdata('login_type') != 'admin')

                                {redirect(base_url().'login', 'refresh');} 

                        
                        $data['type_name']=$this->input->post('type_name');
                        $data['type_slug'] =strtolower(preg_replace("/[^a-zA-Z]+/", "", $data['type_name']));
                      
                        $this->db->insert('type',$data);
                        $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                        redirect(base_url().'admin/type');

                    }
                     function type_edit($param1){
        if ($this->session->userdata('login_type') != 'admin')

                    redirect(base_url().'login', 'refresh');
         
        $data['type_name']=$this->input->post('type_name');
       $data['type_slug'] = strtolower(preg_replace("/[^a-zA-Z]+/", "", $data['type_name']));
        $this->db->where('type_id',$param1);
        $this->db->update('type',$data);
        $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
        redirect(base_url().'admin/type');

        }
function delete_type($param1){
        $this->db->where('type_id',$param1);
        $this->db->delete('type');   
          
        $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
        redirect(base_url().'admin/type');

}
    /*****************end type********/

    /***********Main category***********/
    function maincategory(){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');

             
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = 'Main Category';
        $this->load->view('backend/index', $page_data);



    }
    function artist(){
        if ($this->session->userdata('login_type') != 'admin')
          redirect(base_url().'login', 'refresh');
      
                   
              $page_data['page_name']  = 'artist';
              $page_data['page_title'] = 'Artist Gallary';
              $this->load->view('backend/index', $page_data);
      
      
      
          }
         function  store(){
            if ($this->session->userdata('login_type') != 'admin')
            redirect(base_url().'login', 'refresh');
        
                     
                $page_data['page_name']  = 'store';
                $page_data['page_title'] = 'Store';
                $this->load->view('backend/index', $page_data);
         }
    
    function maincat_add(){
                        if ($this->session->userdata('login_type') != 'admin')

                                {redirect(base_url().'login', 'refresh');} 

                        
                        $data['name']=$this->input->post('name');
                        $data['cat_type']=$this->input->post('cat_type');

                     
                        $this->db->insert('maincategory',$data);
                        $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                        redirect(base_url().'admin/maincategory');

                    }
function update_store(){
    $data['product_id']=$this->input->post('product_id');
    $lpc=$this->db->where('product_id',$data['product_id'])->get('store')->result_array();
        if(count($lpc)>0){
            $this->session->set_flashdata("fail",("Product Already in store"));
            redirect(base_url().'admin/store');
        }else{
            $this->db->insert('store',$data);
            $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
            redirect(base_url().'admin/store');
        }


}

    

        function maincate_edit($param1){
        if ($this->session->userdata('login_type') != 'admin')

                    redirect(base_url().'login', 'refresh');
         
        $data['name']=$this->input->post('name');
        $data['cat_type']=$this->input->post('cat_type');
       

        $this->db->where('maincat_id',$param1);
        $this->db->update('maincategory',$data);
        $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
        redirect(base_url().'admin/maincategory');

        }
function delete_maincat($param1){
        $this->db->where('maincat_id',$param1);
        $this->db->delete('maincategory');   
          
        $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
        redirect(base_url().'admin/maincategory');

}
        /**********subcategorysubcategory */
        function subcategory(){
            if ($this->session->userdata('login_type') != 'admin')
              redirect(base_url().'login', 'refresh');
          
                       
                  $page_data['page_name']  = 'subcategory';
                  $page_data['page_title'] = 'SubCategory';
                  $this->load->view('backend/index', $page_data);
          
          
          
              }
              function subcategory_add(){
                                  if ($this->session->userdata('login_type') != 'admin')
          
                                          {redirect(base_url().'login', 'refresh');} 
          
                                  
                                  $data['name']=$this->input->post('name');
                                  $data['cat_id']=$this->input->post('cat_id');
                               
                                  $this->db->insert('subcategory',$data);
                                  $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                                  redirect(base_url().'admin/subcategory');
          
                              }
          
          
              
          
                  function subcategory_edit($param1){
                  if ($this->session->userdata('login_type') != 'admin')
          
                              redirect(base_url().'login', 'refresh');
                   
                              $data['name']=$this->input->post('name');
                              $data['cat_id']=$this->input->post('cat_id');
                              $data['description']=$this->input->post('description');
          
                  $this->db->where('subcategory_id',$param1);
                  $this->db->update('subcategory',$data);
                  $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
                  redirect(base_url().'admin/subcategory');
          
                  }
          function delete_subcategory($param1){
            $this->db->where('subcategory_id',$param1);
                  $this->db->delete('subcategory');   
                    
                  $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
                  redirect(base_url().'admin/subcategory');
          
          }    
           /**********material */
        function material(){
            if ($this->session->userdata('login_type') != 'admin')
              redirect(base_url().'login', 'refresh');
          
                       
                  $page_data['page_name']  = 'material';
                  $page_data['page_title'] = 'Material';
                  $this->load->view('backend/index', $page_data);
          
          
          
              }
              function material_add(){
                                  if ($this->session->userdata('login_type') != 'admin')
          
                                          {redirect(base_url().'login', 'refresh');} 
          
                                  
                                  $data['materials_name']=$this->input->post('materials_name');
                                  $data['materials_des']=$this->input->post('materials_des');
                                
                                
                                  $this->db->insert('materials',$data);
                                  $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                                  redirect(base_url().'admin/material');
          
                              }
          
          
              
          
                  function material_edit($param1){
                  if ($this->session->userdata('login_type') != 'admin')
          
                              redirect(base_url().'login', 'refresh');  
                              $data['materials_name']=$this->input->post('materials_name');
                              $data['materials_des']=$this->input->post('materials_des');
                          
                  $this->db->where('materials_id',$param1);
                  $this->db->update('materials',$data);
                  $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
                  redirect(base_url().'admin/material');
          
                  }
          function delete_material($param1){
            $this->db->where('materials_id',$param1);
                  $this->db->delete('materials');   
                  $this->db->where('material_id',$param1);
                  $this->db->delete('material_size_price');   
                
                  $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
                  redirect(base_url().'admin/material');
          
          }    

          function store_add_product(){
            if ($this->session->userdata('login_type') != 'admin')
            redirect(base_url().'login', 'refresh');
        
                     
                $page_data['page_name']  = 'modal_store_add_product';
                $page_data['page_title'] = 'Add Product In Store';
                $this->load->view('backend/index', $page_data);
        
        
         
          }


    /***********size***********/
    function size(){
        if ($this->session->userdata('login_type') != 'admin')
          redirect(base_url().'login', 'refresh');
      
                   
              $page_data['page_name']  = 'size';
              $page_data['page_title'] = 'Size';
              $this->load->view('backend/index', $page_data);
      
      
      
          }
          
          function subscription(){
              if ($this->session->userdata('login_type') != 'admin')
          redirect(base_url().'login', 'refresh');
      
                   
              $page_data['page_name']  = 'subscription';
              $page_data['page_title'] = 'Subscription';
              $this->load->view('backend/index', $page_data);
              
          }
          
          function delete_subsciption($param1){
                            $this->db->where('subscibe_id',$param1); 
                              $this->db->delete('subscibe');
                              $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                              redirect(base_url().'admin/subscription');        
          }
          
          
          
          function size_add(){
                              if ($this->session->userdata('login_type') != 'admin')
      
                                      {redirect(base_url().'login', 'refresh');} 
      
                              
                              $data['size_name']=$this->input->post('size_name');
                           
                              $this->db->insert('size',$data);
                              $this->session->set_flashdata('flash_message' , ('Data Added Successfully'));
                              redirect(base_url().'admin/size');
      
                          }
      
      
          
      
              function size_edit($param1){
              if ($this->session->userdata('login_type') != 'admin')
      
                          redirect(base_url().'login', 'refresh');
               
              $data['size_name']=$this->input->post('size_name');
          
              $this->db->where('size_id',$param1);
              $this->db->update('size',$data);
              $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
              redirect(base_url().'admin/size');
      
              }
      function delete_size($param1){
              $this->db->where('size_id',$param1);
              $this->db->delete('size'); 
              $this->db->where('size_id',$param1);
              $this->db->delete('material_size_price');
              

                
              $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
              redirect(base_url().'admin/size');
      
      }
      

function getSubcat(){
    $cat_id=$this->input->post('cat_id');
    
    $q=$this->db->where('cat_id',$cat_id)->get('subcategory')->result_array();
    echo "<option value=''>All</option>";
    foreach($q as $l){
        echo "<option value=".$l['subcategory_id'].">".$l['name']."</option>";
    }

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

if(!empty($order_by)){
    $this->db->order_by('property_id',$order_by);
}
$query=$this->db->select('*')->limit($rowperpage, $rowno)->where('type','gallery')->get('property')->result_array();
return $query;
	}



function getProducts($record=0){
	$recordPerPage = 8;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
		

      	$recordCount = $this->getCOunt();
      	$l = $this->getRecord($record,$recordPerPage);
      	$pak['l']=$l;
      	
      	$config['base_url'] =base_url().'site/getProducts';
      	 $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li ><a href="#" class="active">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
$config['use_page_numbers'] = TRUE;
$config['num_links'] = 8;

    $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';


    $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    
    
      	
      	
      //	$config['use_page_numbers'] = TRUE;
	//	$config['next_link'] = 'Next';
	//	$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		//$data['empData'] = $empRecord;
//	 	$myoutput=$this->load->view('site/pagination_post.php',$pak);   
		$data['pagination']=($pagination);
		$data['output']=($l);
	    $data['sucess']=1;
		
echo json_encode($data);	
?>

    <?php
/*    
        foreach($l as $my){
        ?>
        <div class="col-sm-3 mohsin">
  <a href="<?php echo base_url().'site/slider/'.$my['property_id'] ;?>">
    <div>
        <img class="img-responsive"  style="
    -webkit-box-shadow: 0px 0px 5px 2px rgba(230, 230, 230, 0.98);
    -moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,1);
    box-shadow: 0px 0px 6px 2px rgba(0,0,0,0.08);
    border: 4px solid #d6d6d6;
    background-color: white;
    max-height: 300px;
    margin-bottom: 20px;
" src="<?php
     if (strpos($my['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($my['image_url'],'?dl=0')!== false){
         $img=explode("?",$my['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $my['image_url'].'?raw=1';
        }
         
}else{
    echo $my['image_url'];
}
      ?>">
    </div>
   </a>
   </div>
   
  
   
  <?php } ?>
  
  
       
       <?php echo $pagination; ?>
       
  
   <h1 id="demp_id">i am demo</h1>
     */ ?>

	





<?php

}


function getProducts_subcat($record=0){
	$recordPerPage = 8;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
		

      	$recordCount = $this->getCOunt();
      	$l = $this->getRecord($record,$recordPerPage);
      	$pak['l']=$l;
      	
      	$config['base_url'] =base_url().'site/getProducts_subcat';
      	 $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li ><a href="#" class="active">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
$config['use_page_numbers'] = TRUE;
$config['num_links'] = 8;

    $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>Previous Page';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';


    $config['next_link'] = 'Next Page<i class="fa fa-long-arrow-right"></i>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    
    
      	
      	
      //	$config['use_page_numbers'] = TRUE;
	//	$config['next_link'] = 'Next';
	//	$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();
		//$data['empData'] = $empRecord;
//	 	$myoutput=$this->load->view('site/pagination_post.php',$pak);   
		$data['pagination']=($pagination);
		$data['output']=($l);
	    $data['sucess']=1;
		
echo json_encode($data);
}




function getProductsGallery(){
    $cat_id=$this->input->post('cat_id');
    $subcat_id=$this->input->post('subcat_id');
    $order_by=$this->input->post('order_by');
    $gallery_id =$this->input->post('gallery_id');

if(!empty($cat_id)){
    $this->db->where('cat_id',$cat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}
if(!empty($subcat_id)){
    $this->db->where('subcat_id',$subcat_id);
}

if(!empty($gallery_id)){
    $this->db->where('gallery_type',$gallery_id);
}

if(!empty($order_by)){
    $this->db->order_by('property_id',$order_by);
}

$l=$this->db->limit(8)->where('type','gallery')->get('property')->result_array();
foreach($l as $my){ ?>
      <div class="col-sm-3">
  <a href="<?php echo base_url().'site/slider/'.$my['property_id'] ;?>">

    <div class="product_div" style="margin-top: 20px;">

      <img class="img-responsive" style="max-height: 300px;" src="<?php
     if (strpos($my['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($my['image_url'],'?dl=0')!== false){
         $img=explode("?",$my['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $my['image_url'].'?raw=1';
        }
         
}else{
    echo $my['image_url'];
}
      ?>">
    
    <div class="product_div_txt">
        <p style="font-weight: 600; margin-bottom: 0px;"><?php echo $my['property_name']; ?></p>
      <p style="font-weight: 600; font-size: 12px; color: gray; margin-bottom: 0px;">Category :      <?php
      $q = $this->db->select('name')->where('maincat_id',$my['cat_id'])->get('maincategory')->row_array(); 

      echo $q['name'];

      ?></p>
      <p style="font-weight: 600; font-size: 11px; margin-bottom: 0px;">Sub Category :
      <?php 
      $q=$this->db->select('name')->where('subcategory_id',$my['subcat_id'])->get('subcategory')->row_array(); 
      echo $q['name'];
      ?>
      
      </p>
      
    
    </div>

    </div>
    </a>
    <br>
      </div>
   

<?php 
}

}

function getProductsStore(){
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
$l=$this->db->limit(8)->where('type','store')->get('property')->result_array();
foreach($l as $my){ ?>
      <div class="col-sm-3">
  <a href="<?php echo base_url().'site/detail_product/'.$my['property_id'] ;?>">

    <div class="product_div" style="margin-top: 20px;">

      <img class="img-responsive" style="max-height: 300px;" src="<?php
     if (strpos($my['image_url'], 'https://www.dropbox.com') !== false) {
        
        if(strpos($my['image_url'],'?dl=0')!== false){
         $img=explode("?",$my['image_url']);
      //   print_r($img);
echo $img[0].'?raw=1';   
        }else{
            echo $my['image_url'].'?raw=1';
        }
         
}else{
    echo $my['image_url'];
}
      ?>">
    
    <div class="product_div_txt">
      <p><?php echo $my['property_name']; ?></p>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <span class="fa fa-star checked"></span>
      <p> $ <?php echo ($my['product_price']+$my['shiping_in']); ?></p>
    </div>
      <p class="buy_now"><a href="<?php echo base_url().'site/detail_product/'.$my['property_id'] ;?>">View Detail</a></p>
    </div>
    <br>
      </div>
   

<?php 
}

}
    /***********Products***********/
    function shipping(){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');
        $page_data['page_name']  = 'shipping';
        $page_data['page_title'] = 'Shipping Price ';
        $this->load->view('backend/index', $page_data);
	}
	function add_shipping(){
		$data['shipping_local']=$this->input->post('shipping_local');
		$data['shipping_internation']=$this->input->post('shipping_internation');
		$this->db->where('shipping_id',1);
		$this->db->update('shipping',$data); 
		$this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
            redirect(base_url().'admin/shipping');
	}
	
	function addproperty(){
		if ($this->session->userdata('login_type') != 'admin')
		  redirect(base_url().'login', 'refresh');
			  $page_data['page_name']  = 'addproperty';
			  $page_data['page_title'] = 'Add New';
			  $this->load->view('backend/index', $page_data);
          }
          
         function edit_store_product($param1){
            if ($this->session->userdata('login_type') != 'admin')
            redirect(base_url().'login', 'refresh');
            $page_data['postid'] = $param1;
                $page_data['page_name']  = 'edit_store_product';
                $page_data['page_title'] = 'Edit Store Product';
                $this->load->view('backend/index', $page_data);
               
         }



          function add_product_store(){
            if ($this->session->userdata('login_type') != 'admin')
            redirect(base_url().'login', 'refresh');
            $data['property_name']=$this->input->post('property_name');
            
            $data['property_description']=$this->input->post('property_description');
            $data['subcat_id']=$this->input->post('subcat_id');
            $data['cat_id']=$this->input->post('cat_id');
            $data['product_price']=$this->input->post('product_price');
            $data['shiping_il']=$this->input->post('shiping_il');
            $data['shiping_in']=$this->input->post('shiping_in');
            $data['type']="Store";
            $this->db->insert('property',$data);          
            $insert_id = $this->db->insert_id();
            if($this->input->post('upload_type')==1){
               move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product/' . $insert_id . '.jpg');
   
               $ndata['image_url']=base_url().'uploads/product/' . $insert_id . '.jpg';
            }else{
               $ndata['image_url']=$this->input->post('property_link_image');
            }
             $this->db->where('property_id',$insert_id);
             $this->db->update('property',$ndata);    
             $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
             redirect(base_url().'admin/store_add_product');
        
            }

    function add_newproperty(){
       
        if ($this->session->userdata('login_type') != 'admin')
          redirect(base_url().'login', 'refresh');
         
         
         
         
          $data['property_name']=$this->input->post('property_name');
          
          $data['property_description']=$this->input->post('property_description');
          $data['subcat_id']=$this->input->post('subcat_id');
		  $data['cat_id']=$this->input->post('cat_id');
		  $data['gallery_type']=$this->input->post('gallery_type');
          $data['type']="gallery";
		  $data['expenses_price']=$this->input->post('expenses_price');
		   
          $this->db->insert('property',$data);
          $insert_id = $this->db->insert_id();
         if($this->input->post('upload_type')==1){
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product/' . $insert_id . '.jpg');

            $ndata['image_url']=base_url().'uploads/product/' . $insert_id . '.jpg';
         }else{
            $ndata['image_url']=$this->input->post('property_link_image');
         }
         
         


          
         
         
         
          $this->db->where('property_id',$insert_id);
          $this->db->update('property',$ndata);  
          $filelength=count($_FILES['upload_file']['name']);  
          if($filelength==1 && $_FILES['upload_file']['name'][0]==""){
              $filelength=0;
          } 
          for($i=0;$i<$filelength;$i++){  
            $uploadpath='uploads/property_image/' . 'property_'.$insert_id.$i . '.jpg';
            // echo $uploadpath.'<br/>';
              move_uploaded_file($_FILES['upload_file']['tmp_name'][$i],$uploadpath);
            
  $imagdata['property_id']=$insert_id;
  $imagdata['upload_path']=base_url().$uploadpath;
  $this->db->insert('upload', $imagdata);
            }
$avaible_size=$this->input->post('sizecheck');
for($l=0;$l<count($avaible_size);$l++){
$jj['product_id']=    $insert_id;
$jj['size_id']=   $avaible_size[$l] ;
  $this->db->insert('avaible_size', $jj);
    
    
}




////////////////////////set price with respect//////
 $sizecount= $this->input->post('size_count');

 $material_count= $this->input->post('material_count');
$material_id=array();
$size_id=array();
for($i=0;$i<$material_count;$i++){
   

    for($j=0;$j<$sizecount;$j++){
        $lpl['material_id']=$this->input->post('material_id'.$i);
        $lpl['size_id']= $this->input->post($i.'size_id'. $j);

        $lpl['price'] =$this->input->post($i.'size_price'. $j);
        $lpl['shipping_price_il']= $this->input->post($i.'shipping_price_il'. $j);
        $lpl['shipping_price']= $this->input->post($i.'shipping_price'. $j);
        $lpl['package_size']= $this->input->post($i.'package_size'. $j);
        $lpl['weight']= $this->input->post($i.'weight'. $j);
        $lpl['product_id']=$insert_id;    
        $this->db->insert('material_size_price',$lpl);  
    }
      


}

$this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
redirect(base_url().'admin/addproperty');
          

          }
function updateuploaddata($insert_id){
    if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');
    $data['property_name']=$this->input->post('property_name');
    $data['gallery_type']=$this->input->post('gallery_type');
    
    $data['property_description']=$this->input->post('property_description');
    
    $data['property_price']=$this->input->post('property_price');
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product/' . $insert_id . '.jpg');

	$data['expenses_price']=$this->input->post('expenses_price');
	  
    $data['image_url']=base_url().'uploads/product/' . $insert_id . '.jpg';
    $this->db->where('property_id',$insert_id);
    $this->db->update('property',$data);  
    
    $filelength=count($_FILES['upload_file']['name']);  
    if($filelength==1 && $_FILES['upload_file']['name'][0]==""){
        $filelength=0;
    }
    for($i=0;$i<$filelength;$i++){  
      $uploadpath='uploads/property_image/' . 'property_'.$insert_id.$i.rand() . '.jpg';
      // echo $uploadpath.'<br/>';
        move_uploaded_file($_FILES['upload_file']['tmp_name'][$i],$uploadpath);
      
$imagdata['property_id']=$insert_id;
$imagdata['upload_path']=base_url().$uploadpath;
$this->db->insert('upload', $imagdata);
      }
      $this->db->where('product_id',$insert_id)->delete('avaible_size');
      
      $avaible_size=$this->input->post('sizecheck');
for($l=0;$l<count($avaible_size);$l++){
$jj['product_id']=    $insert_id;
$jj['size_id']=   $avaible_size[$l] ;
  $this->db->insert('avaible_size', $jj);
    
    
}
      
      ///////////////////////set price with respect//////
 $sizecount= $this->input->post('size_count');

 $material_count= $this->input->post('material_count');
$material_id=array();
$size_id=array();
for($i=0;$i<$material_count;$i++){
   

    for($j=0;$j<$sizecount;$j++){
        $lpl['material_id']=$this->input->post('material_id'.$i);
        $lpl['size_id']= $this->input->post($i.'size_id'. $j);
        $lpl['shipping_price_il']= $this->input->post($i.'shipping_price_il'. $j);
        $lpl['shipping_price']= $this->input->post($i.'shipping_price'. $j);
        $lpl['package_size']= $this->input->post($i.'package_size'. $j);
        $lpl['weight']= $this->input->post($i.'weight'. $j);
        $lpl['price'] =$this->input->post($i.'size_price'. $j);
        $lpl['product_id']=$insert_id;    
        $this->db->where('material_id', $lpl['material_id']);
        $this->db->where('size_id', $lpl['size_id']);
        $this->db->where('product_id', $insert_id);
        $this->db->delete('material_size_price');
        
        
        
        
        $this->db->insert('material_size_price',$lpl);  
    }
      


}

      $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
      redirect(base_url().'admin/edit_property/'.$insert_id);
}

function updatestoreuploaddata($insert_id){
    if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');
    $data['property_name']=$this->input->post('property_name');
    
    $data['property_description']=$this->input->post('property_description');
    
    $data['product_price']=$this->input->post('product_price');
    $data['shiping_il']=$this->input->post('shiping_il');
    $data['shiping_in']=$this->input->post('shiping_in');
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product/' . $insert_id . '.jpg');

    $data['image_url']=base_url().'uploads/product/' . $insert_id . '.jpg';
    $this->db->where('property_id',$insert_id);
    $this->db->update('property',$data); 
    $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
    redirect(base_url().'admin/edit_store_product/'.$insert_id);
}
      
          function viewproperty(){
            if ($this->session->userdata('login_type') != 'admin')
              redirect(base_url().'login', 'refresh');
                  $page_data['page_name']  = 'viewproperty';
                  $page_data['page_title'] = 'Product List';
                  $this->load->view('backend/index', $page_data);
              }
        function edit_property($param1){
                if ($this->session->userdata('login_type') != 'admin')
                  redirect(base_url().'login', 'refresh');
                      $page_data['page_name']  = 'edit_property';
                      $page_data['page_title'] = 'Edit Product';
                      $page_data['postid'] = $param1;
                      $this->load->view('backend/index', $page_data);
                  }
                  function readImage(){
                    $upload=$this->db->get_where('upload', array(
                                    'property_id' =>$this->uri->segment(3)
                                ))->result_array();
                      
                    foreach ($upload as $key) {
                    echo "<div class='col-xs-2 col-md-2'>";
                    echo "<img style=height:200px width:200px ' class= 'img-thumbnail'";
                    
                    echo " src= ".$key['upload_path'] .">";
                    
                    echo "<div class = 'solTitle'> <a href = '#'  id ='".
                      $key['upload_id'] .
                    
                      "'onClick = 'openSolution();'>Delete </a></div> <br></div>";
                    
                    
                    
                    
                    
                    }
                    echo "<br><br>";
                    
                    
                    }
function ajax_delete($param1){
    $this->db->where('upload_id',$param1);
     $this->db->delete('upload');   
echo 'sucess';
    }
    function delete_property($param1){
        $this->db->where('property_id',$param1);
     $this->db->delete('upload'); 
     $this->db->where('property_id',$param1);
     $this->db->delete('property');  
     $this->db->where('product_id',$param1);
     $this->db->delete('material_size_price');  

     $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
     redirect(base_url().'admin/viewproperty/');
    }

    function delete_store($param1){
    
     $this->db->where('property_id',$param1);
     $this->db->delete('property');  
     
     $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
     redirect(base_url().'admin/store/');
    }
                    

  /***********menu Products***********/
    function menu_product($menu){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');
 
                        $resturant = $this->db->get_where('resturant', array('subadmin_id' => $this->session->userdata['login_user_id']) )->row_array();

                        $page_data["orders"] = $this->db->order_by('product_id','asc')->get_where('products', array('resturant_id' =>$resturant['resturant_id'],'menu_id'=>$menu ));
                      


$page_data['menu_id']=$menu;
        $page_data['page_name']  = 'menu_product';
        $page_data['page_title'] = 'Products';
        $this->load->view('backend/admin/menu_product', $page_data);



    }
    /***********Profile of resturant***********/
    function profile(){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');

                        $page_data["orders"] = $this->db->order_by('product_id','asc')->get('products');
                

        $page_data['page_name']  = 'profile';
        $page_data['page_title'] = 'Resturant profile';
        $this->load->view('backend/index', $page_data);



    }
    

function profile_edit($param1){
if ($this->session->userdata('login_type') != 'admin')

            redirect(base_url().'login', 'refresh');


        $data['resturant_name']=$this->input->post('resturant_name');
        $data['resturant_description']=$this->input->post('resturant_description');

        $data['resturant_timings']=$this->input->post('resturant_timings');

        if(count($_FILES['userfile']['name']>0) ){
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/resturant/' . $param1 . '.jpg');    
        $data['resturant_image']=base_url().'uploads/resturant/' . $param1 . '.jpg';

        }
        $this->db->where('resturant_id',$param1);
        $this->db->update('resturant',$data);
        $this->session->set_flashdata('flash_message' , ('Data Update Successfully'));
        redirect(base_url().'admin/profile');

}






    /***********order***********/
    function order(){
  if ($this->session->userdata('login_type') != 'admin')
    redirect(base_url().'login', 'refresh');
 
                        $resturant = $this->db->get_where('resturant', array('subadmin_id' => $this->session->userdata['login_user_id']) )->row_array();

                        $page_data["orders"] = $this->db->order_by('order_id','asc')->get_where('orders', array('resturant_id' =>$resturant['resturant_id'] ));
            

        $page_data['page_name']  = 'orders';
        $page_data['page_title'] = 'order';
        $this->load->view('backend/index', $page_data);



    }

    function change_order($param1){


   $row=$this->db->get_where('orders',  array('order_id' =>$param1 ))->row_array();

if($row['status']=="pending")
{

$data = array('status' =>'Complete' );

}else
{
$data = array('status' =>'pending');


}
       // $data = array('status' =>'pending');
        $this->db->where('order_id',$param1);
        $this->db->update('orders',$data);
        $this->session->set_flashdata('flash_message' , ('Data update Successfully'));
        redirect(base_url().'admin/order');



}

function delete_order($param1){
  $this->db->where('order_id',$param1);
        $this->db->delete('orders');
        $this->session->set_flashdata('flash_message' , ('Data Remove Successfully'));
        redirect(base_url().'admin/order');



}
function cancel_order($param1){
$data = array('status' =>'cancel');    
$this->db->where('order_id',$param1);
        $this->db->update('orders',$data);
        $this->session->set_flashdata('flash_message' , ('Order Cancel Successfully'));
        redirect(base_url().'admin/order');
}

 function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        
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
            
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated')); 
            redirect(base_url() . 'admin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/system_settings/', 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type' , 'skin_colour');
            $this->db->update('settings' , $data);
            $this->session->set_flashdata('flash_message' , get_phrase('theme_selected')); 
            redirect(base_url() . 'admin/system_settings/', 'refresh'); 
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }

/*****SMS SETTINGS*********/
    function sms_settings($param1 = '' , $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'clickatell') {

            $data['description'] = $this->input->post('clickatell_user');
            $this->db->where('type' , 'clickatell_user');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_password');
            $this->db->where('type' , 'clickatell_password');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('clickatell_api_id');
            $this->db->where('type' , 'clickatell_api_id');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'twilio') {

            $data['description'] = $this->input->post('twilio_account_sid');
            $this->db->where('type' , 'twilio_account_sid');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_auth_token');
            $this->db->where('type' , 'twilio_auth_token');
            $this->db->update('settings' , $data);

            $data['description'] = $this->input->post('twilio_sender_phone_number');
            $this->db->where('type' , 'twilio_sender_phone_number');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        if ($param1 == 'active_service') {

            $data['description'] = $this->input->post('active_sms_service');
            $this->db->where('type' , 'active_sms_service');
            $this->db->update('settings' , $data);

            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'admin/sms_settings/', 'refresh');
        }

        $page_data['page_name']  = 'sms_settings';
        $page_data['page_title'] = get_phrase('sms_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        
        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile']  = $param2;  
        }
        if ($param1 == 'update_phrase') {
            $language   =   $param2;
            $total_phrase   =   $this->input->post('total_phrase');
            for($i = 1 ; $i < $total_phrase ; $i++)
            {
                //$data[$language]  =   $this->input->post('phrase').$i;
                $this->db->where('phrase_id' , $i);
                $this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
            }
            redirect(base_url() . 'admin/manage_language/edit_phrase/'.$language, 'refresh');
        }
        if ($param1 == 'do_update') {
            $language        = $this->input->post('language');
            $data[$language] = $this->input->post('phrase');
            $this->db->where('phrase_id', $param2);
            $this->db->update('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $data['phrase'] = $this->input->post('phrase');
            $this->db->insert('language', $data);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'add_language') {
            $language = $this->input->post('language');
            $this->load->dbforge();
            $fields = array(
                $language => array(
                    'type' => 'LONGTEXT'
                )
            );
            $this->dbforge->add_column('language', $fields);
            
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        if ($param1 == 'delete_language') {
            $language = $param2;
            $this->load->dbforge();
            $this->dbforge->drop_column('language', $language);
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            
            redirect(base_url() . 'admin/manage_language/', 'refresh');
        }
        $page_data['page_name']        = 'manage_language';
        $page_data['page_title']       = get_phrase('manage_language');
        //$page_data['language_phrases'] = $this->db->get('language')->result_array();
        $this->load->view('backend/index', $page_data); 
    }



    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    

    
}

