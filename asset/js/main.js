$(document).ready(function () {
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
