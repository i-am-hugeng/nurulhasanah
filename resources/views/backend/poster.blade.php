@extends('layouts.backend-template')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="inline">
                            Poster Acara
                            <button type="button" class="btn btn-sm btn-dark" id="tombol-tambah-poster" title="tambah poster Acara" data-toggle="modal" data-target="#modal-tambah-poster">
                                <span class="fa fa-plus"></span>
                            </button>
                        </h1>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Poster Acara</th>
                                </tr>
                            </thead>
                            <tbody id="poster-frame">

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div id="tombol-frame" class="col-md-6">
                                <button class="tombol-tampil ml-auto d-block btn btn-dark disabled">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- {{-- Modal Tambah Poster --}} -->
        <div class="modal fade" id="modal-tambah-poster">
            <form id="form-tambah-poster" enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Poster Acara</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="form-control form-select" id="status_tampil" name="status_tampil" hidden>
                                <option value="0" selected></option>
                            </select>   

                            <div class="form-group">
                                <label for="nama_poster">Upload Poster</label>
                                <input type="file" class="form-control-file" id="nama_poster" name="nama_poster">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="tambah-poster">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </form>
            <!-- /.modal-dialog -->
        </div>
        <!-- {{-- End of - Modal Tambah Poster --}} -->

    </div>
@stop

@section('js')
    <script>

        $(document).ready(function() {

            fetch_poster();

            function fetch_poster() {
                $.ajax({
                    type     : "GET",
                    url      : "/admin/poster/data-poster",
                    dataType : "json",
                    success  : function(response) {
                        $('#poster-frame').html("");
                        $.each(response.show_data, function(key, item) {
                            $('#poster-frame').append(
                                '<img src="/media/images/poster/'+ response.show_data[0].nama_poster +'" class="img-fluid">'
                            );
                            if(response.show_data[0].status_tampil == 0) {
                                $('#tombol-frame').html('');
                                $('#tombol-frame').append(
                                    '<button id="'+ response.show_data[0].id +'" class="tombol-tampil ml-auto d-block btn btn-success" title="tombol aktifkan poster">\
                                        <i class="fas fa-power-off"></i>\
                                    </button>'
                                );
                            }
                            else {
                                $('#tombol-frame').html('');
                                $('#tombol-frame').append(
                                    '<button id="'+ response.show_data[0].id +'" class="tombol-tampil ml-auto d-block btn btn-danger" title="tombol non-aktifkan poster">\
                                        <i class="fas fa-power-off"></i>\
                                    </button>'
                                );
                            }
                        });
                    }
                });
            }

            /******** Tambah Poster Acara *********/
            $('#form-tambah-poster').on('click', '#tambah-poster', function(e) {

                $.validator.addMethod('filesize', function (value, element, param) {
                    return this.optional(element) || (element.files[0].size <= param * 1000000) // here we are working with Byte
                }, 'Ukuran file gambar tidak boleh lebih dari {0} MB');
                
                $('#form-tambah-poster').validate({
                    rules: {
                        nama_poster: {
                            required: true,
                            extension: "jpg|png|jpeg",
                            filesize : 10, // here we are working with MB
                        },
                    },
                    messages: {
                        nama_poster: {
                            required: "Poster tidak boleh kosong.",
                            extension: "Hanya diperbolehkan menggunakan file tipe gambar.",
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

                        $('#tambah-poster').html('<i class="spinner-border spinner-border-sm text-light" role="status"></i> Menyimpan...');
                        $('#tambah-poster').attr('disabled', true);

                        $.ajax({
                            type        : "POST",
                            dataType    : "JSON",
                            url         : "/admin/poster/tambah-poster",
                            cache       : false,
                            contentType : false,
                            processData : false,
                            data        : new FormData($(form)[0]),
                            success : function(response) {
                                Swal.fire({
                                    title: "Berhasil",
                                    text: "Poster acara berhasil diunggah.",
                                    icon: "success",
                                });                      
                            },
                            error: function(response) {
                                alert('gagal upload data...');
                            },
                            complete: function(response) {
                                $('#modal-tambah-poster').modal('hide');
                                $('#form-tambah-poster').find('input').val('');
                                $('#tambah-poster').html('');
                                $('#tambah-poster').text('Simpan');
                                $('#tambah-poster').attr('disabled', false);
                                fetch_poster();
                            },
                        }); 

                        return false;
                    },
                });
            });

            /******** Ubah Status Tampil Poster Acara *********/
            $(document).on('click', '.tombol-tampil', function() {
                var data_id = $(this).attr('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type        : "POST",
                    dataType    : "JSON",
                    url         : "/admin/poster/ubah-status-tampil-poster/"+data_id,
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data        : data_id,
                    success : function(response) {
                        if(response.status.status_tampil == 0) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Poster telah dinonaktifkan dari halaman depan.",
                                icon: "success",
                            });
                        }
                        else {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Poster telah diaktifkan tampil pada halaman depan.",
                                icon: "success",
                            });
                        }
                                            
                    },
                    error: function(response) {
                        alert('gagal ubah status tampil poster...');
                    },
                    complete: function(response) {
                        fetch_poster();
                    },
                });
            });
        });

    </script>
@stop