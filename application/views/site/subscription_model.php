<style>
    #subscribeModal .modal-content{
	overflow:hidden;
}
a.h2{
    color:#007b5e;
    margin-bottom:0;
    text-decoration:none;
}
#subscribeModal .form-control {
    height: 56px;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
	padding-left:30px;
}
#subscribeModal .btn {
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
	padding-right:20px;
	background:#007b5e;
	border-color:#007b5e;
}
#subscribeModal .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #007b5e;
    outline: 0;
    box-shadow: none;
}
#subscribeModal .top-strip{
	height: 155px;
    background: #007b5e;
    transform: rotate(141deg);
    margin-top: -94px;
    margin-right: 190px;
    margin-left: -130px;
    border-bottom: 65px solid #4CAF50;
    border-top: 10px solid #4caf50;
}
#subscribeModal .bottom-strip{
	height: 155px;
    background: #007b5e;
    transform: rotate(112deg);
    margin-top: -110px;
    margin-right: -215px;
    margin-left: 300px;
    border-bottom: 65px solid #4CAF50;
    border-top: 10px solid #4caf50;
}

/**************************/
/****** modal-lg stips *********/
/**************************/
#subscribeModal .modal-lg .top-strip {
    height: 155px;
    background: #007b5e;
    transform: rotate(141deg);
    margin-top: -106px;
    margin-right: 457px;
    margin-left: -130px;
    border-bottom: 65px solid #4CAF50;
    border-top: 10px solid #4caf50;
}
#subscribeModal .modal-lg .bottom-strip {
    height: 155px;
    background: #007b5e;
    transform: rotate(135deg);
    margin-top: -115px;
    margin-right: -339px;
    margin-left: 421px;
    border-bottom: 65px solid #4CAF50;
    border-top: 10px solid #4caf50;
}
#insta-img{
    position: absolute; 
    right: 100px
}
    @media only screen and (max-width: 600px) {
    #insta-img{
    right: 14px;
        margin-top: 13px;

}   
}
@media only screen and (max-width: 768px) {
#insta-img {
    position: relative;
    right:0px;
}
}
/****** extra *******/
#Reloadpage{
    cursor:pointer;
}
</style>


<div class="modal fade text-center py-5 subscribeModal-lg"  id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
<div style="background-color: #eece6c; padding: 6% 0;">
    
<a href="https://www.instagram.com/eitanshasha"><img id="insta-img"  src="http://www.yourpicture.co.il/siteassets/images/instagram.png" ></a>
<div class="row">
  <p class="mailing_title">Subscribe to mailing list</p>
  <br>
  <div class="col-sm-offset-2 col-sm-4">
    <input class="form-control mailing_input" id="username" type="text" name="" placeholder="Name">
    <br>
   
  </div>

  <div class="col-sm-4">
    <input class="form-control mailing_input" id="email" type="text" name="" placeholder="Email">
    <br>
     </div>
</div>
<div class="row">
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
            </div>
        </div>
    </div>
</div>
