@extends('layouts.backend-template')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="inline">
                            Data Kegiatan Yayasan
                            <button type="button" class="btn btn-sm btn-dark" id="tombol-tambah-Kegiatan" title="tambah data kegiatan yayasan" data-toggle="modal" data-target="#modal-tambah-kegiatan">
                                <span class="fa fa-plus"></span>
                            </button>
                        </h1>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="kegiatan-dt">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Judul Kegiatan</th>
                                    <th>Uraian Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Total Dokumentasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- Modal Tambah Kegiatan --}} -->
        <div class="modal fade" id="modal-tambah-kegiatan">
            <form id="form-tambah-kegiatan" enctype="multipart/form-data">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Kegiatan</h4>
                        <button type="button" class="close tutup-modal-tambah" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- {{-- Start : id counter untuk menambah field dokumentasi kegiatan --}} -->
                        <input type="hidden" id="counter" value="0">
                        <!-- {{-- End : id counter --}} -->

                        <div class="form-group">
                            <label for="judul">Judul Kegiatan</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul kegiatan...">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Kegiatan</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal kegiatan..." readonly>
                        </div>
                        <div class="form-group">
                            <label for="uraian">Uraian Kegiatan</label>
                            <textarea rows="5" id="uraian" name="uraian" class="form-control"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="button" id="tombol-tambah-dokumentasi" class="form-control btn btn-success">Tambah Dokumentasi</button>
                            </div>
                        </div>
                        <div id="div_tambah_dokumentasi">
                                
                        </div>
                        <!-- <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control form-control-file" id="foto" name="foto">
                        </div> -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-dark tutup-modal-tambah" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="tambah-kegiatan">Simpan</button>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
        <!-- {{-- End of - Modal Tambah Kegiatan --}} -->

        

        <!-- {{-- Modal Lihat Detail Data Kegiatan --}} -->
        <div class="modal fade" id="modal-lihat-detail-kegiatan">
            <form id="form-lihat-detail-kegiatan" name="form-lihat-detail-kegiatan" class="form-horizontal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title" id="modal-judul">Data Detail Kegiatan</h4>
                            <button type="button" id="tutup-modal" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id_detail">
                            </div>
                            <div class="row">
                                <div id="frame-dokumentasi" class="col-md-4">

                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol id="carousel-indicators" class="carousel-indicators">

                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div id="carousel-inner" class="carousel-inner" role="listbox">

                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <table class="mb-3">
                                        <tr class="form-group">
                                            <th class="col-sm-4">Judul Kegiatan</th>
                                            <td>:</td>
                                            <td class="col-sm-8" id="judul_kegiatan_detail"></td>
                                        </tr>
                                        <tr class="form-group">
                                            <th class="col-sm-4">Tanggal Kegiatan</th>
                                            <td>:</td>
                                            <td class="col-sm-8" id="tanggal_kegiatan_detail"></td>
                                        </tr>
                                        <tr class="form-group">
                                            <th class="col-sm-4" style="vertical-align:top">Uraian Kegiatan</th>
                                            <td style="vertical-align:top">:</td>
                                            <td class="col-sm-8"  id="uraian_kegiatan_detail"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
        <!-- {{-- End of : Modal Lihat Detail Data Kegiatan --}} -->

        <!-- {{-- Modal Hapus Kegiatan --}} -->
        <div class="modal fade" id="modal-hapus-kegiatan">
            <form id="form-hapus-kegiatan">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Data Kegiatan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="modal-hapus-body">
                            
                            
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger" id="hapus_kegiatan">Hapus</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
        <!-- {{-- End of - Modal Hapus Kegiatan --}} -->

    </div>
@stop

