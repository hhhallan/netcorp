$(document).ready(function () {
    // DASHBOARD ===================================================================================
    //CLICK => LOG
    $('#btn-log').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#dfdfdf')
        $('#btn-chart').css('background-color', '#ececec')
        $('#container-log').css('display', 'block')
        $('#container-chart').css('display', 'none')
        $('.color-status').css('display', 'block')
    })
    $('#btn-chart').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#ececec')
        $('#btn-chart').css('background-color', '#dfdfdf')
        $('#container-chart').css('display', 'block')
        $('#container-log').css('display', 'none')
        $('.color-status').css('display', 'none')
    })




    //CHARTS
    var ctx = document.getElementById('ttlLost').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'ajax/ttl.php',
        dataType: 'JSON',
        data: { },
        success: function (data) {
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: [data.dates.jOne, data.dates.jTwo, data.dates.jThree],
                    datasets: [{
                        label: 'Nombre de TTL perdues au total',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: [data.ttlLost.loseOne, data.ttlLost.loseTwo, data.ttlLost.loseThree]
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
        },
        error: function (xhr, textStatus, thrownError) {
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })


    $.ajax({
        type: 'POST',
        url: 'ajax/request.php',
        dataType: 'JSON',
        data: {

        },
        success: function (response) {
            var ctx = document.getElementById('tramDay').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: [response.times.jourOne, response.times.jourTwo, response.times.jourThree],
                    datasets: [{
                        label: 'Nombre de trames',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: [response.nbRequest.nbOne, response.nbRequest.nbTwo, response.nbRequest.nbThree]
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'TRAMES/JOUR'
                    }
                }
            });
        },
        error: function (xhr, textStatus, thrownError) {
            console.log('error');
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })



    $.ajax({
        type: 'POST',
        url: 'ajax/tramePro.php',
        dataType: 'JSON',
        data: {
        },
        success: function (data) {
            var ctx = document.getElementById('myChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['ICMP', 'TLSv1.2', 'UDP', 'TCP', 'Autre'],
                    datasets: [{
                        label: '# of Vote',
                        data: [data.icmp, data.tls, data.udp, data.tcp, data.other],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'TRAMES/REQUETE'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function (xhr, textStatus, thrownError) {
            console.log('error');
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })


    $.ajax({
        type: 'POST',
        url: 'ajax/tramePro.php',
        dataType: 'JSON',
        data: {
        },
        success: function (data) {
            var ctx = document.getElementById('tramType').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: ['ICMP', 'TLSv1.2', 'UDP', 'TCP', 'Autre'],
                    datasets: [{
                        label: 'Nombre de trames par type de requête',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: [data.icmp, data.tls, data.udp, data.tcp, data.other]
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
        },
        error: function (xhr, textStatus, thrownError) {
            console.log('error');
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })




    // REQUETE SUCCESS/ECHEC ==================================

    $.ajax({
        type: 'POST',
        url: 'ajax/timeout.php',
        dataType: 'JSON',
        data: {
            statu: 'timeout'
        },
        success: function (response) {
            var nbAll = response.nbAll.nb;
            var nbTimeout = response.nbTimeout.nb;
            var nbSuccess = nbAll - nbTimeout;

            var ctx = document.getElementById('requestFail').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',

                // The data for our dataset
                data: {
                    labels: ['Echec', 'Réussite'],
                    datasets: [{
                        backgroundColor: [
                            '#ED4337',
                            '#4BB543'],
                        // borderColor: [
                        // '#E42727',   
                        // '#40B81A'],
                        data: [nbTimeout, nbSuccess]
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

        },
        error: function (xhr, textStatus, thrownError) {
            console.log('error');
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })



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

})
