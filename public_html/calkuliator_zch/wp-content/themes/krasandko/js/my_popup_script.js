var work=0;
var side=0;
var type=0;
var works=['Пол салона', 'Стекло ветровое', 'Панель крыши', 'Пол багажника','Арка внутренняя','Стекло заднее','Арка наружная','Крышка багажника','Панель задняя','Бампер задний','Фонарь задний','Лонжерон задний','Крыло заднее','Ручка зад. двери','Дверь задняя','Молдинг зад. двери','Ручка пер. двери','Дверь передняя','Молдинг пер. двери','Зеркало наружное','Молдинг крыла','Крыло переднее','Порог дверей','Стойка центральная','Лонжерон передний','Бампер передний','Блок-фара','Решетка радиатора','Панель передняя','Капот передка','Брызковик передний','Стойка передняя'];
var sides=['Сторона','Слева', 'Справа'];
var types=['Замена без окраски', 'Замена с окраской', 'Лёгкий ремонт с окраской' ,'Сложный ремонт с окраской' ,'Окраска без ремонта']
var no_sides=[1,2,3,4,6,8,9,10,26,28,29,30]
//массив, в котором записано, производится ли j тая по i той детали
var rabota_po_detali=[];
rabota_po_detali[1]=[0,0,1,1,0];
rabota_po_detali[2]=[1,0,0,0,0];
rabota_po_detali[3]=[0,1,1,1,1];
rabota_po_detali[4]=[0,1,1,1,1];
rabota_po_detali[5]=[0,0,1,1,1];
rabota_po_detali[6]=[1,0,0,0,0];
rabota_po_detali[7]=[0,0,1,1,1];
rabota_po_detali[8]=[0,1,1,1,1];
rabota_po_detali[9]=[0,1,1,1,1];
rabota_po_detali[10]=[1,1,1,1,1];
rabota_po_detali[11]=[1,0,0,0,0];
rabota_po_detali[12]=[0,0,1,1,1];
rabota_po_detali[13]=[0,1,1,1,1];
rabota_po_detali[14]=[1,1,0,0,1];
rabota_po_detali[15]=[0,1,1,1,1];
rabota_po_detali[16]=[1,1,0,0,1];
rabota_po_detali[17]=[1,1,0,0,1];
rabota_po_detali[18]=[0,1,1,1,1];
rabota_po_detali[19]=[1,1,0,0,1];
rabota_po_detali[20]=[1,1,0,0,1];
rabota_po_detali[21]=[1,1,0,0,1];
rabota_po_detali[22]=[0,1,1,1,1];
rabota_po_detali[23]=[0,1,1,1,1];
rabota_po_detali[24]=[0,1,1,1,1];
rabota_po_detali[25]=[0,0,1,1,1];
rabota_po_detali[26]=[1,1,1,1,1];
rabota_po_detali[27]=[1,0,0,0,0];
rabota_po_detali[28]=[1,1,1,1,1];
rabota_po_detali[29]=[1,1,1,1,1];
rabota_po_detali[30]=[0,1,1,1,1];
rabota_po_detali[31]=[0,1,1,1,1];
rabota_po_detali[32]=[0,1,1,1,1];
//массив закончился 
el=
{
	w:0,
	s:0,
	t:0,
	p:0,
}
var intable=[];
function avv()
{	
	
}

function work_selected(k)
{
	work=k
}
function check_selected(k)
{
	type=k;
}
function side_selected(k)
{
	side=k;
}
function not_dublicate()
{

};