@section('js')
    <script>

        $(document).ready(function() {

            $("#tanggal").datepicker({
                todayBtn   :'linked',
                changeYear : true,
                yearRange  : '-1:+0',
                dateFormat : 'yy-mm-dd',
                orientation: 'top auto',
                autoclose  : true,
                maxDate: '0',
            });

        });

        $(document).ready(function() {

            kegiatan_dt();

            function kegiatan_dt() {

                $('#kegiatan-dt').DataTable({
                    language: {
                        url: "/json/id.json"
                    },
                    serverside: true,
                    ajax: {
                        url: "/admin/kegiatan",
                        type: "GET",
                    },
                    columns: [
                        {
                            data : 'judul',
                            name : 'judul',
                            render : function(data, type, row, meta) {
                                return '<a href="javascript:void(0)" data-id="'+ row.id +'" class="lihat-detail-kegiatan">'+ row.judul +'</a>';
                            }
                        },
                        {
                            data : 'uraian',
                            name : 'uraian',
                            render: function ( data, type, row ) {
                                return data.substr( 0, 50 )+'...';
                            }

                        },
                        {
                            data : 'tanggal',
                            name : 'tanggal',
                        },
                        {
                            data : 'total_dokumentasi',
                            name : 'total_dokumentasi',
                        },
                        {
                            data : 'aksi',
                            name : 'aksi',
                            orderable : false,
                            searchable : false,
                        },
                    ],
                    columnDefs: [
                        { 
                            targets: 1,
                            width: "25%",
                        },
                        { 
                            targets: 2,
                            width: "15%",
                        },
                        { 
                            targets: 3,
                            width: "15%",
                        },
                    ],
                    order : [[2, 'desc']],
                });

            }

            //{{-- Tambah Dokumentasi Kegiatan --}}
            $('#tombol-tambah-dokumentasi').click(function() {
                tambah_dokumentasi();
            });

            function tambah_dokumentasi() {
                var counter = parseInt($('#counter').val());
                var html = '<div id="record['+ counter +']" class="record row">\
                                <div class="col-md-9">\
                                    <div class="form-group">\
                                        <input type="file" class="form-control-file dokumentasi_kegiatan mb-3" name="dokumentasi_kegiatan['+ counter +']">\
                                    </div>\
                                    <div class="form-group">\
                                    <textarea rows="2" name="keterangan_kegiatan['+ counter +']" class="form-control keterangan_kegiatan"></textarea>\
                                    </div>\
                                </div>\
                                <div class="col-md-3">\
                                    <button type="button" class="btn btn-dark form-control hapus-dokumentasi">Hapus</button>\
                                </div>\
                            </div>';

                $('#div_tambah_dokumentasi').append(html);
                $('#counter').val( counter + 1 );
            }

            $('.tutup-modal-tambah').click(function() {
                $('#div_tambah_dokumentasi').html('');
            });

            $(document).on('click','.hapus-dokumentasi', function() {
                $(this).closest('.record').remove();
            });


            /******** Tambah Data Kegiatan *********/

            $('#tambah-kegiatan').on('click', function(e) {

                if($('#tanggal').val() == 0) {
                    e.preventDefault();
                    Swal.fire({
                        icon : "error",
                        title: "Peringatan",
                        text: "Tanggal kegiatan tidak boleh kosong.",
                        confirmButtonColor: '#d33',
                    });
                }
                else if($('.record').length == 0) {
                    e.preventDefault();
                    Swal.fire({
                        icon : "error",
                        title: "Peringatan",
                        text: "Tambahkan minimal satu dokumentasi dan keterangan kegiatan.",
                        confirmButtonColor: '#d33',
                    });
                }

                else {
                    $('#form-tambah-kegiatan').on('click', '#tambah-kegiatan', function(e) {

                        $('.dokumentasi_kegiatan').each(function() {
                            $(this).rules("add",
                                {
                                    required: true,
                                    extension: "jpg|png|jpeg|mp4",
                                    filesize: 50,
                                    messages: {
                                        required: "Masukkan file gambar/video dokumentasi kegiatan.",
                                        extension: "Hanya diperbolehkan menggunakan file dengan ekstensi jpg | png| jpeg| mp4.",
                                    }
                                }
                            );
                        });

                        $('.keterangan_kegiatan').each(function() {
                            $(this).rules("add",
                                {
                                    required: true,
                                    maxlength: 100,
                                    messages: {
                                        required: "Keterangan kegiatan tidak boleh kosong.",
                                        maxlength: "Tidak boleh lebih dari 100 karakter.",
                                    }
                                }
                            );
                        });

                        $.validator.addMethod('filesize', function (value, element, param) {
                            return this.optional(element) || (element.files[0].size <= param * 1000000) // here we are working with Byte
                        }, 'Ukuran file gambar tidak boleh lebih dari {0} MB');

                    }).validate({
                        rules: {
                            judul: {
                                required: true,
                                maxlength: 50,
                            },
                            uraian: {
                                required: true,
                            },
                        },
                        messages: {
                            judul: {
                                required: "Masukkan judul kegiatan.",
                                maxlength: "Tidak boleh lebih dari 50 karakter.",
                            },
                            uraian: {
                                required: "Masukkan uraian kegiatan.",
                            },
                        },
                        errorElement: 'span',
                        errorPlacement: function (error, element) {
                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        },
                        highlight: function (element, errorClass, validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight: function (element, errorClass, validClass) {
                            $(element).removeClass('is-invalid');
                        },
                        submitHandler: function(form) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $('#tambah-kegiatan').html('<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...');
                            $('#tambah-kegiatan').attr('disabled', true);

                            $.ajax({
                                type        : "POST",
                                dataType    : "JSON",
                                url         : "/admin/kegiatan/tambah-kegiatan",
                                contentType : false,
                                processData : false,
                                cache       : false,
                                data        : new FormData($(form)[0]),
                                success: function(response) {
                                    Swal.fire({
                                        title: "Berhasil",
                                        text: "Data kegiatan yayasan berhasil ditambahkan.",
                                        icon: "success",
                                    });                      
                                },
                                error: function(response) {
                                    alert('gagal upload data...');
                                },
                                complete: function(response) {
                                    $('#modal-tambah-kegiatan').modal('hide');
                                    $('#form-tambah-kegiatan').find('textarea').val('');
                                    $('#form-tambah-kegiatan').find('input').val('');
                                    $('.record').html('');
                                    $('#tambah-kegiatan').html('');
                                    $('#tambah-kegiatan').text('Simpan');
                                    $('#tambah-kegiatan').attr('disabled', false);
                                    $('#kegiatan-dt').DataTable().ajax.reload();
                                }
                            });
                            
                            return false;

                        }
                    });
                }
            })

            /******** Hapus Data Kegiatan *********/
            $(document).on('click', '.hapus', function (e) {
                $('#modal-hapus-body').html('');
                var id = $(this).attr('id');

                $.ajax({
                    type: "GET",
                    url: "/admin/kegiatan/modal-hapus-kegiatan/"+id,
                    success: function (response) {
                        $('#modal-hapus-body').append(
                            '<input type="hidden" id="id_hapus_kegiatan">\
                            <h6>Anda yakin untuk hapus data kegiatan: <strong>'+ response.data.judul +'</strong> ?</h6>'
                        );
                        $('#id_hapus_kegiatan').val(response.data.id);
                    }
                });

                $('#modal-hapus-kegiatan').modal('show');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '#hapus_kegiatan', function (e) {
                    e.preventDefault();

                    var id = $('#id_hapus_kegiatan').val();

                    $.ajax({
                        type: "DELETE",
                        url: "/admin/kegiatan/hapus-kegiatan/"+id,
                        success: function (response) {
                            $('#modal-hapus-kegiatan').modal('hide');
                            Swal.fire({
                                title : "Berhasil",
                                text  : "Data kegiatan telah dihapus.",
                                icon  : "success",
                            });
                            $('#kegiatan-dt').DataTable().ajax.reload();
                        },
                    });
                }); 
            });

            /******** Lihat Detail Data Kegiatan *********/
            $('body').on('click', '.lihat-detail-kegiatan', function () {
                $('#carousel-indicators').html("");
                $('#carousel-inner').html("");

                var data_id = $(this).data('id');

                $('#modal-lihat-detail-kegiatan').modal('show');

                $.ajax({
                    url : "/admin/kegiatan/lihat-detail-kegiatan/"+data_id,
                    type : "GET",
                    success : function (response) {

                        $.each(response.dokumentasi, function(key, item) {
                            if(key == 0) {
                                $('#carousel-indicators').append(
                                    '<li data-target="#myCarousel" data-slide-to="'+ key +'" class="active"></li>'
                                );
                                $('#carousel-inner').append(
                                    '<div class="carousel-item active">\
                                        <img src="/media/images/activities/photos/photos/'+ item.nama_foto +'" alt="'+ item.keterangan +'" class="d-block w-100 img-fluid">\
                                        <div class="carousel-caption d-none d-md-block">\
                                            <p>'+ item.keterangan +'</p>\
                                        </div>\
                                    </div>'
                                );
                                
                            }
                            else {
                                $('#carousel-indicators').append(
                                    '<li data-target="#myCarousel" data-slide-to="'+ key +'"></li>'
                                );
                                $('#carousel-inner').append(
                                    '<div class="carousel-item">\
                                        <img src="/media/images/activities/photos/photos/'+ item.nama_foto +'" alt="'+ item.keterangan +'" class="d-block w-100 img-fluid">\
                                        <div class="carousel-caption d-none d-md-block">\
                                            <p>'+ item.keterangan +'</p>\
                                        </div>\
                                    </div>'
                                );
                            }
                        });
                        // $("#frame-dokumentasi").append(
                        //     '<img class="img-fluid mt-3 ml-3" src="/media/images/foster-children/'+ response.data[0].foto +'">'
                        // );
                        $('#id_detail').html(response.data[0].id);
                        $('#judul_kegiatan_detail').html(response.data[0].judul);
                        $('#tanggal_kegiatan_detail').html(response.data[0].tanggal);
                        $('#uraian_kegiatan_detail').html(response.data[0].uraian);
                    }
                });
            });

            $('#form-lihat-detail-kegiatan').on('click', '#tutup-modal', function() {
                $('#modal-lihat-detail-kegiatan').modal('hide');
                $('#judul_kegiatan_detail').html("");
                $('#tanggal_kegiatan_detail').html("");
                $('#uraian_kegiatan_detail').html("");
            });

        });

    </script>
@stop