$(document).ready(function () {
    $('.far').on('click', function (e) {
        var disp = $('.menu').css('display');
        if (disp == 'block') {
            $('.menu').css('display', 'none');
            // console.log('nothing');
        }
        else if (disp == 'none') {
            $('.menu').css('display', 'block');
            // console.log('block');
        } 
    })
   
});


