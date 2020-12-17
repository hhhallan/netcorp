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

// $('button').on('click', function () {
//     $('#login').replaceWith('<span>Logged In</span>');
// });


// $('#submit').on('click', function () {
//     $('#login').replaceWith('<span>Logged In</span>');
// });

// $('#submit').on('click', function (e) {
//     e.preventDefault();
//     $('#login').replaceWith('<span>Logged In</span>');
// });