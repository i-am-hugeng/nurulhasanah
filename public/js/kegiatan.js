

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
        url: "/konten-kegiatan",
        dataType: "JSON",
        success: function (response) {
            /******************************* APPEND KEGIATAN YAYASAN **********************************************/
            $('#frame-kegiatan').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Kegiatan Yayasan</h1>\
                    <div id="jumbotron-kegiatan" class="row"></div>\
                    <div id="frame-button-muat-lebih" class="container-fluid">\
                        <div class="row justify-content-center">\
                            <button type="button" id="" class="col-md-3 btn btn-dark tombol-muat-lebih">Muat Lebih</button>\
                        </div>\
                    </div>\
                </div>'
            );
            $.each(response.kegiatan, function (key, item) {
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
                $('#jumbotron-kegiatan').append(
                    '<div class="col-md-3 d-flex mb-3">\
                        <div class="card flex-custom">\
                            <img class="card-img-top" src="/media/images/activities/photos/thumbnails/'+item.thumbnail+'">\
                            <div class="card-body">\
                                <h4 class="font-weight-bold">'+item.judul+'</h4>\
                                <p class="pb-4" style="font-style: oblique;">'+ arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0] +'</p>\
                                <button type="button" id="'+ item.id +'" class="btn-anak btn-success">Detail</button>\
                            </div>\
                        </div>\
                    </div>'
                );
                $('.tombol-muat-lebih').attr('id','');
                $('.tombol-muat-lebih').attr('id',item.id);
            });
            if((response.kegiatan).length < 4) {
                $('#frame-button-muat-lebih').html('');
            }

            /******************************* APPEND GALERI VIDEO **********************************************/
            $('#frame-galeri-video').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Galeri Video</h1>\
                    <div id="jumbotron-galeri" class="row"></div>\
                    <div id="frame-button-muat-video-lebih" class="container-fluid">\
                        <div class="row justify-content-center">\
                            <button type="button" id="" class="col-md-3 btn btn-dark tombol-muat-video-lebih">Muat Lebih</button>\
                        </div>\
                    </div>\
                </div>'
            );
            $.each(response.video, function (key, item) {
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
                $('#jumbotron-galeri').append(
                    '<div class="col-md-6 d-flex mb-3">\
                        <div class="card flex-custom">\
                            <video class="video" controlsList="nodownload" controls>\
                                <source src="/media/images/activities/videos/'+ item.nama_video +'" type="video/mp4">\
                            </video>\
                            <div class="card-body">\
                                <h4 class="font-weight-bold">'+item.judul+'</h4>\
                                <h5>'+item.keterangan+'</h5>\
                                <p style="font-style: oblique;">'+ arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0] +'</p>\
                            </div>\
                        </div>\
                    </div>'
                );
                $('.tombol-muat-video-lebih').attr('id','');
                $('.tombol-muat-video-lebih').attr('id',item.id);
            });
            if((response.video).length < 2) {
                $('#frame-button-muat-video-lebih').html('');
            }
        }
    });

    $(document).on('click', '.tombol-muat-lebih', function() {
        var muat_id = $('.tombol-muat-lebih').attr('id');

        $('.tombol-muat-lebih').html('<i class="spinner-border spinner-border-sm text-light" role="status"></i> Memuat...');
        $('.tombol-muat-lebih').attr('disabled', true);

        $.ajax({
            type: "get",
            url: "/muat-lebih/"+muat_id,
            dataType: "JSON",
            success: function (response) {
                $.each(response.muat_lebih, function (key, item) {
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
                    $('#jumbotron-kegiatan').append(
                        '<div class="col-md-3 d-flex mb-3">\
                            <div class="card flex-custom">\
                                <img class="card-img-top" src="/media/images/activities/photos/thumbnails/'+item.thumbnail+'">\
                                <div class="card-body">\
                                    <h4 class="font-weight-bold">'+item.judul+'</h4>\
                                    <p class="pb-4" style="font-style: oblique;">'+ arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0] +'</p>\
                                    <button type="button" id="'+ item.id +'" class="btn-anak btn-success">Detail</button>\
                                </div>\
                            </div>\
                        </div>'
                    );
                    $('.tombol-muat-lebih').attr('id','');
                    $('.tombol-muat-lebih').attr('id',item.id);
                });
                if((response.muat_lebih).length < 4) {
                    $('#frame-button-muat-lebih').html('');
                }
                else {
                    $('.tombol-muat-lebih').html('Muat Lebih');
                    $('.tombol-muat-lebih').attr('disabled', false);
                }
            }
        });
    });

    $(document).on('click', '.tombol-muat-video-lebih', function() {
        var muat_video_id = $('.tombol-muat-video-lebih').attr('id');

        $('.tombol-muat-video-lebih').html('<i class="spinner-border spinner-border-sm text-light" role="status"></i> Memuat...');
        $('.tombol-muat-video-lebih').attr('disabled', true);

        $.ajax({
            type: "get",
            url: "/muat-lebih/"+muat_video_id,
            dataType: "JSON",
            success: function (response) {
                // if() {
                    
                // }
                $.each(response.muat_video_lebih, function (key, item) {
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
                    $('#jumbotron-galeri').append(
                        '<div class="col-md-6 d-flex mb-3">\
                            <div class="card flex-custom">\
                                <video class="video" controlsList="nodownload" controls>\
                                    <source src="/media/images/activities/videos/'+ item.nama_video +'" type="video/mp4">\
                                </video>\
                                <div class="card-body">\
                                    <h4 class="font-weight-bold">'+item.judul+'</h4>\
                                <h5>'+item.keterangan+'</h5>\
                                    <p style="font-style: oblique;">'+ arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0] +'</p>\
                                </div>\
                            </div>\
                        </div>'
                    );
                    $('.tombol-muat-video-lebih').attr('id','');
                    $('.tombol-muat-video-lebih').attr('id',item.id);
                });
                if((response.muat_video_lebih).length < 2) {
                    $('#frame-button-muat-video-lebih').html('');
                }
                else {
                    $('.tombol-muat-video-lebih').html('Muat Lebih');
                    $('.tombol-muat-video-lebih').attr('disabled', false);
                }
            }
        });
    });

    $(document).on('click','.btn-anak', function() {
        var id_kegiatan = $(this).attr('id');

        $.ajax({
            type     : "GET",
            url      : "/detail-kegiatan/"+id_kegiatan,
            dataType : "JSON",
            success  : function(response) {
                $('.modal-title').html(response.detail_kegiatan[0].judul);
                $('#uraian-kegiatan').append(
                    '<p id="uraian-kegiatan">'+ response.detail_kegiatan[0].uraian +'</p>'
                );
                $.each(response.detail_kegiatan, function(key, item) {
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
        $('#uraian-kegiatan').html('');
        $('#carousel-indicators-modal-dokumentasi').html('');
        $('#carousel-inner-modal-dokumentasi').html('');
        $('#carousel-indicators-modal-dokumentasi > li').removeClass("active");
        $('#carousel-item-modal-dokumentasi').removeClass("active");
    });

});