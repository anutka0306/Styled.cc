$(document).ready(function()
{
    //Анімаціия при скроле-----------------
    $('.scroll-animate').each(function () {
    var block = $(this);
    $(window).scroll(function() {
        var top = block.offset().top;
        var bottom = block.height() + top;
        top = top - $(window).height();
        var scroll_top = $(this).scrollTop();
        if ((scroll_top > top) && (scroll_top < bottom)) {
            if (!block.hasClass('animated')) {
                block.addClass('animated');
                block.trigger('animateIn');
            }
        } else {
            block.removeClass('animated');
            block.trigger('animateOut');
        }
    });

});
        $('.sdf').removeClass('animated');
        $('.sdf').trigger('animateOut');
// $('.factWrapper .factBlock').on('animateIn', function() {
//     var inter = 0;
//     $(this).find('.anim').each(function() {
//         var block = $(this);
//         setTimeout(function() {
//             block.css('opacity', 1);
//             block.css('transform', 'scale(1.0, 1.0)');
//         }, inter * 100);
//         inter++;
//     });
// }).on('animateOut', function() {
//     $(this).find('.anim').each(function() {
//         $(this).css('opacity', 0);
//         $(this).css('transform', 'scale(1.5, 1.5)');
//     });
// });
// })

$('.d-colorWrapper .d-colorBlock').on('animateIn', function() {
    var inter = 0;
    $(this).find('.anim').each(function() {
        var block = $(this);
        setTimeout(function() {
            block.css('opacity', 1);
            block.css('transform', 'scale(1.0, 1.0)');
        }, inter * 100);
        inter++;
    });
}).on('animateOut', function() {
    $(this).find('.anim').each(function() {
        $(this).css('opacity', 0);
        $(this).css('transform', 'scale(1.5, 1.5)');
    });
});
})


$(document).ready(function()
{

});