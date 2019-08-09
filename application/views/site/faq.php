
<title>Eitan Gallery</title>
<?php include 'include/header.php'; ?>
<?php include 'include/top_links.php'; ?>


<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px; font-weight: 600; color: #000;">FAQ's</h1>
    <!-- <p>Welcome to my Photo Gallery</p> -->
  </div>
</div>


<div class="container" style="padding: 5%;">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
           <div class="right-arrow pull-right">+</div>
          <a href="#">Rolled Canvas vs. Stretched Canvas Why Should You Opt For a Rolled Canvas Painting?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">The reason why people prefer purchasing a rolled canvas is that it is a very cost effective option. People simply receive their artwork in a roll and have the option of stretching it themselves. This is a great option for people who purchase things online. Make sure that you always ask the seller if the painting is stretched or not and how durable the stretcher bar is. Another reason why you may want to opt for a rolled canvas is that it is actually good for the canvas when it is stretched by the frame because it gives a very sleek look. Why Should You Opt For a Stretched Canvas Painting Some people like to opt for stretched canvas paintings because they like to get it stretched by the printing company that produces the painting. This way, the chances of the painting getting damaged are low, than you finding someone else to do the job or trying it yourself. In addition to this, it is seen that stretched paintings look better because the images are sharper and brighter. Lastly, stretched paintings are less likely to get damaged or dusty.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-title expand">
            <div class="right-arrow pull-right">+</div>
          <a href="#">Diasec</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Diasec is an established and process to face .Mounting photograph on to an acrylic sheet . A traditional photographic print is bonded directly to clear cast Perspex .its properties allow for a clearer and sharper image compared to normal glass .The diasec bonding is resistant to fungicidal.bacterial agents thus increasing the longevity of the print .the photograph is backed with aluminum sheet to reinforce the panel and allow for a custom made aluminum subframe which can then be hung directly on the wall as the support is invisible</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-title expand">
            <div class="right-arrow pull-right">+</div>
          <a href="#">Canvas Roll</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Zika canvas is the current slang / term for the high quality product in the modern printed canvas family / category. This means a high quality print on a high quality material / fabric. We use a 100% cotton material in Digi Edson printer and in the original color. Our product lasts for a long time eliminating the need for additional protective measures. The color is well absorbed into the material and does not fade or peel. Unlike other technologies it does not emit gases or an unpleasant odor. Therefore, it is suitable for domestic and office use or for any other public space. The ancient / historical term for a material that painters have been using to date. Rolled canvas reflects to a painting that has not been stretched, means you have to stretch it yourself. </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="panel-title expand">
            <div class="right-arrow pull-right">+</div>
          <a href="#">Metal Prints</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Metal prints, also known as metallic prints, are modern, high definition art pieces made of a sleek aluminum panel, layered with any image of your choosing.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="panel-title expand">
            <div class="right-arrow pull-right">+</div>
          <a href="#">Photo Paper Roll</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Chemical photo printing upon a photographic paper is a classic printing that serves the art of photography by using an original emulsion paper designed for printing the photo in an original visibility. Emulsion paper, being an active natural substance allows for an exceptional sharpness as well as softness that give the printing it's natural visibility. This photographic paper is suitable for all kind of frames.</div>
      </div>
    </div>
        <div class="panel panel-default">
      <div class="panel-heading">
        <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse6" class="panel-title expand">
            <div class="right-arrow pull-right">+</div>
          <a href="#">Canvas Strech</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Zika canvas is the current slang / term for the high quality product in the modern printed canvas family / category. This means a high quality print on a high quality material / fabric. We use a 100% cotton material in Digi Edson printer and in the original color. Our product lasts for a long time eliminating the need for additional protective measures. The color is well absorbed into the material and does not fade or peel. Unlike other technologies it does not emit gases or an unpleasant odor. Therefore, it is suitable for domestic and office use or for any other public space. The ancient / historical term for a material that painters have been using to date. Before an oil painting is framed, it is stretched on a frame called stretched bars. The canvas is generally stapled to give it a better fit and is called a stretched canvas.</div>
      </div>
    </div>
  </div> 
</div>





<?php include 'include/footer.php'; ?>
<?php include 'include/bottom_links.php'; ?>

<script type="">
	$(function() {
  $(".expand").on( "click", function() {
    // $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");
    
    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
  });
});
</script>

</body>
</html>