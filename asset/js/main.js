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




    // INSCRIPTION AJAX ====================================================================
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
                        $('#error-prenom').html(response.errors.prenom)
                    } else { $('#error-prenom').html('') }

                    if (response.errors.nom != null) {
                        $('#error-nom').html(response.errors.nom)
                    } else { $('#error-nom').html('') }

                    if (response.errors.email != null) {
                        $('#error-email-in').html(response.errors.email)
                    } else { $('#error-email-in').html('') }

                    if (response.errors.password != null) {
                        $('#error-password-in').html(response.errors.password)
                    } else { $('#error-password-in').html('') }

                    if (response.errors.cpassword != null) {
                        $('#error-cpassword-in').html(response.errors.cpassword)
                    } else { $('#error-cpassword-in').html('') }

                }
            }
        })
    })

    // CONNEXION AJAX ====================================================================
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
                //$('#submitted-in').css('display', 'none')
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
                    } else { $('#error-connexion').html('') }

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
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Nombre de TTL perdues au total'
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
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Nombre de trames/j'
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
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Nombre de trames par type de requête'
            }
        }
    });
    var ctx = document.getElementById('requestFail').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgb(255, 12, 54)',
                backgroundColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            title: {
                display: true,
                text: 'Nombre de requêtes en échec'
            }
        }
    });
    
    


    //CHARTS onclick

})
