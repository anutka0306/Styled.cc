

$("#phone").mask("+7(999) 999-99-99");
$("#calculator_phone").mask("+7(999) 999-99-99");
// $(function(){
//   $("#phone").focus();
// });

$("#phone2").mask("+7(999) 999-99-99");
// $(function(){
//   $("#phone").focus();
// });

$("#email").click(function(){
    $("#email").removeClass("error");
});

$("#vins").click(function(){
    $("#vins").removeClass("error");
});

$("#phone").click(function(){
    $("#phone").removeClass("error");
});

$("#det").click(function(){
    $("#det").removeClass("error");
});

$("#car").click(function(){
    $("#car").removeClass("error");
});

$("#year").click(function(){
    $("#year").removeClass("error");
});

$(document).ready(function() {
  $('.not-human, .triangle').hide();
  $('.verify').addClass('disabled');
  
  function human(e) {
    if ($('.checkbox-text').hasClass('robot')) {
      return;
    }
    else {
    	$('.checkbox-text').text("Да, вы не робот!").css("color", "green").addClass('human');
    	$('.checkbox').addClass('disabled');
		$('#send').removeClass('disabled');
    	$('.checkbox').click(function(e) {
      	e.preventDefault();
    	});
    }
    
    $('.not-human, .triangle').slideUp();
  }
  
  function robot(event) {
    if ($('.checkbox-text').hasClass('human')) {
      return;
    }
    else {
      $('.checkbox-text').text("ROBOT").css("color", "red").addClass('robot');
      $('.checkbox').addClass('disabled');
      $('.checkbox').click(function(event) {
        event.preventDefault();
      });
    
      $('.not-human, .triangle').slideDown();
    }
  }
  
  $('.checkbox').click(function() {
    if ($('.checkbox').is(":checked")) {
      $(document).mousemove(function() {
        window.setTimeout(function() {
          human();
        }, 250);
      });
      
      window.setTimeout(function() {
        robot();
      }, 1000);
    };
  });
  
  $('.captcha-code').keyup(function(event) {
    if ($('.captcha-code').val().length <= 0) {
      $('.verify').addClass('disabled');
    }
    else {
      $('.verify').removeClass('disabled');
    };
  });
  
  $('.verify').click(function() {
    if ($('.captcha-code').val() == "captcha code") {
      $('.checkbox-text').removeClass('robot').addClass('human');
      $('.not-human, .triangle').slideUp();
    }
  });
});

//
$(function(){  
  $('input').change(function(){
    var label = $(this).parent().find('span'); 
    if(typeof(this.files) !='undefined'){ // fucking IE      
      if(this.files.length == 0){
        label.removeClass('withFile').text(label.data('default'));
      }
      else{
        var file = this.files[0]; 
        var name = file.name;
        var size = (file.size / 1048576).toFixed(3); //size in mb 
        label.addClass('withFile').text('(' + size + 'mb) ' + name);
        if(size >= 2) {
				label.addClass('error').text('(' + size + 'mb) Файл слишком большой');
			}
			else if(size < 2){
				label.addClass('withFile').text('(' + size + 'mb) ' + 'Фото выбрано');
			}
      }
    }
    else{
      var name = this.value.split("\\");
	      label.addClass('withFile').text(name[name.length-1]);
    }
    return false;
  });  
});

