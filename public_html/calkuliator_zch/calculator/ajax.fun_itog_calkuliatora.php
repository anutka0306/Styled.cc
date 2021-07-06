<?php
 include 'config.php';

?>

<?php //<pre>print_r($_POST)?>
<!--<script src="http://code.jquery.com/jquery-1.11.0.js"></script>
<script type="text/javascript">
function deleteField (id) {
	$('tr#add'+id).remove();
}
</script>-->
<style>



.deletebutton {
	width: 20px;
	height: 22px;
	cursor: pointer;
	margin: 5px;
	display:inline-block;
	background: url(delete.png) repeat;
	background-position: center center;
	background-repeat: no-repeat;
	
}
.results th{
	text-align: center;
}
</style>


<table class="results" border="1" width="100%" cellspacing="0" cellpadding="4px">
      <thead><tr bgcolor="#CCCCCC">
          		<th width="20%" colspan="5">  <h3>Список работ</h3></th>
          </tr>
        <tr bgcolor="#CCCCCC">
          <th width="20%">Работы</th>
          <th width="20%">Состав работ</th>
         
          <th width="5%" align="center">Кол-во</th>
          <th width="15%" align="center">Стоимость</th>
        </tr>
      </thead>
      <tbody rel="0">
<?php  $symma='';$n = 0;  foreach ($_POST as $key=> $spisok_rabot){
	 $n++;
	 if($_POST['checkbox-'.$n]=='on'){
	 ?>  
     
      <tr  >
      <td >
      <?php echo  iconv('utf-8','cp1251',$_POST['name-'.$n])?>
      </td>
     	 <td align="center"><?php echo  iconv('utf-8','cp1251',$_POST['tip_rabot-'.$n])?></td>
        
        <td align="center" ><?php echo  $_POST[$n.'-kol']?></td>
        <td align="center" ><span rel="500"><?php $symma=$symma+($_POST[$n.'-kol']*$_POST['cena-'.$n]); echo $_POST['cena-'.$n] ?></span> руб</div>          
        </td>
      </tr>
      <?php }}
	  
	 ?>
        </tbody>
    </table>
<br />
Общая сумма:<?php echo $symma ?> руб.

<input name="old_marka" type='hidden'  value="<?php echo $_POST['marka']?>"/>
<input name="old_model" type='hidden'  value="<?php echo $_POST['model']?>"/>
<input name="old_gr_rabot" type='hidden'  value="<?php echo $_POST['gr_rabot']?>"/>

<input name="" type="button" value="очистить"  onclick="sbros()"/>
 