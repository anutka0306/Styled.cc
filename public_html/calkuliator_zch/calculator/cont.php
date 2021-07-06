
<style>
*{
    font-family: Areal;
}

.b-popup22{
    width:100%;
    min-height:100%;
    background-color: rgba(0,0,0,0.5);
    overflow: auto;
    position:fixed;
    top:0px;
}
.b-popup22 .b-popup-content22{
    margin:120px auto 0px auto;
    width:1000px;
    height: 950px;
    padding:10px;
    background-color: #fff;
    border-radius:5px;
    box-shadow: 0px 0px 10px #000;

}
</style>




<? 
$url='http://'.$_SERVER[HTTP_HOST].'/calkuliator_zch/';
?>

   

<div class="b-popup22" id="popup122" style="display: none; ">
    <div class="b-popup-content22">
	<a href="javascript:PopUpHide()">X</a>
       <?php include 'index2.php';
	  
	   ?>
      </div>    
    
   
</div>

<script>
$(document).ready(function(){
    PopUpHide();
});

function PopUpHide(){
    $("#popup122").hide();
	 //$("#popup122").empty();//чистим всё лишнее
}
function PopUpShow(){
   $("#popup122").show();
	 <? /*$.ajax({
       url: '<?=$url ?>calculator/index2.php',
       success: function(data) {
          $('#popup122').html(data);
         //alert('Load was performed.');
       }
     })*/?>
}
</script> 
