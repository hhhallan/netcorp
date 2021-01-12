$(document).ready(function () {

    // Boutton Modal HEADER =======================================

    // Boutton Modal HOMEPAGE ======================================
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




    // INSCRIPTION AJAX
    $('#form-inscription').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.errors').html('')

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

    // CONNEXION AJAX
    $('#form-connexion').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.errors').html('')

        let formco = $('#form-connexion')

        $.ajax({
            method: 'POST',
            url: formco.attr('action'),
            data: formco.serialize(),
            dataType: 'json',
            beforeSend: function () {
                console.log('avant')
                $('#submitted-in').css('display', 'none')
            },
            success: function (response) {
                console.log(response)
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
    $('#form-forgot').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.errors').html('')

        let forgot = $('#form-forgot')

        $.ajax({
            method: 'POST',
            url: forgot.attr('action'),
            data: forgot.serialize(),
            dataType: 'json',
            beforeSend: function () {
                console.log('avant')
                $('#submitted-mdp').css('display', 'none')
            },
            success: function (response) {
                console.log(response)
                }
        })
    })

    // RESET PASS AJAX
})
