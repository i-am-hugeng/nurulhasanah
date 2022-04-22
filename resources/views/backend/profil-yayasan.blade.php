@extends('layouts.backend-template')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="inline">
                            Data Profil Yayasan
                            <button type="button" class="btn btn-sm btn-dark" id="tombol-tambah-profil" title="tambah data profil yayasan" data-toggle="modal" data-target="#modal-tambah-profil">
                                <span class="fa fa-plus"></span>
                            </button>
                        </h1>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="kegiatan-dt">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Profil Yayasan</th>
                                </tr>
                            </thead>
                            <tbody id="profil-frame">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- Modal Tambah Profil --}} -->
        <div class="modal fade" id="modal-tambah-profil">
            <form id="form-tambah-profil" enctype="multipart/form-data">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Profil</h4>
                        <button type="button" class="close tutup-modal-tambah" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!-- {{-- Start : id counter untuk menambah field foto profil --}} -->
                        <input type="hidden" id="counter" value="0">
                        <!-- {{-- End : id counter --}} -->

                        <div class="form-group">
                            <label for="judul">Judul Profil</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul profil...">
                        </div>
                        <div class="form-group">
                            <label for="uraian">Uraian Profil</label>
                            <textarea rows="5" id="uraian" name="uraian" class="form-control"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="button" id="tombol-tambah-foto-profil" class="form-control btn btn-success">Tambah Foto Profil</button>
                            </div>
                        </div>
                        <div id="frame-tambah-foto-profil">
                                
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-dark tutup-modal-tambah" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="tambah-profil">Simpan</button>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
        <!-- {{-- End of - Modal Tambah Profil --}} -->

    </div>
@stop

@section('js')

    <script>

        $(document).ready(function() {

            fetch_profil();

            function fetch_profil() {
                $.ajax({
                    type     : "GET",
                    url      : "/admin/profil-yayasan/tampil-profil",
                    success  : function(response) {
                        $('#profil-frame').html("");
                        $('#profil-frame').append(
                            '<div class="container row">\
                                <div id="foto-frame" class="col-md-4 mt-3">\
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">\
                                        <ol id="carousel-indicators" class="carousel-indicators">\
                                        </ol>\
                                        <div id="carousel-inner" class="carousel-inner" role="listbox">\
                                        </div>\
                                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">\
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>\
                                            <span class="sr-only">Previous</span>\
                                        </a>\
                                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">\
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>\
                                            <span class="sr-only">Next</span>\
                                        </a>\
                                    </div>\
                                </div>\
                                <div class="col-md-8  mt-3">\
                                    <h3 id="judul-profil"></h3>\
                                    <p id="uraian-profil" class="text-justify"></p>\
                                </div>\
                            </div>'
                        );
                        $.each(response.foto_profil, function(key, item) {
                            if(key == 0) {
                                $('#carousel-indicators').append(
                                    '<li data-target="#myCarousel" data-slide-to="'+ key +'" class="active"></li>'
                                );
                            }
                            else {
                                $('#carousel-indicators').append(
                                    '<li data-target="#myCarousel" data-slide-to="'+ key +'"></li>'
                                );
                            }
                        });
                        $.each(response.foto_profil, function(key, item) {
                            if(key == 0) {
                                $('#carousel-inner').append(
                                    '<div class="carousel-item active">\
                                        <img src="/media/images/profile-foundation-photos/'+ item.nama_foto +'" alt="'+ item.keterangan +'" class="d-block w-100 img-fluid">\
                                    </div>'
                                );
                            }
                            else {
                                $('#carousel-inner').append(
                                    '<div class="carousel-item">\
                                        <img src="/media/images/profile-foundation-photos/'+ item.nama_foto +'" alt="'+ item.keterangan +'" class="d-block w-100 img-fluid">\
                                    </div>'
                                ); 
                            }
                        });
                        $('#judul-profil').html(response.data_profil[0].judul);
                        $('#uraian-profil').html(response.data_profil[0].uraian);
                    }
                });
            }

            //{{-- Tambah Profil Yayasan --}}
            $('#tombol-tambah-foto-profil').click(function() {
                tambah_foto_profil();
            });

            function tambah_foto_profil() {
                var counter = parseInt($('#counter').val());
                var html = '<div id="record['+ counter +']" class="record row">\
                                <div class="col-md-9">\
                                    <div class="form-group">\
                                        <input type="file" class="form-control form-control-file nama_foto mb-3" name="nama_foto['+ counter +']">\
                                    </div>\
                                </div>\
                                <div class="col-md-3">\
                                    <button type="button" class="btn btn-dark form-control hapus-foto">Hapus</button>\
                                </div>\
                            </div>';

                $('#frame-tambah-foto-profil').append(html);
                $('#counter').val( counter + 1 );
            }

            $('.tutup-modal-tambah').click(function() {
                $('#frame-tambah-foto-profil').html('');
            });

            $(document).on('click','.hapus-foto', function() {
                $(this).closest('.record').remove();
            });

            /******** Tambah Data Kegiatan *********/

            $('#tambah-profil').on('click', function(e) {

                if($('.record').length == 0) {
                    e.preventDefault();
                    Swal.fire({
                        icon : "error",
                        title: "Peringatan",
                        text: "Tambahkan minimal satu foto profil yayasan.",
                    });
                }

                else {
                    $('#form-tambah-profil').on('click', '#tambah-profil', function(e) {

                        $('.nama_foto').each(function() {
                            $(this).rules("add",
                                {
                                    required: true,
                                    extension: "jpg|png|jpeg",
                                    filesize: 5,
                                    messages: {
                                        required: "Masukkan file gambar dokumentasi kegiatan.",
                                        extension: "Hanya diperbolehkan menggunakan file dengan ekstensi jpg | png | jpeg.",
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

                            $('#tambah-profil').html('<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...');
                            $('#tambah-profil').attr('disabled', true);

                            $.ajax({
                                type        : "POST",
                                dataType    : "JSON",
                                url         : "/admin/profil-yayasan/tambah-profil",
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
                                    $('#modal-tambah-profil').modal('hide');
                                    $('#form-tambah-profil').find('textarea').val('');
                                    $('#form-tambah-profil').find('input').val('');
                                    $('.record').html('');
                                    $('#tambah-profil').html('');
                                    $('#tambah-profil').text('Simpan');
                                    $('#tambah-profil').attr('disabled', false);
                                    fetch_profil();
                                }
                            });
                            
                            return false;

                        }
                    });
                }
            })

        });

    </script>

@stop