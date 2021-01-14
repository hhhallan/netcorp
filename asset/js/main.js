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

    $('.flexslider').flexslider({
        slideshowSpeed: 60000,
        animation: "slide",
        animationLoop: true,
        itemWidth: 100,
        itemMargin: 0,
        controlNav: false,
        itemMargin: 150,
        // pausePlay: true,
        prevText: " ",
        nextText: " ",
        directionNav: true,
        maxItems: 2
    });

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


                } else {
                    //console('not gg')

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
                //console('avant')
                $('#submitted-co').css('display', 'none')
            },
            success: function (response) {
                //console(response)
                $('#submitted-co').css('display', 'inline')

                if (response.success == true) {
                    $('#form-connexion').find('input[type=email],input[type=password]').val('')
                    window.location.replace('index.php')

                } else {
                    //console('not gg')

                    if (response.errors.connexion != null) {
                        $('#error-connexion').html(response.errors.connexion)
                        // $('.form-co-errors').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-connexion').html('') }

                }
            }
        })
    })

    // FOROGT PASS AJAX =========================================================================
    $('#form-forgot').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.error').html('')

        let forgot = $('#form-forgot')

        $.ajax({
            method: 'POST',
            url: forgot.attr('action'),
            data: forgot.serialize(),
            dataType: 'json',
            beforeSend: function () {
                //console.log('avant')
                $('#submitted-mdp').css('display', 'none')
            },
            success: function (response) {
                //console.log(response)
                $('#submitted-mdp').css('display', 'inline')

                if (response.success == true) {
                    //console.log('gg')
                    $('#form-forgot').find('input[type=email]').val('')

                    // Redirection reset
                    window.location = 'resetmdp.php?email=' + response.emailUser + '&token=' + response.token

                } else {
                    //console.log('not gg')

                    if (response.errors.email != null) {
                        $('#error-forgot-email').html(response.errors.email)
                        // $('.form-co-errors').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-forgot-email').html('') }
                }

            }
        })
    })

    // RESET PASS AJAX ==========================================================================
    $('#form-reset').submit(function (e) {
        //console.log('soumis')
        e.preventDefault()
        $('.error').html('')

        let reset = $('#form-reset')

        $.ajax({
            method: 'POST',
            url: reset.attr('action'),
            data: reset.serialize(),
            dataType: 'json',
            beforeSend: function () {
                //console.log('avant')
                $('#submitted-reset').css('display', 'none')

            },
            success: function (response) {
                //console.log(response)
                $('#submitted-reset').css('display', 'inline')

                if (response.success == true) {
                    //console.log('gg')
                    $('#form-forgot').find('input[type=email]').val('')

                    // Redirection reset
                    window.location = 'index.php'

                } else {
                    //console.log('not gg')

                    if (response.errors.password != null) {
                        $('#error-reset-pass').html(response.errors.password)
                        // $('#in-password').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-reset-pass').html('') }

                    if (response.errors.cpassword != null) {
                        $('#error-reset-cpass').html(response.errors.cpassword)
                        //  $('#in-confirm-password').css('box-shadow','0px 0px 5px 1px #FF0000')
                    } else { $('#error-reset-cpass').html('') }
                }
            }
        })

    })




    // DASHBOARD ===================================================================================
    //CLICK => LOG
    $('#btn-log').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#dfdfdf')
        $('#btn-chart').css('background-color', '#ececec')
        $('#container-log').css('display', 'block')
        $('#container-chart').css('display', 'none')
    })
    $('#btn-chart').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#ececec')
        $('#btn-chart').css('background-color', '#dfdfdf')
        $('#container-chart').css('display', 'block')
        $('#container-log').css('display', 'none')
    })




    //CHARTS
    var ctx = document.getElementById('ttlLost').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{ 
                label: 'Nombre de TTL perdues au total',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 1,6,34,2,37]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'TTL'
            }
        }
    });
    var ctx = document.getElementById('tramDay').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'Nombre de trames',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'TRAMES'
            }
        }
    });

    

    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    var ctx = document.getElementById('tramType').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'Nombre de trames par type de requête',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'TRAMES/REQUETE'
            }
        }
    });


    

    // REQUETE SUCCESS/ECHEC ==================================
    
    $.ajax({
        method: 'POST',
        url: 'charts/requestfail.php',
        data: {
            status: 'success'
        },

        success: function(response){
            console.log(response)
           // console.log(response.nbsuccess)
           // console.log(response.nball)
        }
    })


    var ctx = document.getElementById('requestFail').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Echec', 'Réussite'],
            datasets: [{
                backgroundColor: [
                'rgb(228, 39, 39)',
                'rgb(64, 184, 26)'],
                // borderColor: [
                // '#E42727',
                // '#40B81A'],
                data: [60,40]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Requete'
            }
        }
    });
    

    //CHARTS onclick

})

// TRAMES ==========================================================================
    console.log('ready');
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
                        status: status
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
   

//     function myFunction() {
//     var x = document.getElementsByClass(".menu");
//     if (x.className === ".menu") {
//         x.className += " responsive";
//     } else {
//         x.className = ".menu";
//     }
// }
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


