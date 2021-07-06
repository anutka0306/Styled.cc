<?php include 'config.php'; ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"
        tppabs="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<? 
//$url='http://'.$_SERVER[HTTP_HOST].'/calkuliator_zch/';
$url='/calkuliator_zch/';

?>
<script src="<?=$url ?>js/jquery.maskedinput.min.js"></script>
<script src="<?=$url ?>js/script.js" tppabs="<?=$url ?>js/script.js"></script>
<link rel="stylesheet" href="<?=$url ?>css/calculator.css">
<script type="text/javascript" language="javascript">
	$("#calculator_phone").mask("+7(999) 999-99-99");
 	function fun_itog_calkuliatora() {
 	  var msg   = $('#kalk_form').serialize();
	  $("#itog_calkuliatora").empty();
	  
        $.ajax({
          type: 'POST',
          url: '<?=$url ?>calculator/ajax.fun_itog_calkuliatora.php',
          data: msg,
          success: function(data) {
            $('#itog_calkuliatora').html(data);
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }

function sbros() 
	{
	$("#itog_calkuliatora").empty();
	 
      //$selectbox.prop('selectedIndex', 0); 
	}
	
</script>
<form action="" name="kalk_form" id="kalk_form" method="post" class='contact-form' style="text-align: center">
<!--<form id="form_itog_calkuliatora" name="form_itog_calkuliatora" method="post" action="" />-->
Средняя стоимость с расходными материалами
	<div class="table-responsive">
		<table border="1" style="margin: 0 auto;">
			
			<tr>
				<td >№</td>
				<td >работы</td>
				<td>состав работ</td>
				<td >от руб.</td>
				<td ></td>
			</tr>
<?php

$sql = mysqli_query($dbcnx,"SELECT * FROM `calkuliator_zch`  ");//
while ($add2 = mysqli_fetch_assoc($sql))
		{
			
			$calkuliator = $add2;
			
		 ?>	
  <tr>
      <td >
      <?php echo $add2['id'] ?>
      <input type="checkbox" name="checkbox-<?php echo $add2['id'] ?>" id="checkbox-<?php echo $add2['id'] ?>" />
      <label for="checkbox"></label>
      </td>
      <td><input name="name-<?php echo $add2['id']?>" type="hidden" value="<?php 
	  $add2['name'] = $add2['name'];
	  echo $add2['name'] ?>" /><?php echo $add2['name'] ?></td>
    <td ><input name="tip_rabot-<?php echo $add2['id']?>" type="hidden" value="<?php 
	$add2['tip_rabot']  = $add2['tip_rabot'];
	echo $add2['tip_rabot'] ?>" /><?php echo $add2['tip_rabot'] ?> </td>
      <td ><input name="cena-<?php echo $add2['id']?>" type="hidden" value="<?php echo $add2['cena'] ?>" /><?php echo $add2['cena'] ?></td>
      <td>
      <select  name="<?php echo $add2['id'] ?>-kol" >
		  <option rel="1" value="1">1</option>  
          <option rel="2" value="2">2</option>  
          <option rel="3" value="3">3</option> 
           <option rel="4" value="4">4</option>  
          <option rel="5" value="5">5</option>  
          <option rel="6" value="6">6</option>
           <option rel="7" value="7">7</option>  
          <option rel="8" value="8">8</option>  
          <option rel="9" value="9">9</option> 
   
        </select></td>
    </tr>
		 
		 <?php
			
		}
?>




    
  </table>
  <input name="" type="button" value="Посчитать"  onclick="fun_itog_calkuliatora()"/>
 <input name="mob_calk" type="hidden" value="on">
<p>&nbsp;</p>
<span id="result"><p id="itog_calkuliatora"></p></span>

<?php include 'form.php';?>
  </form> 
  <p id="forma_otpravki"> </p>
<p>Обратите внимание на то, что данный интернет-ресурс (в том числе указанные цены на услуги) носит исключительно ознакомительный характер и ни при каких условиях не является публичной офертой, определяемой положениями Статьи 437 (2) Гражданского кодекса РФ. Стоимость работ меняется в зависимости от марки автомобиля, его возраста и технического состояния.</p>
  
 <script>
 function sbros_formi() 
	{
	//$("#forma_otpravki").empty();
	$("#itog_calkuliatora").empty();
	 $('#kalk_form').trigger( 'reset' );

      //$selectbox.prop('selectedIndex', 0); 
	}
	
 </script>

  
<!-- </body>
</html>-->