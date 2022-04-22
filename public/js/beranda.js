$(document).ready(function() {
    //prevent right click to download on images
    $("body").on("contextmenu", "img", function(e) {
        return false;
    });
    //prevent right click to download on videos
    $("body").on("contextmenu", "video", function(e) {
        return false;
    });

    $.ajax({
        type: "get",
        url: "/konten-beranda",
        dataType: "JSON",
        success: function (response) {
            $('#frame-jumbotron').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Poster Terkini</h1>\
                    <img class="img-jumbotron rounded img-fluid" src="/media/images/poster/'+ response.poster.nama_poster +'" >\
                </div>'
            );
            $('#frame-statistik-anak').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Statistik Anak Asuh</h1>\
                    <h2 class="display-8 text-success pt-4">Jenis Kelamin</h2>\
                    <div class="row justify-content-between">\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Total Anak Asuh</p>\
                            <i class="fa fa-users text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_anak +' anak</p>\
                        </div>\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Laki-Laki</p>\
                            <i class="fa fa-male text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_laki +' anak</p>\
                        </div>\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Perempuan</p>\
                            <i class="fa fa-female text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_perempuan +' anak</p>\
                        </div>\
                    </div>\
                    <h2 class="display-8 text-success pt-4">Status Asuh</h2>\
                    <div class="row justify-content-between">\
                        <div class="col-md-2 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Yatim Piatu</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_yatim_piatu +' anak</p>\
                        </div>\
                        <div class="col-md-2 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Yatim</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_yatim +' anak</p>\
                        </div>\
                        <div class="col-md-2 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Piatu</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_piatu +' anak</p>\
                        </div>\
                        <div class="col-md-2 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">Dhuafa</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_dhuafa +' anak</p>\
                        </div>\
                    </div>\
                    <h2 class="display-8 text-success pt-4">Tingkat Pendidikan</h2>\
                    <div class="row justify-content-between">\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">SD / MI</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_sd +' anak</p>\
                        </div>\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">SMP / MTs</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_smp +' anak</p>\
                        </div>\
                        <div class="col-md-3 icon-statistik text-dark text-center rounded">\
                            <p class="font-weight-bold">SMA / MA</p>\
                            <i class="fa fa-user text-success"></i>\
                            <p>'+ response.statistik_anak[0].total_sma +' anak</p>\
                        </div>\
                    </div>\
                </div>'
            );
            $('#frame-kegiatan-terbaru').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Kegiatan Terkini</h1>\
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">\
                        <div id="carousel-inner" class="carousel-inner" role="listbox">\
                        </div>\
                        <ol id="carousel-indicators" class="carousel-indicators">\
                        </ol>\
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">\
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>\
                            <span class="sr-only">Previous</span>\
                        </a>\
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">\
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>\
                            <span class="sr-only">Next</span>\
                        </a>\
                    </div>\
                </div>'
            );
            $.each(response.kegiatan_terbaru, function(key, item) {
                let tanggal_format = item.tanggal;
                const arrayTanggal = tanggal_format.split('-');
                function bulan(arrayTanggal) {
                    if(arrayTanggal[1] == '01') {return 'Januari'};
                    if(arrayTanggal[1] == '02') {return 'Februari'};
                    if(arrayTanggal[1] == '03') {return 'Maret'};
                    if(arrayTanggal[1] == '04') {return 'April'};
                    if(arrayTanggal[1] == '05') {return 'Mei'};
                    if(arrayTanggal[1] == '06') {return 'Juni'};
                    if(arrayTanggal[1] == '07') {return 'Juli'};
                    if(arrayTanggal[1] == '08') {return 'Agustus'};
                    if(arrayTanggal[1] == '09') {return 'September'};
                    if(arrayTanggal[1] == '10') {return 'Oktober'};
                    if(arrayTanggal[1] == '11') {return 'November'};
                    if(arrayTanggal[1] == '12') {return 'Desember'};
                };
                $('#carousel-indicators').append(
                    '<li data-target="#myCarousel" data-slide-to="'+ key +'"></li>'
                );
                $('#carousel-inner').append(
                    '<div class="carousel-item">\
                        <div class="row">\
                            <div class="col-md-8">\
                                <div class="container rounded carousel-info p-2">\
                                    <h2 class="pr-2">'+ item.judul +'</h2>\
                                    <p id="tanggal" class="pr-2">'+ arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0] +'</p>\
                                    <p id="uraian" class="pr-2">'+ item.uraian +'</p>\
                                    <button class="col-md-4 offset-md-8 btn btn-success tombol-dokumentasi" id="'+ item.id +'">Lihat Dokumentasi</button>\
                                </div>\
                            </div>\
                            <div class="col-md-4">\
                                <div class="carousel-image">\
                                    <img src="/media/images/activities/photos/photos/'+ item.nama_foto +'"" class="d-block w-100 rounded img-fluid">\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
                );
                if(key == 0) {
                    $('#carousel-indicators > li').addClass("active");
                    $('.carousel-item').addClass("active");
                }
            });
        }
    });

    $(document).on('click', '.tombol-dokumentasi', function() {
        var id_dokumentasi = $(this).attr('id');

        $.ajax({
            type     : "GET",
            url      : "/konten-dokumentasi/"+id_dokumentasi,
            dataType : "JSON",
            success  : function(response) {
                $('.modal-title').html(response.dokumentasi[0].judul);
                $.each(response.dokumentasi, function(key, item) {
                    $('#carousel-indicators-modal-dokumentasi').append(
                        '<li data-target="#carousel-dokumentasi" data-slide-to="'+ key +'"></li>'
                    );
                    $('#carousel-inner-modal-dokumentasi').append(
                        '<div id="carousel-item-modal-dokumentasi" class="carousel-item">\
                            <img src="/media/images/activities/photos/photos/'+ item.nama_foto +'" alt="'+ item.keterangan +'" class="d-block w-100" height="450">\
                            <div class="carousel-caption caption-background">\
                                <p class="rounded">'+ item.keterangan +'</p>\
                            </div>\
                        </div>'
                    );
                    if(key == 0) {
                        $('#carousel-indicators-modal-dokumentasi > li').addClass("active");
                        $('#carousel-item-modal-dokumentasi').addClass("active");
                    }
                });
                $('#modal-dokumentasi').modal('show');
            }
        });
    });

    $('#modal-dokumentasi').on('click', '.close', function() {
        $('#carousel-indicators-modal-dokumentasi').html('');
        $('#carousel-inner-modal-dokumentasi').html('');
        $('#carousel-indicators-modal-dokumentasi > li').removeClass("active");
        $('#carousel-item-modal-dokumentasi').removeClass("active");
    });

});