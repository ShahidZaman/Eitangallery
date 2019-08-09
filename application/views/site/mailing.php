<style>
    #insta-img{
    position: absolute; 
    right: 100px
}
    @media only screen and (max-width: 600px) {
    #insta-img{
    right: 14px
}   
}
</style>
<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>

<div style="background-color: #eece6c; padding: 4% 0;">
<a href="https://www.instagram.com/eitanshasha"><img src="<?php echo base_url().'siteassets/'; ?>images/instagram.png" id="insta-img"></a>
<div class="container">
  <p class="mailing_title">Subscribe to mailing list</p>
  <br>
  <div class="col-sm-offset-2 col-sm-4">
    <input class="form-control mailing_input"  id="username" type="text" name="" placeholder="Name">
    <br>
   
  </div>

  <div class="col-sm-4">
    <input class="form-control mailing_input"  id="email" type="text" name="" placeholder="Email">
    <br>
     </div>
</div>
<div class="container">
  <div class="col-sm-offset-4 col-sm-4">
  <b><span id="msg"></span></b>
    <button class="btn sub2_btn" id="sub_btn">subscribe now</button>
    <br>
  </div>
  <div class="col-sm-12">
    <br><br>
  <p style="text-align: center; font-size: 13px;">We'll keep you up-to-date on New Photos, News and Promotions.</p>
  </div>
</div>
</div>


<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
  


  
$('#sub_btn').on('click', function(){
  if($("#username").val()!="" && $("#email").val() !="" ){
    addtosubscribe();
  }else{
    $("#msg").css("color", "red");
                          $("#msg").text("Please Fill All Fields.");
  }

});


function addtosubscribe(){
 
  var fd = new FormData();    

fd.append( 'user_name', $("#username").val() );
fd.append( 'email', $("#email").val() );



$.ajax({
                type:"POST",    
                url: "<?php echo base_url().'site/addtoSubscibe' ?>",
                data:fd,
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,
                success:function(data){
                    console.log( data);
                    var obj=JSON.parse(data);
                    if(obj.sucess==1){
                        if(obj.status==0){
                          $("#msg").css("color", "red");
                          $("#msg").text(obj.msg);
                        }
                        if(obj.status==1){
                          $("#msg").css("color", "green");
                          $("#msg").text(obj.msg);
                      }
                   
                   
                    }else{
                      toastr.warning('Error! Something Wonge Please try Later.');
                    }
                    }
            });




}


});
</script>

</body>
</html>