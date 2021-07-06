<?php
	include('../../functions.php');
	include('../../index_bootloader.php');
	$page['meta_title'] = 'Калькулятор кузовного ремонта в Москве - Детейлингофъ';
	$page['meta_desrc'] = 'Калькулятор кузовного ремонта в Москве. &#11088; Вернем вид нового автомобиля! &#128205; Выгода до 30%! Комфортная зона ожидания! Калькулятор кузовного ремонта. &#128736; автосервис «Детейлингофъ»';
	include('../../header.php');
	
	$what_site_version = 'desctop';


    if(mb_ereg("mobile", strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $what_site_version = 'mobile';
    }

?>
<style>
	body {
		background-color: white ;
	}
</style>

    
 <!--контент плюс левое меню -->
<? /*    <div class="right_megaa_blockk" style="margin-bottom: 0px;">
    
		<a href="https://fuelfuture.ru/page_s/contact_info/">
			<img src="https://fuelfuture.ru/images/lef_img_mapps.png" border=0 />
		</a>
		<div class="bg_full_body_filddsfe" onclick="location.href='https://fuelfuture.ru/warranty/';"></div>
		
		</div>	
    	 
        
        <div class="buttons_left_call">
            <span class="call_backks" onclick="ga('send', 'event', 'form_call', 'send');" ></span>
            <span class="zapis_on_repairr" onclick="ga('send', 'event', 'form', 'send');"></span>
            <div class="clr"></div>
			
        </div>
     <!--калькулятор-->
		<a class="ocenka_po_fotoosd" target="_blank" href="https://fuelfuture.ru/calkuliator_zch/calculator/">
            <img src="https://fuelfuture.ru/images/calk.png" border=0 />
        </a>
		 <br>
        <a class="ocenka_po_fotoosd" href="https://fuelfuture.ru/ocenka_po_foto/">
            <img src="https://fuelfuture.ru/images/ocenka_stoimosti_po_foto.png" border=0 />
        </a>
		
		
		
		
		
		
		<div id="left_menu_on_all_in_paffg">
			<? require_once ($_SERVER['DOCUMENT_ROOT'].'/core_vik/left_menu_s.php'); ?>
		</div>
       
        
		<div class="mega_left_primer_nash_rabott">
			<div class="zzaggllsdkcv"><a href="https://fuelfuture.ru/naschiraboty/">Примеры наших работ</a></div>
			<?
			$sqll_kdjv = mysql_query ("SELECT * FROM naschiraboty ORDER BY id DESC LIMIT 3");
			while ($item_left_nach_rabota = mysqli_fetch_assoc($sqll_kdjv)) {
				$mini_imag_tmp001 = explode("<<<>>>", $item_left_nach_rabota['images']);
				echo '<div class="block_itemss_primer_left">
							<div class="imgkksd"><img src="https://fuelfuture.ru/system_vik/naschiraboty/small/'.$mini_imag_tmp001[0].'"/></div>
							<div class="descrrppmbjdy">
								<span>'.TrimText($item_left_nach_rabota['name'], 20).'</span>
								<div>'.TrimText($item_left_nach_rabota['short_text'], 60).'</div>
								<a href="https://fuelfuture.ru/naschiraboty/'.$item_left_nach_rabota['id'].'/">Подробнее...</a>
							</div>
							<div class="clr"></div>
						</div>';
						
			}
			?>
        </div>
		<div class="mega_left_primer_nash_rabott">
			<div class="zzaggllsdkcv"><a href="/stati/">Статьи</a></div>
			<?include("stati_preview.php");?>
        </div>
		
		
		
		<div class="vidjet_vk_grupp">
            <div id="vk_groups"></div>
            
			<script type="text/javascript" src="//vk.com/js/api/openapi.js?143"></script>

<!--<!-- VK Widget 
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 3}, 140312240);
</script>-->
			
			
			
			
			
			<script type="text/javascript">
                VK.Widgets.Group("vk_groups", {mode: 3, width: "298", height: "100", color1: 'FFFFFF', color2: '2B587A', color3: '5b7fa6'}, 140312240);
            </script>
        </div>
		
		
		
		<div class="mega_block_left_otzivv">
			<div class="zzag_otz_blo_lft">Отзывы клиентов</div>
			<?
			$sqll_kdjvsc = mysql_query ("SELECT * FROM reviews ORDER BY date DESC LIMIT 3");
			while ($item_left_otziv = mysqli_fetch_assoc($sqll_kdjvsc)) {
				 
				$good_stars = $item_left_otziv['ocenka'];
				$newgative_stars = 5-$item_left_otziv['ocenka'];
				$ocenka = '';
				for ($i=0;$i<$good_stars;$i++) {
					$ocenka .= '<span>&#9733;</span>';
				}
				for ($i=0;$i<$newgative_stars;$i++) {
					$ocenka .= '<span class="grey_star_kkd">&#9733;</span>';
				}
				if (strlen($item_left_otziv['photo_name']) > 5) {
					$oopdd = '<a  href="/reviews/'.$item_left_otziv['id'].'/"><img src="/system_vik/img_reviews/small/'.$item_left_otziv['photo_name'].'" /></a>';
				}else {
					$oopdd = '<img class="noo_ssshfkaaa" src="/images/finding_scan.png" />';
				}
				
				echo '<div class="otzziv_itemmm">
							<div class="clr"></div> 
							<div class="super_left_block_diivjasdvvva">'.$oopdd.'</div>
							<div class="fioaomvn">
								<div class="zzaggovckd"><span class="datttegggvkasdvk">'.date("d.m.Y", $item_left_otziv['date']).'</span><small>'.$item_left_otziv['autor'].'</small><i class="ocenhdhvga">'.$ocenka.'</i></div>
								<div class="images_jjvchsm">
									'.$item_left_otziv['text'].'
								</div> 
							</div>
							<div class="clr"></div> 
						</div>';
						
						
				 
						
			}
			?>
			<div class="nnav_block_otzz">
				<div class="link_go"><a href="/reviews/">Читать все -&gt;</a></div>
				<div class="clr"></div>
			</div>
        </div>
		


        
	</div>

*/ ?> 
      <!-- Часть с контентом -->
        <div class="mega_contentt_blockksd">
			
			<!-- <div class="phones_left_block_kkasd">
				<div class="cont_top_item">
					<div class="zag_service_left_kd">Техцентр Севастопольский</div>
					<span class="adress_service_left_kd">Москва, Севастопольский проспект дом. 95Д</span>
					<div class="clr"></div>
					<div class="phone_service_left_kd mgo-number-10762"  onclick="location.href='tel:+74953747712'">+7 (495) 374-77-12</div><span></span>
					<div class="clr"></div>
				</div>
				<div class="cont_top_item">
					<div class="zag_service_left_kd">Техцентр на Мичуринском</div>
					<span class="adress_service_left_kd ">Москва, ЗАО ул. Удальцова, 60стр.7</span>
					<div class="clr"></div>
					<div class="phone_service_left_kd mgo-number-11086"  onclick="location.href='tel:+74953748856'">+7(495) 374-88-56</div><span></span>
					<div class="clr"></div>
				</div>
				<div class="cont_top_item">
					<div class="zag_service_left_kd">Техцентр на Нижегородской</div>
					<span class="adress_service_left_kd">Москва, ЦАО Нижегородская ул. 102стр.11</span>
					<div class="clr"></div>
					<div class="phone_service_left_kd mgo-number-10005"  onclick="location.href='tel:+74953748853'">+7 (495) 374-88-53</div><span></span>
					<div class="clr"></div>
				</div>
			</div> -->
		

		<?
		#Марки
		$html_1 = '';
		$sql_marks = mysqli_query($db,"SELECT * FROM marks WHERE parent=0 AND icon_lent_menu !='' ORDER BY sort ASC");
		while ($datas = mysqli_fetch_assoc($sql_marks)) {
			$html_1 .= '<a href="'.$datas['path'].'"><img src="/system_vik/content/small/'.$datas['icon_lent_menu'].'" /><span>'.$datas['name'].'</span></a>';
		}
		if (strlen($html_1) > 10) {
			echo '<div class="block_marks_list_top">'.$html_1.'</div>';
		}
		?>

		
			
		</div><!-- class="mega_contentt_blockksd"-->
	 <? /* 	
		
		
		 
		
		

        <? if ($this_paag == 'main_page') { ?>
				<div class="nav_kuski_blockksd">
					<ul>
						<li>
						<a href="https://fuelfuture.ru/local_body_repair/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/kuzov_main_page_kusok.jpg" alt="Локальный ремонт кузова" title="Локальный ремонт кузова" border="0" />
								<span>Локальный ремонт кузова</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/local_paint/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/localn_pokraska.jpg" alt="Локальная покраска автомобиля" title="Локальная покраска автомобиля" border="0"/>
								<span>Локальная покраска автомобиля</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/repair_indents/remov_indents_paint/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/udalenie_vmyatin_bez_pokraski.jpg" alt="Удаление вмятин без покраски" title="Удаление вмятин без покраски" border="0" />
								<span>Удаление вмятин без покраски</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/polishing/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/polirovka_kuzova.jpg" alt="Полировка кузова автомобиля" title="Полировка кузова автомобиля" border="0" />
								<span>Полировка кузова автомобиля</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/remov_scratch/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/udalenie_carapin.jpg" alt="Удаление царапин на автомобиле" title="Удаление царапин на автомобиле" border="0" />
								<span>Удаление царапин на автомобиле</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/bampers/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/remont_bampera.jpg" alt="Ремонт бампера" title="Ремонт бампера" border="0" />
								<span>Ремонт бампера</span>
							</a>
						</li>
						 <li>
							<a href="https://fuelfuture.ru/repair_glass/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/zamena_stekol.jpg" alt="Замена стекла авто" title="Замена стекла авто" border="0" />
								<span>Замена стекла авто</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/paint_rubber/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/pokraska_zidkoy_rezinoy.jpg" alt="Покраска жидкой резиной" title="Покраска жидкой резиной" border="0" />
								<span>Покраска жидкой резиной</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/repair_chips_paint/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/remont_skolov.jpg" alt="Ремонт сколов краски на авто" title="Ремонт сколов краски на авто" border="0" />
								<span>Ремонт сколов краски на авто</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/repair_glass/repair_chips_wind/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/remont_skolov_na_lobovom.jpg" alt="Ремонт сколов на лобовом стекле" title="Ремонт сколов на лобовом стекле" border="0" />
								<span>Ремонт сколов на лобовом стекле</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/paint_bampers/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/pokraska_bampera.jpg" alt="Покраска бампера" title="Покраска бампера" border="0" />
								<span>Покраска бампера</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/polishing/pol_headlights/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/polirovka_far.jpg" alt="Полировка фар" title="Полировка фар" border="0" />
								<span>Полировка фар</span>
							</a>
						</li>
						<div class="clr"></div>
					</ul>
				</div>
		
		<? } elseif ($temp_data_oo01[0]== 'paint' && strlen($temp_data_oo01[1]) == 0) { ?>

				<div class="nav_kuski_blockksd">
					<ul>
						<li>
							<a href="https://fuelfuture.ru/paint/local_paint/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/localn_pokraska.jpg" alt="Локальная покраска автомобиля" title="Локальная покраска автомобиля" border="0"/>
								<span>Локальная покраска автомобиля</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/paint_bampers/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/pokraska_bampera.jpg" alt="Покраска бампера" title="Покраска бампера" border="0" />
								<span>Покраска бампера</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/cowl_paint/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/kusokk_kapot_kkvks.jpg" alt="Покраска капота" title="Покраска капота" border="0" />
								<span>Покраска капота</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/paint_covered/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/paint_kriloosdmv.jpg" alt="Покраска крыла" title="Покраска крыла" border="0" />
								<span>Покраска крыла</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/thresholds/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/paint_poroggksdc.jpg" alt="Покраска порогов автомобиля" title="Покраска порогов автомобиля" border="0" />
								<span>Покраска порогов автомобиля</span>
							</a>
						</li>
						<li>
							<a href="https://fuelfuture.ru/paint/paint_rubber/" class="item_nav_kuski">
								<img src="https://fuelfuture.ru/images/pokraska_zidkoy_rezinoy.jpg" alt="Покраска жидкой резиной" title="Покраска жидкой резиной" border="0" />
								<span>Покраска жидкой резиной</span>
							</a>
						</li>
						<div class="clr"></div>
					</ul>
				</div>
		
		<? } ?>
		
		
					<?
			#Хлебные крошки
			if ($this_paag != 'main_page') {
			
				#Страница самой новости
				if ($temp_data_oo01[0]== 'news' && is_int($temp_data_oo01[1]) ) {
					
					#Обновим счетчик просмотров
					mysqli_query($dbcnx,"UPDATE news SET count_views=count_views+1 WHERE id=".intval($temp_data_oo01[1]));
					#Оценка 
					if (!in_array(intval($temp_data_oo01[1]), $_COOKIE['massive_news_add_ocenka'])) { #Если нет этой новости в кукках
						$show_ocenka_form_001 = '<div class="add_pls_ocenka_news newssss">
													<span class="zzags_dsk">Понравилась ли Вам статья?</span>
													<div alt="'.$page['id'].'"><span class="like_kkd">Хорошо</span><span class="dislike_kkd">Плохо</span></div>
												</div>';
					}
					
					
					$news_main_page_info = mysqli_fetch_assoc(mysqli_query($dbcnx,"SELECT * FROM content WHERE path='/news/'"));
					echo '<div id="naviiigggg"><span><a href="/">Главная</a> &#8646; <a href="/news/">'.$news_main_page_info['name'].'</a> &#8646; '.$page['name'].'</span></div>';
					$page['text'] = '<h1 id="page_news_intem_s">'.$page['name'].'</h1>
									<div class="news_infoos">
										<span>28.02.2015</span>
										<small class="viewsa_news">'.$page['count_views'].'</small>
										<small class="likes_news">'.$page['count_like'].'</small>
										<small class="dislikes_news">'.$page['count_dislike'].'</small>
									</div>'.$page['text'].$show_ocenka_form_001;
					
				}
				
				#Страница самого отзыва
				elseif ($temp_data_oo01[0]== 'reviews' && is_int($temp_data_oo01[1]) ) { 
					$reviews_main_page_info = mysqli_fetch_assoc(mysqli_query($dbcnx,"SELECT * FROM content WHERE path='/reviews/'"));
					echo '<div id="naviiigggg"><span><a href="/">Главная</a> &#8646; <a href="/reviews/">'.$reviews_main_page_info['name'].'</a> &#8646; Отзыв от '.date("d.m.Y", $page['date']).'</span></div>'; 
					$good_stars = $page['ocenka'];
					$newgative_stars = 5-$page['ocenka'];
					$ocenka = '';
					for ($i=0;$i<$good_stars;$i++) {
						$ocenka .= '<span>&#9733;</span>';
					}
					for ($i=0;$i<$newgative_stars;$i++) {
						$ocenka .= '<span class="grey_star_kkd">&#9733;</span>';
					}
					if (strlen($page['photo_name']) > 5) {
						$oopdd = '<a class="test-popup-link" href="/system_vik/img_reviews/original/'.$page['photo_name'].'"><img src="/system_vik/img_reviews/small/'.$page['photo_name'].'" /></a>';
					}else {
						$oopdd = '<img class="noo_ssshfk" src="/images/finding_scan.png" />';
					}
					$page['text'] = '<h1>Отзыв клиента от '.date("d.m.Y", $page['date']).'</h1><div class="item_block_rewiews in_rev_page_odi">
										<div class="clr"></div> 
										<div class="super_left_block_diivjasd">'.$oopdd.'</div>
										<div class="left_blockzzdsa">
											<span class="author_oosdss">'.$page['autor'].'</span>
											<div>'.$ocenka.'</div>
											<small>'.date("d.m.Y", $page['date']).'</small>
										</div> 
										<div class="right_block_rev_ksdvv">
											<p>'.$page['text'].'</p> 
										</div> 
										<div class="clr"></div>
									</div>
									';  
					
				}
				
				#Страница самой нашей работы
				elseif ($temp_data_oo01[0]== 'naschiraboty' && is_int($temp_data_oo01[1]) ) { 
					$naschiraboty_page_info = mysqli_fetch_assoc(mysqli_query($dbcnx,"SELECT * FROM content WHERE path='/naschiraboty/'"));
					echo '<div id="naviiigggg"><span><a href="/">Главная</a> &#8646; <a href="/naschiraboty/">'.$naschiraboty_page_info['name'].'</a> &#8646; '.$page['name'].'</span></div>'; 
					
					#перебираем массив с фотограф
					$temlkkdssc = explode("|", $page['images']);
					$show_imagerosod = '';
					foreach ($temlkkdssc as $image_datasd) {
						$mknnfbvooo = explode("<<<>>>", $image_datasd); 
						$show_imagerosod .= '<a   href="/system_vik/naschiraboty/original/'.$mknnfbvooo[0].'">
												<img alt="'.$mknnfbvooo[1].'" title="'.$mknnfbvooo[1].'" src="/system_vik/naschiraboty/small/'.$mknnfbvooo[0].'">
											</a>';
					} 
					#############################
					
					$page['text'] =  '<div class="naschiraboty_item_block fuul_views_iidu">
												<div class="clr"></div>
												<div class="nash_rabot_left">
													<span><i></i>'.$page['name'].'</span>
													'.$page['text'].'
													<small><b>Клиент:</b>'.$page['client_name'].'</small>
													<small><b>Категория:</b>'.$page['category'].'</small> 
												</div>
												<div class="nash_rabot_right">
													<div class="gallery-items">
														'.$show_imagerosod.'
													</div> 
												</div> 
												<div class="clr"></div>
											</div>';  
					
				}
				
				
				#Страница самого вопроса ответа
				elseif ($temp_data_oo01[0]== 'faq' && is_int($temp_data_oo01[1]) ) { 
					$faq_page_info = mysqli_fetch_assoc(mysqli_query($dbcnx,"SELECT * FROM content WHERE path='/faq/'"));
					echo '<div id="naviiigggg"><span><a href="/">Главная</a> &#8646; <a href="/faq/">'.$faq_page_info['name'].'</a> &#8646; '.$page['zagolovok'].'</span></div>'; 
					
					#Обновим счетчик просмотров
					//mysqli_query($dbcnx,"UPDATE faq SET count_views=count_views+1 WHERE id=".intval($temp_data_oo01[1]));
					
					
					$page['text'] = '<h1 id="page_news_intem_s">'.$page['zagolovok'].'</h1>
											<p class="page_faq_dkv">'.$page['text'].'</p>
												<div class="otvet_faq_page">
													<div class="clr"></div>
													<div class="left_faq_pag">Ответ специалиста</div>
													<div class="right_faq_pag">'.$page['otvet_admin'].'</div>
													<div class="clr"></div>
												</div>
											'.$show_ocenka_form_001;
					
					 
					
				}
				
				
				else {
					echo '<div id="naviiigggg"><span>';
					if ($this_mark == 1) echo '<a href="/">Главная</a> &#8646; ';
					
					function find_parents_bredcr ($this_page_parent, $bred_tmp_s, $this_mark=0) { 
						$where_table = 'content';
						if ($this_mark == 1) $where_table = 'marks';
						
						$sqll11 = mysqli_query($dbcnx,"SELECT * FROM $where_table WHERE id='{$this_page_parent}'");
						if (mysqli_num_rows($sqll11) > 0) {
							$data_parent = mysqli_fetch_assoc($sqll11);
							$bred_tmp_s = '<a href="'.$data_parent["path"].'">'.$data_parent["name"].'</a> &#8646; '.$bred_tmp_s; 
							find_parents_bredcr ($data_parent['parent'], $bred_tmp_s);
						}else { 
							echo $bred_tmp_s;
							return;
						}
					}
					find_parents_bredcr ($page['parent'], '', $this_mark);
					echo $page['name'];
					echo '</span></div>';	
				}
			}
			?> 
		
		
		<div class="content_iiidfhvdsf">
			
			<?
			
			#Подуслуги марки
			if ($this_mark == 1) {
				
				#Если это главная марки
				if ($page['parent'] == 0) {
					$sql_pod = mysqli_query($dbcnx,"SELECT * FROM marks WHERE parent={$page['id']} ORDER BY sort DESC");
				}else {
					$sql_pod = mysqli_query($dbcnx,"SELECT * FROM marks WHERE parent={$page['parent']} ORDER BY sort DESC");
				}
				
				$iiid22dsss = 1;
				while ($data_pags = mysqli_fetch_assoc($sql_pod)) {
					
					if ($page['parent'] != 0 && $page['id'] == $data_pags['id']) {
						$item_to_show = '<li><strong>'.$data_pags['name'].'</strong></li>';
					}else {
						$item_to_show = '<li><a href="'.$data_pags['path'].'">'.$data_pags['name'].'</a></li>';
					} 
					
					if (!($iiid22dsss % 3)) {#кратно 3
						$contentOO_3 = $contentOO_3.$item_to_show;
						$iiid22dsss = 0;
					}elseif (!($iiid22dsss % 2)) {#кратно 2
						$contentOO_2 = $contentOO_2.$item_to_show;
					}else {
						$contentOO_1 = $contentOO_1.$item_to_show;
					}
					$iiid22dsss++;
				}
				
				if (strlen($contentOO_1) > 5) {
					$final_dada_link_1 .= '<ul id="block_usl_model_top" class="lefttdgs">'.$contentOO_1.'</ul>';
				}
				if (strlen($contentOO_2) > 5) {
					$final_dada_link_1 .=  '<ul id="block_usl_model_top" class="centerjjf">'.$contentOO_2.'</ul>';
				}
				if (strlen($contentOO_3) > 5) {
					$final_dada_link_1 .=  '<ul id="block_usl_model_top" class="rightddf">'.$contentOO_3.'</ul>';
				}
				
				if (strlen($final_dada_link_1) > 5) {
					echo '<div class="razdelitel_model_podusl"></div>
						<div class="clr"></div>'.$final_dada_link_1.'<div class="clr"></div><div class="razdelitel_model_podusl"></div>';
				}
				
			}
			
			
			
			#Подуслуги модели
			if (count($array_datassd_links_model) > 0) { 
				
				$iiid22dsss = 1;
				
				foreach ($array_datassd_links_model as $idLinkModel => $dataItemTmp001) {
					
					
					$item_to_show = '<li>'.$dataItemTmp001.'</li>';
					
					if (!($iiid22dsss % 3)) {#кратно 3
						$contentOO_3 = $contentOO_3.$item_to_show;
						$iiid22dsss = 0;
					}elseif (!($iiid22dsss % 2)) {#кратно 2
						$contentOO_2 = $contentOO_2.$item_to_show;
					}else {
						$contentOO_1 = $contentOO_1.$item_to_show;
					}
					
					$iiid22dsss++;
					
				}
				
				
				if (strlen($contentOO_1) > 5) {
					$final_dada_link_1 = '<ul id="block_usl_model_top" class="lefttdgs">'.$contentOO_1.'</ul>';
				}
				if (strlen($contentOO_2) > 5) {
					$final_dada_link_2 = '<ul id="block_usl_model_top" class="centerjjf">'.$contentOO_2.'</ul>';
				}
				if (strlen($contentOO_3) > 5) {
					$final_dada_link_3 = '<ul id="block_usl_model_top" class="rightddf">'.$contentOO_3.'</ul>';
				}
				
				
				echo '<div class="razdelitel_model_podusl"></div>
						<div class="clr"></div>'.$final_dada_link_1.$final_dada_link_2.$final_dada_link_3.'<div class="clr"></div><div class="razdelitel_model_podusl"></div>';
				 
				
				
				
			}
			
			
			?>
			
			
			
			<!--Преимущества-->
			<div class="super_preimush_block">
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow surpris"></div>
					<p>Вы сразу будете располагать полной информацией о сроках и стоимости ремонта вашего авто. В течении всего времени обслуживания все работы и запчасти изначально согласовываются с Вами.</p>
					<div class="clr"></div>
				</div>
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow sposob_oplat"></div>
					<p>Мы делаем все для удобства наших клиентов. Принимаем к оплате наших услуг не только наличный и безналичный расчет, но и электронные валюты.</p>
					<div class="clr"></div>
				</div> 
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow nenavyaz"></div>
					<p>Наши специалисты не станут рекомендовать провести ремонт или заменить детали, которые заведомо исправные. Мы информируем клиента о том, что нужно сделать в первую очередь, а что можно отложить.</p>
					<div class="clr"></div>
				</div>
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow sklad"></div>
					<p>Огромный собственный склад кузовных деталей, тысячи наименований в наличии – гарант максимально быстрого ремонта.</p>
					<div class="clr"></div>
				</div>
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow oborudovanie"></div>
					<p>Самое современное оборудование у настоящих специалистов в нашем кузовном цеху. Мы умеем делать даже самый сложный кузовной ремонт.</p>
					<div class="clr"></div>
				</div>
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow ohrana"></div>
					<p>Будьте спокойны за сохранность вашего авто. Все автомобили наших клиентов находятся на охраняемой парковке под постоянным видеонаблюдением.</p>
					<div class="clr"></div>
				</div>
				<div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow evacuator"></div>
					<p>Эвакуируем автомобили каждый день и без выходных. В случае крупного кузовного ремонта данная услуга оказывается полностью бесплатно.</p>
					<div class="clr"></div>
				</div>
				 <div class="preimus_itemd">
					<div class="clr"></div>
					<div class="image_dow srok"></div>
					<p>Мы дорожим вашим временем. Полностью придерживаемся согласованных сроков проведения всех работ.</p>
					<div class="clr"></div>
				</div>
			</div>
			
		 
		
			<?=$page['text']; ?>
			
			<?
			#калькулятор
			if ($temp_data_oo01[0]== 'calkuliator') { 
				require_once $DOCUMENT_ROOT.'/calkuliator_zch/calculator/cal2.php';
			}
			#Новости + ВВЕРХУ
			if ($temp_data_oo01[0]== 'news') { 
				require_once $DOCUMENT_ROOT.'/core_vik/news.php';
			}
			#Отзывы + ВВЕРХУ
			if ($temp_data_oo01[0]== 'reviews') { 
				require_once $DOCUMENT_ROOT.'/core_vik/reviews.php';
			}
			#Наши работы + ВВЕРХУ
			if ($temp_data_oo01[0]== 'naschiraboty') { 
				require_once $DOCUMENT_ROOT.'/core_vik/naschiraboty.php';
			}
			#Вопрос ответ + ВВЕРХУ
			if ($temp_data_oo01[0]== 'faq') { 
				require_once $DOCUMENT_ROOT.'/core_vik/faq.php';
			}
			
			#страница акций
			if ($temp_data_oo01[0]== 'action') { 
				require_once $DOCUMENT_ROOT.'/core_vik/action_page.php';
			}
			#страница оценки по фото
			if ($temp_data_oo01[0]== 'ocenka_po_foto') { 
				require_once $DOCUMENT_ROOT.'/core_vik/ocenka_po_foto.php';
			}
			
			
			
			?>
		
		</div>
	
	</div><!--КОНЕЦ части с контентом-->
*/ ?>
    <div class="clr"></div>
	
	
	
	
	
	
	
</div><!--КОНЕЦ части контент плюс шапка-->
<?
// include 'index2.php';
?>
<?php if ($what_site_version=='mobile'): ?>
	<!--<iframe width="100%" height="2000" src="/calkuliator_zch/calculator/cal2.php" seamless></iframe>-->
	<?php include 'cal2.php'; ?>
<?php else: ?>
	<iframe width="100%" height="2000" src="/calkuliator_zch/calculator/index2.php" seamless></iframe>
<?php endif; ?>

<div class="clr"></div>



<?php
	include('../../footer.php');
?>