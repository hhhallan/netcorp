$(document).ready(function () {
    // TRAMES ==========================================================================
    console.log('ready');
    $.ajax({
        type: 'POST',
        url: 'ajax/clean.php',
        success: function () {
            console.log('success, table clear');
        },
        error: function () {
            console.log('error');
        }
    });
    var url = 'https://floriandoyen.fr/resources/frames.php';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                var identification = data[i].identification;
                var date = data[i].date;
                var version = data[i].version;
                var nomPro = data[i].protocol.name;
                var proCheck = data[i].protocol.checksum.status;
                var headCheck = data[i].headerChecksum;
                var portFrom = data[i].protocol.ports.from;
                var portDest = data[i].protocol.ports.dest;
                var flags = data[i].flags.code;
                var ipFrom = data[i].ip.from;
                var ipDest = data[i].ip.dest;
                var ttl = data[i].ttl;
                if (typeof data[i].status !== 'undefined') {
                    var status = data[i].status;
                } else {
                    var status = 'success';
                }
                date = convertDate(date);
                $.ajax({
                    type: 'POST',
                    url: 'ajax/ipconv.php',
                    dataType: 'json',
                    data: {
                        ipFrom: ipFrom,
                        ipDest: ipDest
                    },
                    success: function (response) {
                        ipFrom = response.ipFrom;
                        ipDest = response.ipDest;
                    },
                })
                /* Check for doublons before adding /!\ not working currently */
                /*$.ajax({
                    type: 'POST',
                    url: 'ajax/select.php',
                    data: {
                        identification: identification,
                        date: date,
                        version: version,
                        nomPro: nomPro,
                        flags: flags,
                        proCheck: proCheck,
                        headCheck: headCheck,
                        portFrom: portFrom,
                        portDest: portDest,
                        ipFrom: ipFrom,
                        ipDest: ipDest,
                        status: status
                    },
                    success: function(back){
                        if(back.trame == false){
                            console.log('sending...');
                            exist = 'true';
                        } else {
                            console.log('trame déjà existante')
                            exist = 'false';
                        }
                    },
                    error: function(){
                        console.log('error');
                    }
                    })*/
                $.ajax({
                    type: 'POST',
                    url: 'ajax/insert.php',
                    data: {
                        identification: identification,
                        date: date,
                        version: version,
                        nomPro: nomPro,
                        flags: flags,
                        proCheck: proCheck,
                        headCheck: headCheck,
                        portFrom: portFrom,
                        portDest: portDest,
                        ipFrom: ipFrom,
                        ipDest: ipDest,
                        status: status,
                        ttl: ttl,
                    },
                    success: function () {
                        console.log('nice');
                    },
                    error: function () {
                        console.log('Something went wrong');
                    }
                })
            }

        },
        error: function () {
            console.log('error');
        }

    })

    // Boutton Modal HOMEPAGE =========================================================
    //onclick BOUTTON INSCRIPTION
    $('.mod-title-inscription').on('click', function (e) {
        e.preventDefault()

        $('#form-connexion').css('display', 'none')
        $('#form-inscription').css('display', 'block')
    })
    //onclick BOUTTON CONNEXION
    $('#mod-title-connexion').on('click', function (e) {
        e.preventDefault()

        $('#form-connexion').css('display', 'block')
        $('#form-inscription').css('display', 'none')
    })

    // SWITCH FORGOT PASSWORD ==============================================================
    // $('#forgot-btn').on('click',function (e) {
    //     e.preventDefault()

    //     $('#forgot-password').css('display', 'block')
    //     $('.homepage').css('display', 'none')
    // })


    // INSCRIPTION AJAX ====================================================================
    $('#form-inscription').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.error').html('')

        let formin = $('#form-inscription')

        $.ajax({
            method: 'POST',
            url: formin.attr('action'),
            data: formin.serialize(),
            dataType: 'json',
            beforeSend: function () {
                // console.log('avant')
                $('#submitted-in').css('display', 'none')
            },
            success: function (response) {
                //console.log(response)
                $('#submitted-in').css('display', 'inline')

                if (response.success == true) {
                    $('#form-inscription').find('input[type=text],input[type=email],input[type=password]').val('')
                    window.location.replace('index.php')


                } else {
                    console.log('not gg')

                    if (response.errors.prenom != null) {

                        // A VOTER CAR PAS FORCEMMENT BEAU
                        $('#error-prenom').html(response.errors.prenom)
                        //$('#prenom').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-prenom').html('') }

                    if (response.errors.nom != null) {
                        $('#error-nom').html(response.errors.nom)
                        // $('#nom').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-nom').html('') }

                    if (response.errors.email != null) {
                        $('#error-email-in').html(response.errors.email)
                        // $('#in-email').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-email-in').html('') }

                    if (response.errors.password != null) {
                        $('#error-password-in').html(response.errors.password)
                        // $('#in-password').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-password-in').html('') }

                    if (response.errors.cpassword != null) {
                        $('#error-cpassword-in').html(response.errors.cpassword)
                        //  $('#in-confirm-password').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-cpassword-in').html('') }

                }
            }
        })
    })

    // CONNEXION AJAX ====================================================================
    $('#form-connexion').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.error').html('')

        let formco = $('#form-connexion')

        $.ajax({
            method: 'POST',
            url: formco.attr('action'),
            data: formco.serialize(),
            dataType: 'json',
            beforeSend: function () {
                console.log('avant')
                $('#submitted-co').css('display', 'none')
            },
            success: function (response) {
                console.log(response)
                $('#submitted-co').css('display', 'inline')

                if (response.success == true) {
                    $('#form-connexion').find('input[type=email],input[type=password]').val('')
                    window.location.replace('index.php')

                } else {
                    console.log('not gg')

                    if (response.errors.connexion != null) {
                        $('#error-connexion').html(response.errors.connexion)
                        // $('.form-co-errors').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-connexion').html('') }

                }
            }
        })
    })

    // FOROGT PASS AJAX
    // $('#form-forgot').submit(function (e) {
    //     console.log('soumis')
    //     e.preventDefault()
    //     $('.errors').html('')

    //     let forgot = $('#form-forgot')

    //     $.ajax({
    //         method: 'POST',
    //         url: forgot.attr('action'),
    //         data: forgot.serialize(),
    //         dataType: 'json',
    //         success: function (response) {

    //             if(response.success == true) {
    //                 console.log('gg')
    //                 $('#form-forgot').find('input[type=email]').val('')
    //             } else {
    //                 console.log('not gg')

    //                 if (response.errors.connexion != null) {
    //                     $('#error-forgot-email').html(response.errors.email)
    //                    // $('.form-co-errors').css('box-shadow','0px 0px 5px 1px #FF0000')
    //                 } else { $('#error-forgot-email').html('') }
    //             }

    //         }
    //     })
    // })

    // RESET PASS AJAX


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

function convertDate(time) {
    var t = new Date(time * 1000);
    var day = t.getDate();
    var month = t.getMonth();
    var year = t.getFullYear();
    var h = t.getHours();
    var m = t.getMinutes();
    var s = t.getSeconds();
    date = year + '-' + month + '-' + day + ' ' + h + ':' + m + ':' + s;
    return date;
}
