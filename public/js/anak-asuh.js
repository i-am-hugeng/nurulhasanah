$(document).ready(function() {
    //prevent right click to download on images
    $("body").on("contextmenu", "img", function(e) {
        return false;
    });

    $.ajax({
        type: "get",
        url: "/konten-anak-asuh",
        dataType: "JSON",
        success: function (response) {
            $('#frame-anak-asuh-sd').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Sekolah Dasar / Madrasah Ibtidaiah ('+ response.total_anak_sd +' anak)</h1>\
                    <div id="jumbotron-sd" class="row"></div>\
                </div>'
            );
            $('#frame-anak-asuh-smp').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Sekolah Menengah Pertama / Madrasah Tsanawiyah ('+ response.total_anak_smp +' anak)</h1>\
                    <div id="jumbotron-smp" class="row"></div>\
                </div>'
            );
            $('#frame-anak-asuh-smp').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 text-success" style="margin-top:-4%">Sekolah Menengah Atas / Madrasah Aliyah ('+ response.total_anak_sma +' anak)</h1>\
                    <div id="jumbotron-sma" class="row"></div>\
                </div>'
            );
            $.each(response.anak_asuh, function (key, item) {
                if(item.tingkat_pendidikan == 'Sekolah Dasar / Madrasah Ibtidaiah') {
                    $('#jumbotron-sd').append(
                        '<div class="col-md-2 d-flex align-items-stretch mb-3">\
                            <div class="card">\
                                <img class="card-img-top" src="/media/images/foster-children/'+item.foto+'">\
                                <div class="card-body">\
                                    <p class="card-title pb-4">'+item.nama_anak+'</p>\
                                    <button type="button" id="'+ item.id +'" class="btn-anak btn-success">Detail</button>\
                                </div>\
                            </div>\
                        </div>'
                    );
                }
                else if(item.tingkat_pendidikan == 'Sekolah Menengah Pertama / Madrasah Tsanawiyah') {
                    $('#jumbotron-smp').append(
                        '<div class="col-md-2 d-flex align-items-stretch mb-3">\
                            <div class="card">\
                                <img class="card-img-top" src="/media/images/foster-children/'+item.foto+'">\
                                <div class="card-body">\
                                    <p class="card-title pb-4">'+item.nama_anak+'</p>\
                                    <button type="button" id="'+ item.id +'" class="btn-anak btn-success">Detail</button>\
                                </div>\
                            </div>\
                        </div>'
                    );
                }
                else if(item.tingkat_pendidikan == 'Sekolah Menengah Atas / Madrasah Aliyah') {
                    $('#jumbotron-sma').append(
                        '<div class="col-md-2 d-flex align-items-stretch mb-3">\
                            <div class="card">\
                                <img class="card-img-top" src="/media/images/foster-children/'+item.foto+'">\
                                <div class="card-body">\
                                    <p class="card-title pb-4">'+item.nama_anak+'</p>\
                                    <button type="button" id="'+ item.id +'" class="btn-anak btn-success">Detail</button>\
                                </div>\
                            </div>\
                        </div>'
                    );
                } 
            });
        }
    });

    $(document).on('click','.btn-anak', function() {
        var id_anak = $(this).attr('id');

        $.ajax({
            type     : "GET",
            url      : "/detail-anak-asuh/"+id_anak,
            dataType : "JSON",
            success  : function(response) {
                let tanggal_format = response.detail_anak.tanggal_lahir;
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
                }
                $("#frame-foto").append(
                    '<img class="img-fluid mt-1 ml-1" src="/media/images/foster-children/'+ response.detail_anak.foto +'">'
                );
                $('#id_detail').html(response.detail_anak.id);
                $('#nama_anak_detail').html(response.detail_anak.nama_anak);
                $('#tanggal_lahir_detail').html(arrayTanggal[2] + ' ' + bulan(arrayTanggal) + ' ' + arrayTanggal[0]);
                $('#jenis_kelamin_detail').html(response.detail_anak.jenis_kelamin);
                $('#tingkat_pendidikan_detail').html(response.detail_anak.tingkat_pendidikan);
                $('#nama_sekolah_detail').html(response.detail_anak.nama_sekolah);
                $('#status_asuh_detail').html(response.detail_anak.status_asuh);                        

                $('#modal-lihat-anak-asuh').modal('show');
            }
        });
    });

    $(document).on('click', '.close', function() {
        $('#modal-lihat-anak-asuh').modal('hide');
        $('#frame-foto').html("");
        $('#nama_anak_detail').html("");
        $('#tanggal_lahir_detail').html("");
        $('#jenis_kelamin_detail').html("");
        $('#tingkat_pendidikan_detail').html("");
        $('#nama_sekolah_detail').html("");
        $('#status_asuh_detail').html("");
        $('#frame-foto').html("");
    });

});