;
function good_sent_message()
{
  document.location.href = "/allright"
}
function delete_field(k)
{
	var a=document.getElementById('tr'+k);
	a.parentNode.removeChild(a);
	k--;
	sum=sum-intable[k].p;
	update_sum(sum);
	delete intable[k];
}
var count=1
var sum=0;
function update_sum(sum)
{
	var a=document.getElementById('itog');
	a.parentNode.removeChild(a);
	$('#bitog').append('<p id="itog">'+(sum)+' руб.</p>');
}
function without_sides(val)
{
	for(var i=0;i<no_sides.length;i++)
	{
		if(val==no_sides[i])
			return (true);
	}
	return(false);
}
function add_to_table()
{
	
	if(work==0||type==0||side==0&&(!without_sides(work)))
		{
			alert("Выбраны не все обязательные параметры")
			return 0;
		}
	if(already_in_table(work,side))
	{
		side=work=type=0;
		alert("Такая деталь уже есть в списке!");
		$(document.elementFromPoint(0, 0)).click();
		return 0;
	}
	work=work-1;
	var sel=make_work_select(type-1);
	var sside=make_side_select(side);
	$('#price_table').append(
	'<tr id="tr'+count+'"><td>'+count+'</td><td>'+works[work]+'</td><td>'+sides[side]+'</td><td>'+types[(type-1)]+'</td><td id="tablerow'+count+'"><a id="a'+count+'">'+ costs[type][work]+' руб.</a></td><td style="text-align:center;"><a onclick=" delete_field('+count+++')"  class="del"></a></td></tr><input name="'+count+'" type="hidden" value="'+works[work]+', '+sides[side]+', '+types[(type-1)]+', '+costs[type][work]+' руб." />'
	)/*сайдес+sside*//*тайпс+sel*/
	intable.push({w:work, s:side, t:type,p:costs[type][work]});
	$(document.elementFromPoint(0, 0)).click();
	sum*=1;
	sum+=costs[type][work]*=1;
	side=work=type=0;
	update_sum(sum)
}

/*function send_button()
{
	var name=$("#calculator_contactName").val();
	var email=$("#calculator_email").val();
	var phone=$("#calculator_phone").val();
	var pr=$("#author").val();
	var captcha=$("#capval").val()

	var msg="";
	msg=make_mail(msg);
	send_email(name, email, phone, pr, captcha, msg);


}*/

function make_mail(msg)
{
	msg="";
	for(var i=0;i<intable.length;i++)
	{
		if(intable[i])
		{
			var work=works[intable[i].w];
			var side=""
			if(intable[i].s>0)
			{
				side=sides[intable[i].s];
			} 
			var type=types[intable[i].t-1];
			var price=intable[i].p;
			msg+= work+' '+side+' '+type+' '+price+' руб \n';
		}
	}
	msg+='Общая сумма='+sum+' руб';
	return(msg);
}
function send_email(name, email, phone, pr, captcha, msg)
{
	$.post("/wp-content/themes/krasandko/options.php", {fio:name, email:email, phone:phone, pr:pr, captcha:captcha, msg: msg},
  function(data){
	  if(data.indexOf("good") > -1) 
	  {
		
    		good_sent_message();
          console.log(window)
    }
    else alert(data);
  });
}

function make_work_select(type)
{
var sel='<select size="1" id="sel'+count+'"onchange="type_in_table_changed('+count+')">';
for(var i=0;i<types.length;i++)
{
	if(rabota_po_detali[work+1][i]==1)
	{
	if(i==type)
		sel+='<option selected="selected" value="'+i+'">'+types[i]+'</option>';
	else
		sel+='<option value="'+i+'">'+types[i]+'</option>';
	}
}
sel+='</select>';
return (sel);
}

function make_side_select(side)
{
	var sel;
	if(without_sides(work+1))
	{
		sel='<p>Без стороны</p>';
		return(sel);
	}

sel='<select size="1" id="sidesel'+count+'" onchange="side_in_table_changed('+count+')">';
for(var i=1;i<sides.length;i++)
{
	if(i==side)
		sel+='<option selected="selected" value="'+i+'">'+sides[i]+'</option>';
	else
		sel+='<option value="'+i+'">'+sides[i]+'</option>';
}
sel+='</select>';
return (sel);
}

function side_in_table_changed(num)
{
	var id='#sidesel'+num;
	intable[num-1].s=$(id).val();
}

function type_in_table_changed(num)
{
	var id='#sel'+num;
	sum-=intable[num-1].p;
	nwetype=$(id).val();
	nwetype++;
	intable[num-1].t=nwetype
	intable[num-1].p=costs[nwetype][intable[num-1].w];
	var selector='a'+num;
	var a=document.getElementById(selector);
	a.parentNode.removeChild(a);
	$('#tablerow'+num).append('<p id="a'+num+'">'+intable[num-1].p+' руб.</p>');	
	sum+=intable[num-1].p*1;
	update_sum(sum);
    num=0;

}

function already_in_table(id, side)
{
	for (var i=0;i<intable.length;i++)
	{
		if(intable[i])
		{
			if(intable[i].w==id-1&&intable[i].s==side)
				return (true);
		}
	}
	return(false);
}