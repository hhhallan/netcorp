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
                    /*var frame = [
                        date = [data[i].date],
                        version = data[i].version,
                        ttl = data[i].ttl,
                        nomPro = data[i].protocol.name,
                        status = data[i].protocol.checksum.status,
                        id = data[i].identification,
                        ipFrom = data[i].ip.from,
                        ipDest = data[i].ip.dest
                    ]*/
                    console.log(data[i].date);
                    var date = data[i].date;
                    var version = data[i].version;
                    var nomPro = data[i].protocol.name;
                    var ipFrom = data[i].ip.from;
                    var ipDest = data[i].ip.dest;
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/insert.php',
                        data: {
                            date : date,
                            version : version,
                            nomPro : nomPro,
                            ipFrom : ipFrom,
                            ipDest : ipDest
                        },
                        success: function (e) {
                            console.log(e);
                        },
                        error: function () {
                            console.log('Something went wrong');
                        }
                    })
                    //console.log(frame);
                }
            },
            error: function () {
                console.log('error');
            }

        })

    })
})






