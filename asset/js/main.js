$(document).ready(function () {
    $('.far').click(function () {
        $('.menu').animate({
            height: 'toggle'
        });
    
        $('.far').on('click', function (e) {
            var disp = $('.menu').css('display');
            if (disp == 'block') {
                $('.menu').css('display', 'none');
                // console.log('nothing');
            }
            else if (disp == 'none') {
                $('.menu').css('display', 'block');
                $('.far').find('.menu').show(400)
                // console.log('block');
            }
        });
    });

});



