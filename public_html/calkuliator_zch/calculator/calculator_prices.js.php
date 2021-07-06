<?php 
//include (dirname(__FILE__).'/../../config.php');
include 'config.php';

$sql = mysqli_query($dbcnx,"SELECT * FROM `calkuliator_zch`");//
while ($add2 = mysqli_fetch_assoc($sql))
		{
			$calkuliator_marka[$add2['id_calk']] = $add2;
		} /*?><pre><? print_r($calkuliator_marka[3]); ?></pre> 
print '*'.$calkuliator_marka[3]['cena_s_okr'].'*';*/
?><script>
var costs = [];

//											  Пол салона 			Стекло ветровое		  Панель крышки			Пол богажника 		  Арка внутренняя       Стекло заднее         Арка наружняя		  Крышка багажника		Панель задняя		  Бампер задний			 Фонарь задний			Лонжерон задний		   Ккрыло заднее		  Ручка зад. двери		 Дверь задняя 			Молдинг зад. двери	   Ручка пер. двери		  Дверь передняя		 Молдинг пер. двери		Зеркало наружное	   Молдинг крыла		  Крыло переднее		Порог дверей		Стойка центральная		Лонжарон передний	   Бампер передний		  Блок-фара				 Рещетка радиатора	 Панель передняя		Капот передка 		   Брызковик передний	  Стойка передняя
/*цены Замена без окраски*/
costs[1] = [<?php 

if(isset($calkuliator_marka[1]))$cost1=$calkuliator_marka[1]['zamena_bez_okr'].',';else $cost1='0,';//1Пол салона 			
if(isset($calkuliator_marka[2]))$cost1.=$calkuliator_marka[2]['zamena_bez_okr'].',';else $cost1.=' 0,';//2Стекло ветровое		  
if(isset($calkuliator_marka[3]))$cost1.=$calkuliator_marka[3]['zamena_bez_okr'].',';else $cost1.=' 0,'; //3Панель крышки			
if(isset($calkuliator_marka[4]))$cost1.=$calkuliator_marka[4]['zamena_bez_okr'].',';else $cost1.=' 0,';//4Пол богажника 		  
if(isset($calkuliator_marka[5]))$cost1.=$calkuliator_marka[5]['zamena_bez_okr'].',';else $cost1.=' 0,';//5Арка внутренняя       
if(isset($calkuliator_marka[6]))$cost1.=$calkuliator_marka[6]['zamena_bez_okr'].',';else $cost1.=' 0,';//6Стекло заднее         
if(isset($calkuliator_marka[7]))$cost1.=$calkuliator_marka[7]['zamena_bez_okr'].',';else $cost1.=' 0,';//7Арка наружняя		  
if(isset($calkuliator_marka[8]))$cost1.=$calkuliator_marka[8]['zamena_bez_okr'].',';else $cost1.=' 0,';//8Крышка багажника		
if(isset($calkuliator_marka[9]))$cost1.=$calkuliator_marka[9]['zamena_bez_okr'].',';else $cost1.=' 0,';//9Панель задняя		  
if(isset($calkuliator_marka[10]))$cost1.=$calkuliator_marka[10]['zamena_bez_okr'].',';else $cost1.=' 0,';//10Бампер задний			 
if(isset($calkuliator_marka[11]))$cost1.=$calkuliator_marka[11]['zamena_bez_okr'].',';else $cost1.=' 0,';//11Фонарь задний			
if(isset($calkuliator_marka[12]))$cost1.=$calkuliator_marka[12]['zamena_bez_okr'].',';else $cost1.=' 0,';//12Лонжерон задний		   
if(isset($calkuliator_marka[13]))$cost1.=$calkuliator_marka[13]['zamena_bez_okr'].',';else $cost1.=' 0,';//13Ккрыло заднее		  
if(isset($calkuliator_marka[14]))$cost1.=$calkuliator_marka[14]['zamena_bez_okr'].',';else $cost1.=' 0,';//14Ручка зад. двери		 
if(isset($calkuliator_marka[15]))$cost1.=$calkuliator_marka[15]['zamena_bez_okr'].',';else $cost1.=' 0,';//15Дверь задняя 			
if(isset($calkuliator_marka[16]))$cost1.=$calkuliator_marka[16]['zamena_bez_okr'].',';else $cost1.=' 0,';//16Молдинг зад. двери	   
if(isset($calkuliator_marka[17]))$cost1.=$calkuliator_marka[17]['zamena_bez_okr'].',';else $cost1.=' 0,';//17Ручка пер. двери		  
if(isset($calkuliator_marka[18]))$cost1.=$calkuliator_marka[18]['zamena_bez_okr'].',';else $cost1.=' 0,';//18Дверь передняя		 
if(isset($calkuliator_marka[19]))$cost1.=$calkuliator_marka[19]['zamena_bez_okr'].',';else $cost1.=' 0,';//19Молдинг пер. двери		
if(isset($calkuliator_marka[20]))$cost1.=$calkuliator_marka[20]['zamena_bez_okr'].',';else $cost1.=' 0,';//20Зеркало наружное	   
if(isset($calkuliator_marka[21]))$cost1.=$calkuliator_marka[21]['zamena_bez_okr'].',';else $cost1.=' 0,';//21Молдинг крыла		  
if(isset($calkuliator_marka[22]))$cost1.=$calkuliator_marka[22]['zamena_bez_okr'].',';else $cost1.=' 0,';//22Крыло переднее		
if(isset($calkuliator_marka[23]))$cost1.=$calkuliator_marka[23]['zamena_bez_okr'].',';else $cost1.=' 0,';//23Порог дверей		
if(isset($calkuliator_marka[24]))$cost1.=$calkuliator_marka[24]['zamena_bez_okr'].',';else $cost1.=' 0,';//24Стойка центральная		
if(isset($calkuliator_marka[25]))$cost1.=$calkuliator_marka[25]['zamena_bez_okr'].',';else $cost1.=' 0,';//25Лонжарон передний	   
if(isset($calkuliator_marka[26]))$cost1.=$calkuliator_marka[26]['zamena_bez_okr'].',';else $cost1.=' 0,';//26Бампер передний		  
if(isset($calkuliator_marka[27]))$cost1.=$calkuliator_marka[27]['zamena_bez_okr'].',';else $cost1.=' 0,';//27Блок-фара				 
if(isset($calkuliator_marka[28]))$cost1.=$calkuliator_marka[28]['zamena_bez_okr'].',';else $cost1.=' 0,';//28Рещетка радиатора	 
if(isset($calkuliator_marka[29]))$cost1.=$calkuliator_marka[29]['zamena_bez_okr'].',';else $cost1.=' 0,';//29Панель передняя		
if(isset($calkuliator_marka[30]))$cost1.=$calkuliator_marka[30]['zamena_bez_okr'].',';else $cost1.=' 0,';//30Капот передка 		   
if(isset($calkuliator_marka[31]))$cost1.=$calkuliator_marka[31]['zamena_bez_okr'].',';else $cost1.=' 0,';//31Брызковик передний	  
if(isset($calkuliator_marka[32]))$cost1.=$calkuliator_marka[32]['zamena_bez_okr'].',';else $cost1.=' 0,';//32Стойка передняя



echo $cost1;

?>];
/*цены Замена с окраской */
costs[2] = [<?php 

if(isset($calkuliator_marka[1]))$cost2=$calkuliator_marka[1]['cena_s_okr'].',';else $cost2='0,';//1Пол салона 			
if(isset($calkuliator_marka[2]))$cost2.=$calkuliator_marka[2]['cena_s_okr'].',';else $cost2.=' 0,';//2Стекло ветровое		  
if(isset($calkuliator_marka[3]))$cost2.=$calkuliator_marka[3]['cena_s_okr'].',';else $cost2.=' 0,'; //3Панель крышки			
if(isset($calkuliator_marka[4]))$cost2.=$calkuliator_marka[4]['cena_s_okr'].',';else $cost2.=' 0,';//4Пол богажника 		  
if(isset($calkuliator_marka[5]))$cost2.=$calkuliator_marka[5]['cena_s_okr'].',';else $cost2.=' 0,';//5Арка внутренняя       
if(isset($calkuliator_marka[6]))$cost2.=$calkuliator_marka[6]['cena_s_okr'].',';else $cost2.=' 0,';//6Стекло заднее         
if(isset($calkuliator_marka[7]))$cost2.=$calkuliator_marka[7]['cena_s_okr'].',';else $cost2.=' 0,';//7Арка наружняя		  
if(isset($calkuliator_marka[8]))$cost2.=$calkuliator_marka[8]['cena_s_okr'].',';else $cost2.=' 0,';//8Крышка багажника		
if(isset($calkuliator_marka[9]))$cost2.=$calkuliator_marka[9]['cena_s_okr'].',';else $cost2.=' 0,';//9Панель задняя		  
if(isset($calkuliator_marka[10]))$cost2.=$calkuliator_marka[10]['cena_s_okr'].',';else $cost2.=' 0,';//10Бампер задний			 
if(isset($calkuliator_marka[11]))$cost2.=$calkuliator_marka[11]['cena_s_okr'].',';else $cost2.=' 0,';//11Фонарь задний			
if(isset($calkuliator_marka[12]))$cost2.=$calkuliator_marka[12]['cena_s_okr'].',';else $cost2.=' 0,';//12Лонжерон задний		   
if(isset($calkuliator_marka[13]))$cost2.=$calkuliator_marka[13]['cena_s_okr'].',';else $cost2.=' 0,';//13Ккрыло заднее		  
if(isset($calkuliator_marka[14]))$cost2.=$calkuliator_marka[14]['cena_s_okr'].',';else $cost2.=' 0,';//14Ручка зад. двери		 
if(isset($calkuliator_marka[15]))$cost2.=$calkuliator_marka[15]['cena_s_okr'].',';else $cost2.=' 0,';//15Дверь задняя 			
if(isset($calkuliator_marka[16]))$cost2.=$calkuliator_marka[16]['cena_s_okr'].',';else $cost2.=' 0,';//16Молдинг зад. двери	   
if(isset($calkuliator_marka[17]))$cost2.=$calkuliator_marka[17]['cena_s_okr'].',';else $cost2.=' 0,';//17Ручка пер. двери		  
if(isset($calkuliator_marka[18]))$cost2.=$calkuliator_marka[18]['cena_s_okr'].',';else $cost2.=' 0,';//18Дверь передняя		 
if(isset($calkuliator_marka[19]))$cost2.=$calkuliator_marka[19]['cena_s_okr'].',';else $cost2.=' 0,';//19Молдинг пер. двери		
if(isset($calkuliator_marka[20]))$cost2.=$calkuliator_marka[20]['cena_s_okr'].',';else $cost2.=' 0,';//20Зеркало наружное	   
if(isset($calkuliator_marka[21]))$cost2.=$calkuliator_marka[21]['cena_s_okr'].',';else $cost2.=' 0,';//21Молдинг крыла		  
if(isset($calkuliator_marka[22]))$cost2.=$calkuliator_marka[22]['cena_s_okr'].',';else $cost2.=' 0,';//22Крыло переднее		
if(isset($calkuliator_marka[23]))$cost2.=$calkuliator_marka[23]['cena_s_okr'].',';else $cost2.=' 0,';//23Порог дверей		
if(isset($calkuliator_marka[24]))$cost2.=$calkuliator_marka[24]['cena_s_okr'].',';else $cost2.=' 0,';//24Стойка центральная		
if(isset($calkuliator_marka[25]))$cost2.=$calkuliator_marka[25]['cena_s_okr'].',';else $cost2.=' 0,';//25Лонжарон передний	   
if(isset($calkuliator_marka[26]))$cost2.=$calkuliator_marka[26]['cena_s_okr'].',';else $cost2.=' 0,';//26Бампер передний		  
if(isset($calkuliator_marka[27]))$cost2.=$calkuliator_marka[27]['cena_s_okr'].',';else $cost2.=' 0,';//27Блок-фара				 
if(isset($calkuliator_marka[28]))$cost2.=$calkuliator_marka[28]['cena_s_okr'].',';else $cost2.=' 0,';//28Рещетка радиатора	 
if(isset($calkuliator_marka[29]))$cost2.=$calkuliator_marka[29]['cena_s_okr'].',';else $cost2.=' 0,';//29Панель передняя		
if(isset($calkuliator_marka[30]))$cost2.=$calkuliator_marka[30]['cena_s_okr'].',';else $cost2.=' 0,';//30Капот передка 		   
if(isset($calkuliator_marka[31]))$cost2.=$calkuliator_marka[31]['cena_s_okr'].',';else $cost2.=' 0,';//31Брызковик передний	  
if(isset($calkuliator_marka[32]))$cost2.=$calkuliator_marka[32]['cena_s_okr'].',';else $cost2.=' 0,';//32Стойка передняя



echo $cost2;

?>];
/*цены Лёгкий ремонт с окраской */
costs[3] = [<?php 

if(isset($calkuliator_marka[1]))$cost3=$calkuliator_marka[1]['cena_leg_s_okr'].',';else $cost3='0,';//1Пол салона 			
if(isset($calkuliator_marka[2]))$cost3.=$calkuliator_marka[2]['cena_leg_s_okr'].',';else $cost3.=' 0,';//2Стекло ветровое		  
if(isset($calkuliator_marka[3]))$cost3.=$calkuliator_marka[3]['cena_leg_s_okr'].',';else $cost3.=' 0,'; //3Панель крышки			
if(isset($calkuliator_marka[4]))$cost3.=$calkuliator_marka[4]['cena_leg_s_okr'].',';else $cost3.=' 0,';//4Пол богажника 		  
if(isset($calkuliator_marka[5]))$cost3.=$calkuliator_marka[5]['cena_leg_s_okr'].',';else $cost3.=' 0,';//5Арка внутренняя       
if(isset($calkuliator_marka[6]))$cost3.=$calkuliator_marka[6]['cena_leg_s_okr'].',';else $cost3.=' 0,';//6Стекло заднее         
if(isset($calkuliator_marka[7]))$cost3.=$calkuliator_marka[7]['cena_leg_s_okr'].',';else $cost3.=' 0,';//7Арка наружняя		  
if(isset($calkuliator_marka[8]))$cost3.=$calkuliator_marka[8]['cena_leg_s_okr'].',';else $cost3.=' 0,';//8Крышка багажника		
if(isset($calkuliator_marka[9]))$cost3.=$calkuliator_marka[9]['cena_leg_s_okr'].',';else $cost3.=' 0,';//9Панель задняя		  
if(isset($calkuliator_marka[10]))$cost3.=$calkuliator_marka[10]['cena_leg_s_okr'].',';else $cost3.=' 0,';//10Бампер задний			 
if(isset($calkuliator_marka[11]))$cost3.=$calkuliator_marka[11]['cena_leg_s_okr'].',';else $cost3.=' 0,';//11Фонарь задний			
if(isset($calkuliator_marka[12]))$cost3.=$calkuliator_marka[12]['cena_leg_s_okr'].',';else $cost3.=' 0,';//12Лонжерон задний		   
if(isset($calkuliator_marka[13]))$cost3.=$calkuliator_marka[13]['cena_leg_s_okr'].',';else $cost3.=' 0,';//13Ккрыло заднее		  
if(isset($calkuliator_marka[14]))$cost3.=$calkuliator_marka[14]['cena_leg_s_okr'].',';else $cost3.=' 0,';//14Ручка зад. двери		 
if(isset($calkuliator_marka[15]))$cost3.=$calkuliator_marka[15]['cena_leg_s_okr'].',';else $cost3.=' 0,';//15Дверь задняя 			
if(isset($calkuliator_marka[16]))$cost3.=$calkuliator_marka[16]['cena_leg_s_okr'].',';else $cost3.=' 0,';//16Молдинг зад. двери	   
if(isset($calkuliator_marka[17]))$cost3.=$calkuliator_marka[17]['cena_leg_s_okr'].',';else $cost3.=' 0,';//17Ручка пер. двери		  
if(isset($calkuliator_marka[18]))$cost3.=$calkuliator_marka[18]['cena_leg_s_okr'].',';else $cost3.=' 0,';//18Дверь передняя		 
if(isset($calkuliator_marka[19]))$cost3.=$calkuliator_marka[19]['cena_leg_s_okr'].',';else $cost3.=' 0,';//19Молдинг пер. двери		
if(isset($calkuliator_marka[20]))$cost3.=$calkuliator_marka[20]['cena_leg_s_okr'].',';else $cost3.=' 0,';//20Зеркало наружное	   
if(isset($calkuliator_marka[21]))$cost3.=$calkuliator_marka[21]['cena_leg_s_okr'].',';else $cost3.=' 0,';//21Молдинг крыла		  
if(isset($calkuliator_marka[22]))$cost3.=$calkuliator_marka[22]['cena_leg_s_okr'].',';else $cost3.=' 0,';//22Крыло переднее		
if(isset($calkuliator_marka[23]))$cost3.=$calkuliator_marka[23]['cena_leg_s_okr'].',';else $cost3.=' 0,';//23Порог дверей		
if(isset($calkuliator_marka[24]))$cost3.=$calkuliator_marka[24]['cena_leg_s_okr'].',';else $cost3.=' 0,';//24Стойка центральная		
if(isset($calkuliator_marka[25]))$cost3.=$calkuliator_marka[25]['cena_leg_s_okr'].',';else $cost3.=' 0,';//25Лонжарон передний	   
if(isset($calkuliator_marka[26]))$cost3.=$calkuliator_marka[26]['cena_leg_s_okr'].',';else $cost3.=' 0,';//26Бампер передний		  
if(isset($calkuliator_marka[27]))$cost3.=$calkuliator_marka[27]['cena_leg_s_okr'].',';else $cost3.=' 0,';//27Блок-фара				 
if(isset($calkuliator_marka[28]))$cost3.=$calkuliator_marka[28]['cena_leg_s_okr'].',';else $cost3.=' 0,';//28Рещетка радиатора	 
if(isset($calkuliator_marka[29]))$cost3.=$calkuliator_marka[29]['cena_leg_s_okr'].',';else $cost3.=' 0,';//29Панель передняя		
if(isset($calkuliator_marka[30]))$cost3.=$calkuliator_marka[30]['cena_leg_s_okr'].',';else $cost3.=' 0,';//30Капот передка 		   
if(isset($calkuliator_marka[31]))$cost3.=$calkuliator_marka[31]['cena_leg_s_okr'].',';else $cost3.=' 0,';//31Брызковик передний	  
if(isset($calkuliator_marka[32]))$cost3.=$calkuliator_marka[32]['cena_leg_s_okr'].',';else $cost3.=' 0,';//32Стойка передняя



echo $cost3;

?>];
/*цены Сложный ремонт с окраской */
costs[4] = [<?php 

if(isset($calkuliator_marka[1]))$cost4=$calkuliator_marka[1]['cena_slog_s_okr'].',';else $cost4='0,';//1Пол салона 			
if(isset($calkuliator_marka[2]))$cost4.=$calkuliator_marka[2]['cena_slog_s_okr'].',';else $cost4.=' 0,';//2Стекло ветровое		  
if(isset($calkuliator_marka[3]))$cost4.=$calkuliator_marka[3]['cena_slog_s_okr'].',';else $cost4.=' 0,'; //3Панель крышки			
if(isset($calkuliator_marka[4]))$cost4.=$calkuliator_marka[4]['cena_slog_s_okr'].',';else $cost4.=' 0,';//4Пол богажника 		  
if(isset($calkuliator_marka[5]))$cost4.=$calkuliator_marka[5]['cena_slog_s_okr'].',';else $cost4.=' 0,';//5Арка внутренняя       
if(isset($calkuliator_marka[6]))$cost4.=$calkuliator_marka[6]['cena_slog_s_okr'].',';else $cost4.=' 0,';//6Стекло заднее         
if(isset($calkuliator_marka[7]))$cost4.=$calkuliator_marka[7]['cena_slog_s_okr'].',';else $cost4.=' 0,';//7Арка наружняя		  
if(isset($calkuliator_marka[8]))$cost4.=$calkuliator_marka[8]['cena_slog_s_okr'].',';else $cost4.=' 0,';//8Крышка багажника		
if(isset($calkuliator_marka[9]))$cost4.=$calkuliator_marka[9]['cena_slog_s_okr'].',';else $cost4.=' 0,';//9Панель задняя		  
if(isset($calkuliator_marka[10]))$cost4.=$calkuliator_marka[10]['cena_slog_s_okr'].',';else $cost4.=' 0,';//10Бампер задний			 
if(isset($calkuliator_marka[11]))$cost4.=$calkuliator_marka[11]['cena_slog_s_okr'].',';else $cost4.=' 0,';//11Фонарь задний			
if(isset($calkuliator_marka[12]))$cost4.=$calkuliator_marka[12]['cena_slog_s_okr'].',';else $cost4.=' 0,';//12Лонжерон задний		   
if(isset($calkuliator_marka[13]))$cost4.=$calkuliator_marka[13]['cena_slog_s_okr'].',';else $cost4.=' 0,';//13Ккрыло заднее		  
if(isset($calkuliator_marka[14]))$cost4.=$calkuliator_marka[14]['cena_slog_s_okr'].',';else $cost4.=' 0,';//14Ручка зад. двери		 
if(isset($calkuliator_marka[15]))$cost4.=$calkuliator_marka[15]['cena_slog_s_okr'].',';else $cost4.=' 0,';//15Дверь задняя 			
if(isset($calkuliator_marka[16]))$cost4.=$calkuliator_marka[16]['cena_slog_s_okr'].',';else $cost4.=' 0,';//16Молдинг зад. двери	   
if(isset($calkuliator_marka[17]))$cost4.=$calkuliator_marka[17]['cena_slog_s_okr'].',';else $cost4.=' 0,';//17Ручка пер. двери		  
if(isset($calkuliator_marka[18]))$cost4.=$calkuliator_marka[18]['cena_slog_s_okr'].',';else $cost4.=' 0,';//18Дверь передняя		 
if(isset($calkuliator_marka[19]))$cost4.=$calkuliator_marka[19]['cena_slog_s_okr'].',';else $cost4.=' 0,';//19Молдинг пер. двери		
if(isset($calkuliator_marka[20]))$cost4.=$calkuliator_marka[20]['cena_slog_s_okr'].',';else $cost4.=' 0,';//20Зеркало наружное	   
if(isset($calkuliator_marka[21]))$cost4.=$calkuliator_marka[21]['cena_slog_s_okr'].',';else $cost4.=' 0,';//21Молдинг крыла		  
if(isset($calkuliator_marka[22]))$cost4.=$calkuliator_marka[22]['cena_slog_s_okr'].',';else $cost4.=' 0,';//22Крыло переднее		
if(isset($calkuliator_marka[23]))$cost4.=$calkuliator_marka[23]['cena_slog_s_okr'].',';else $cost4.=' 0,';//23Порог дверей		
if(isset($calkuliator_marka[24]))$cost4.=$calkuliator_marka[24]['cena_slog_s_okr'].',';else $cost4.=' 0,';//24Стойка центральная		
if(isset($calkuliator_marka[25]))$cost4.=$calkuliator_marka[25]['cena_slog_s_okr'].',';else $cost4.=' 0,';//25Лонжарон передний	   
if(isset($calkuliator_marka[26]))$cost4.=$calkuliator_marka[26]['cena_slog_s_okr'].',';else $cost4.=' 0,';//26Бампер передний		  
if(isset($calkuliator_marka[27]))$cost4.=$calkuliator_marka[27]['cena_slog_s_okr'].',';else $cost4.=' 0,';//27Блок-фара				 
if(isset($calkuliator_marka[28]))$cost4.=$calkuliator_marka[28]['cena_slog_s_okr'].',';else $cost4.=' 0,';//28Рещетка радиатора	 
if(isset($calkuliator_marka[29]))$cost4.=$calkuliator_marka[29]['cena_slog_s_okr'].',';else $cost4.=' 0,';//29Панель передняя		
if(isset($calkuliator_marka[30]))$cost4.=$calkuliator_marka[30]['cena_slog_s_okr'].',';else $cost4.=' 0,';//30Капот передка 		   
if(isset($calkuliator_marka[31]))$cost4.=$calkuliator_marka[31]['cena_slog_s_okr'].',';else $cost4.=' 0,';//31Брызковик передний	  
if(isset($calkuliator_marka[32]))$cost4.=$calkuliator_marka[32]['cena_slog_s_okr'].',';else $cost4.=' 0,';//32Стойка передняя



echo $cost4;

?>];
/*цены Окраска без ремонта*/
costs[5] = [<?php 

if(isset($calkuliator_marka[1]))$cost5=$calkuliator_marka[1]['cena_okr'].',';else $cost5='0,';//1Пол салона 			
if(isset($calkuliator_marka[2]))$cost5.=$calkuliator_marka[2]['cena_okr'].',';else $cost5.=' 0,';//2Стекло ветровое		  
if(isset($calkuliator_marka[3]))$cost5.=$calkuliator_marka[3]['cena_okr'].',';else $cost5.=' 0,'; //3Панель крышки			
if(isset($calkuliator_marka[4]))$cost5.=$calkuliator_marka[4]['cena_okr'].',';else $cost5.=' 0,';//4Пол богажника 		  
if(isset($calkuliator_marka[5]))$cost5.=$calkuliator_marka[5]['cena_okr'].',';else $cost5.=' 0,';//5Арка внутренняя       
if(isset($calkuliator_marka[6]))$cost5.=$calkuliator_marka[6]['cena_okr'].',';else $cost5.=' 0,';//6Стекло заднее         
if(isset($calkuliator_marka[7]))$cost5.=$calkuliator_marka[7]['cena_okr'].',';else $cost5.=' 0,';//7Арка наружняя		  
if(isset($calkuliator_marka[8]))$cost5.=$calkuliator_marka[8]['cena_okr'].',';else $cost5.=' 0,';//8Крышка багажника		
if(isset($calkuliator_marka[9]))$cost5.=$calkuliator_marka[9]['cena_okr'].',';else $cost5.=' 0,';//9Панель задняя		  
if(isset($calkuliator_marka[10]))$cost5.=$calkuliator_marka[10]['cena_okr'].',';else $cost5.=' 0,';//10Бампер задний			 
if(isset($calkuliator_marka[11]))$cost5.=$calkuliator_marka[11]['cena_okr'].',';else $cost5.=' 0,';//11Фонарь задний			
if(isset($calkuliator_marka[12]))$cost5.=$calkuliator_marka[12]['cena_okr'].',';else $cost5.=' 0,';//12Лонжерон задний		   
if(isset($calkuliator_marka[13]))$cost5.=$calkuliator_marka[13]['cena_okr'].',';else $cost5.=' 0,';//13Ккрыло заднее		  
if(isset($calkuliator_marka[14]))$cost5.=$calkuliator_marka[14]['cena_okr'].',';else $cost5.=' 0,';//14Ручка зад. двери		 
if(isset($calkuliator_marka[15]))$cost5.=$calkuliator_marka[15]['cena_okr'].',';else $cost5.=' 0,';//15Дверь задняя 			
if(isset($calkuliator_marka[16]))$cost5.=$calkuliator_marka[16]['cena_okr'].',';else $cost5.=' 0,';//16Молдинг зад. двери	   
if(isset($calkuliator_marka[17]))$cost5.=$calkuliator_marka[17]['cena_okr'].',';else $cost5.=' 0,';//17Ручка пер. двери		  
if(isset($calkuliator_marka[18]))$cost5.=$calkuliator_marka[18]['cena_okr'].',';else $cost5.=' 0,';//18Дверь передняя		 
if(isset($calkuliator_marka[19]))$cost5.=$calkuliator_marka[19]['cena_okr'].',';else $cost5.=' 0,';//19Молдинг пер. двери		
if(isset($calkuliator_marka[20]))$cost5.=$calkuliator_marka[20]['cena_okr'].',';else $cost5.=' 0,';//20Зеркало наружное	   
if(isset($calkuliator_marka[21]))$cost5.=$calkuliator_marka[21]['cena_okr'].',';else $cost5.=' 0,';//21Молдинг крыла		  
if(isset($calkuliator_marka[22]))$cost5.=$calkuliator_marka[22]['cena_okr'].',';else $cost5.=' 0,';//22Крыло переднее		
if(isset($calkuliator_marka[23]))$cost5.=$calkuliator_marka[23]['cena_okr'].',';else $cost5.=' 0,';//23Порог дверей		
if(isset($calkuliator_marka[24]))$cost5.=$calkuliator_marka[24]['cena_okr'].',';else $cost5.=' 0,';//24Стойка центральная		
if(isset($calkuliator_marka[25]))$cost5.=$calkuliator_marka[25]['cena_okr'].',';else $cost5.=' 0,';//25Лонжарон передний	   
if(isset($calkuliator_marka[26]))$cost5.=$calkuliator_marka[26]['cena_okr'].',';else $cost5.=' 0,';//26Бампер передний		  
if(isset($calkuliator_marka[27]))$cost5.=$calkuliator_marka[27]['cena_okr'].',';else $cost5.=' 0,';//27Блок-фара				 
if(isset($calkuliator_marka[28]))$cost5.=$calkuliator_marka[28]['cena_okr'].',';else $cost5.=' 0,';//28Рещетка радиатора	 
if(isset($calkuliator_marka[29]))$cost5.=$calkuliator_marka[29]['cena_okr'].',';else $cost5.=' 0,';//29Панель передняя		
if(isset($calkuliator_marka[30]))$cost5.=$calkuliator_marka[30]['cena_okr'].',';else $cost5.=' 0,';//30Капот передка 		   
if(isset($calkuliator_marka[31]))$cost5.=$calkuliator_marka[31]['cena_okr'].',';else $cost5.=' 0,';//31Брызковик передний	  
if(isset($calkuliator_marka[32]))$cost5.=$calkuliator_marka[32]['cena_okr'].',';else $cost5.=' 0,';//32Стойка передняя



echo $cost5;

?>];

//В каждом массиве ровно 32 числа                  , т.к. имеется 32 детали. 
//По порядку N-ое число соответствует цене по 
//указанной в комментариях работе для N-ой детали 
//начиная начиная с "Пол салона"" и как в калькуляторе                  ,обходя
// элементы по часовой стрелке                  , заканчивая "Cтойка передняя" 
// Если такого вида работ по данной детали не производится                  ,
// то цена должна равняться 0. 
//Но количество элементов всегда должно оставаться по 32 в каждом массиве.
</script>