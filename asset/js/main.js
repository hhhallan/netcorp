$(document).ready(function () {
    console.log('ready');
    $('#btn').on('click', function (e) {
        e.preventDefault();
        console.log('inside');
        var url = 'https://floriandoyen.fr/resources/frames.php';
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                for (let i = 0; i < data.length; i++) {
                    console.log(data[i].identification);
                    var identification = data[i].identification;
                    var date = data[i].date;
                    var version = data[i].version;
                    var nomPro = data[i].protocol.name;
                    var proCheck = data[i].protocol.checksum.status;
                    var headCheck = data[i].headerChecksum;
                    var portFrom = data[i].protocol.ports.from;
                    var portDest = data[i].protocol.ports.dest;
                    var flags = data[i].protocol.flags.code;
                    var ipFrom = data[i].ip.from;
                    var ipDest = data[i].ip.dest;
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
                            console.log(identification);
                        },
                        error: function (e) {
                            console.log(e);
                        }

                    })
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
                            ipDest: ipDest
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

    })
})

function convertDate(time) {
    var t = new Date(time * 1000);
    var day = t.getDate();
    var month = t.getMonth();
    var year = t.getFullYear();
    date = year + '-' + month + '-' + day;
    return date;
}




