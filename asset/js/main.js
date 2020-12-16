$(document).ready(function () {
    $('.far').on('click', function (e) {
        var disp = $('.profil').css('display');
        if (disp == 'block') {
            $('.profil').css('display', 'none');
            // console.log('nothing');
        }
        else if (disp == 'none') {
            $('.profil').css('display', 'block');
            // console.log('block');
        }
    })

    // $('.far').on('click', function (e) {
    //     var disp = $('.new').css('display');
    //     if (disp == 'block') {
    //         $('.profil').css('display', 'none');
    //         console.log('block');
    //     }
    //     else if (disp == 'none') {
    //         $('.profil').css('display', 'block');
    //         console.log('nothing');
    //     }
    // })
});


