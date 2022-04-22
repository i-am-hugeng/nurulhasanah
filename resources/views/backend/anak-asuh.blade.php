@extends('layouts.backend-template')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="inline">
                        Data Anak Asuh
                        <button type="button" class="btn btn-sm btn-dark" id="tombol-tambah-anak-asuh" title="tambah data anak asuh" data-toggle="modal" data-target="#modal-tambah-anak-asuh">
                            <span class="fa fa-plus"></span>
                        </button>
                    </h1>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover" id="anak-asuh-dt">
                        <thead class="bg-dark text-white">
                            <tr>
                                {{-- <th>No</th> --}}
                                <th>Nama Anak Asuh</th>
                                <th>Jenis Kelamin</th>
                                <th>Tingkat Pendidikan</th>
                                <th>Status Asuh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- {{-- Modal Tambah Anak Asuh --}} -->
    <div class="modal fade" id="modal-tambah-anak-asuh">
        <form id="form-tambah-anak-asuh" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Anak Asuh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_anak">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_anak" name="nama_anak" placeholder="Masukkan nama lengkap...">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan tanggal lahir..." readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control form-select" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="status_asuh">Status Asuh</label>
                        <select class="form-control form-select" id="status_asuh" name="status_asuh">
                            <option value="" disabled selected hidden>Pilih Status Asuh</option>
                            <option value="Yatim Piatu">Yatim Piatu</option>
                            <option value="Yatim">Yatim</option>
                            <option value="Piatu">Piatu</option>
                            <option value="Dhuafa">Dhuafa</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="tingkat_pendidikan">Tingkat Pendidikan</label>
                        <select class="form-control form-select" id="tingkat_pendidikan" name="tingkat_pendidikan">
                            <option value="" disabled selected hidden>Pilih Tingkat Pendidikan</option>
                            <option value="Taman Kanak-Kanak / Playgroup">Taman Kanak-Kanak / Playgroup</option>
                            <option value="Sekolah Dasar / Madrasah Ibtidaiah">Sekolah Dasar / Madrasah Ibtidaiah</option>
                            <option value="Sekolah Menengah Pertama / Madrasah Tsanawiyah">Sekolah Menengah Pertama / Madrasah Tsanawiyah</option>
                            <option value="Sekolah Menengah Atas / Madrasah Aliyah">Sekolah Menengah Atas / Madrasah Aliyah</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Masukkan nama sekolah...">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="tambah-anak-asuh">Simpan</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
    <!-- {{-- End of - Modal Tambah Anak Asuh --}} -->

    <!-- {{-- Modal Edit Anak Asuh --}} -->
    <div class="modal fade" id="modal-edit-anak-asuh">
        <form id="form-edit-anak-asuh" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Anak Asuh</h4>
                    <button type="button" class="close tutup-modal-edit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <div class="form-group">
                        <label for="nama_anak_edit">Nama Lengkap</label>
                        <input type="text" class="form-control nama_anak_edit" id="nama_anak_edit" name="nama_anak_edit" placeholder="Masukkan nama lengkap...">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir_edit">Tanggal Lahir</label>
                        <input type="text" class="form-control tanggal_lahir_edit" id="tanggal_lahir_edit" name="tanggal_lahir_edit" placeholder="Masukkan tanggal lahir..." readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin_edit">Jenis Kelamin</label>
                        <select class="form-control form-select jenis_kelamin_edit" name="jenis_kelamin_edit">
                            <option value="" id="jenis_kelamin_edit" selected></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="status_asuh_edit">Status Asuh</label>
                        <select class="form-control form-select status_asuh_edit" name="status_asuh_edit">
                            <option value="" id="status_asuh_edit" selected></option>
                            <option value="Yatim Piatu">Yatim Piatu</option>
                            <option value="Yatim">Yatim</option>
                            <option value="Piatu">Piatu</option>
                            <option value="Dhuafa">Dhuafa</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="tingkat_pendidikan_edit">Tingkat Pendidikan</label>
                        <select class="form-control form-select tingkat_pendidikan_edit" name="tingkat_pendidikan_edit">
                            <option value="" id="tingkat_pendidikan_edit" selected></option>
                            <option value="Taman Kanak-Kanak / Playgroup">Taman Kanak-Kanak / Playgroup</option>
                            <option value="Sekolah Dasar / Madrasah Ibtidaiah">Sekolah Dasar / Madrasah Ibtidaiah</option>
                            <option value="Sekolah Menengah Pertama / Madrasah Tsanawiyah">Sekolah Menengah Pertama / Madrasah Tsanawiyah</option>
                            <option value="Sekolah Menengah Atas / Madrasah Aliyah">Sekolah Menengah Atas / Madrasah Aliyah</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" class="form-control nama_sekolah_edit" id="nama_sekolah_edit" name="nama_sekolah_edit" placeholder="Masukkan nama sekolah...">
                    </div>
                    <div id="foto_edit">

                    </div>
                    <div class="form-group">
                        <label for="foto_anak_edit">Foto</label>
                        <input type="file" class="form-control-file foto_anak_edit" name="foto_anak_edit">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark tutup-modal-edit" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="edit-anak-asuh">Update</button>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
    <!-- {{-- End of - Modal Edit Anak Asuh --}} -->

    <!-- {{-- Modal Hapus Anak Asuh --}} -->
    <div class="modal fade" id="modal-hapus-anak-asuh">
        <form id="form-hapus-anak-asuh">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Anak Asuh</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-hapus-body">
                        
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger" id="hapus_anak_asuh">Hapus</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>
        <!-- /.modal-dialog -->
    </div>
    <!-- {{-- End of - Modal Hapus Anak Asuh --}} -->

    <!-- {{-- Modal Lihat Detail Data Anak Asuh --}} -->
    <div class="modal fade" id="modal-lihat-detail-anak-asuh">
        <form id="form-lihat-detail-anak-asuh" name="form-lihat-detail-anak-asuh" class="form-horizontal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title" id="modal-judul">Data Detail Anak Asuh</h4>
                        <button type="button" id="tutup-modal" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id_detail">
                        </div>
                        <div class="row">
                            <div id="frame-foto" class="col-md-2">

                            </div>
                            <div class="col-md-10">
                                <table class="mb-3">
                                    <tr class="form-group">
                                        <th class="col-sm-4">Nama Lengkap</th>
                                        <td>:</td>
                                        <td class="col-sm-8" id="nama_anak_detail"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <th class="col-sm-4">Tanggal Lahir</th>
                                        <td>:</td>
                                        <td class="col-sm-8" id="tanggal_lahir_detail"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <th class="col-sm-4">Jenis Kelamin</th>
                                        <td>:</td>
                                        <td class="col-sm-8"  id="jenis_kelamin_detail"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <th class="col-sm-4">Tingkat Pendidikan</th>
                                        <td>:</td>
                                        <td class="col-sm-8" id="tingkat_pendidikan_detail"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <th class="col-sm-4">Nama Sekolah</th>
                                        <td>:</td>
                                        <td class="col-sm-8" id="nama_sekolah_detail"></td>
                                    </tr>
                                    <tr class="form-group">
                                        <th class="col-sm-4">Status Asuh</th>
                                        <td>:</td>
                                        <td class="col-sm-8" id="status_asuh_detail"></td>
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
    <!-- {{-- End of : Modal Lihat Detail Data Anak Asuh --}} -->

</div>
@stop

@section('js')
    <script>

        $(document).ready(function() {

            $("#tanggal_lahir").datepicker({
                todayBtn   :'linked',
                changeYear : true,
                yearRange  : '-20:+0',
                dateFormat : 'yy-mm-dd',
                orientation: 'top auto',
                autoclose  : true,
                maxDate: '0',
            });

        });

        $(document).ready(function() {

            anak_asuh_dt();

            function anak_asuh_dt() {
                $('#anak-asuh-dt').DataTable({
                    language: {
                        url: "/json/id.json"
                    },
                    serverside: true,
                    ajax: {
                        url: "/admin/anak-asuh",
                        type: "GET",
                    },
                    columns: [
                        // {
                        //     data : 'DT_RowIndex',
                        //     name : 'DT_RowIndex',
                        //     orderable : false,
                        //     searchable : false,
                        // },
                        {
                            data : 'nama_anak',
                            name : 'nama_anak',
                            render : function(data, type, row, meta) {
                                return '<a href="javascript:void(0)" data-id="'+ row.id +'" class="lihat-detail-anak-asuh">'+ row.nama_anak +'</a>';
                            }
                        },
                        {
                            data : 'jenis_kelamin',
                            name : 'jenis_kelamin',
                        },
                        {
                            data : 'tingkat_pendidikan',
                            name : 'tingkat_pendidikan',
                        },
                        {
                            data : 'status_asuh',
                            name : 'status_asuh',
                        },
                        {
                            data : 'aksi',
                            name : 'aksi',
                            orderable : false,
                            searchable : false,
                        },
                    ],

                });
            }
        });

        /******** Tambah Data Anak Asuh *********/
        $('#form-tambah-anak-asuh').on('click', '#tambah-anak-asuh', function() {

            $.validator.addMethod("filesize", function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1000000) // here we are working with Byte
            }, 'Ukuran file gambar tidak boleh lebih dari {0} MB');

        }).validate({
                rules: {
                    nama_anak: {
                        required: true,
                        maxlength: 50,
                    },
                    tanggal_lahir: {
                        required: true,
                    },
                    jenis_kelamin: {
                        required: true,
                    },
                    tingkat_pendidikan: {
                        required: true,
                    },
                    nama_sekolah: {
                        required: true,
                        maxlength: 50,
                    },
                    status_asuh: {
                        required: true,
                    },
                    foto: {
                        required: true,
                        extension: "jpg|png|jpeg",
                        filesize : 2, // here we are working with MB
                    },
                },
                messages: {
                    nama_anak: {
                        required: "Masukkan nama lengkap anak asuh.",
                        maxlength: "Tidak boleh lebih dari 50 karakter.",
                    },
                    tanggal_lahir: {
                        required: "Pilih tanggal lahir.",
                    },
                    jenis_kelamin: {
                        required: "Pilih jenis kelamin.",
                    },
                    tingkat_pendidikan: {
                        required: "Pilih tingkat pendidikan.",
                    },
                    status_asuh: {
                        required: "Pilih status asuh.",
                    },
                    nama_sekolah: {
                        required: "Masukkan nama sekolah.",
                        maxlength: "Tidak boleh lebih dari 50 karakter.",
                    },
                    foto: {
                        required: "Foto anak asuh tidak boleh kosong.",
                        extension: "Hanya diperbolehkan menggunakan file image.",
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

                    var file_data = $('#foto').prop('files')[0];
                    var form_data = new FormData($('#form-tambah-anak-asuh')[0]);
                    form_data.append('file',file_data);

                    $.ajax({
                        type        : "POST",
                        dataType    : "json",
                        url         : "/admin/anak-asuh/tambah-anak-asuh",
                        cache       : false,
                        contentType : false,
                        processData : false,
                        data        : form_data,
                        success     : function(response) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data anak asuh berhasil ditambahkan.",
                                icon: "success",
                            });
                        },
                        error: function(response) {
                            alert('gagal upload data...');
                        },
                        complete: function(response) {
                            $('#modal-tambah-anak-asuh').modal('hide');
                            $('#form-tambah-anak-asuh').find('select').val("");
                            $('#form-tambah-anak-asuh').find('input').val("");
                            $('#anak-asuh-dt').DataTable().ajax.reload();
                        }
                    }); 
                }
            });

        /******** Edit Data Anak Asuh *********/
        $(document).on('click', '.edit', function (e) {
            var data_id = $(this).attr('id');

            // alert(data_id);

            $('#modal-edit-anak-asuh').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/anak-asuh/edit-anak-asuh/"+data_id,
                success: function (response) {

                    // alert(response.data[0].nama_anak);

                    $('#edit_id').val(response.data[0].id);
                    $('#nama_anak_edit').val(response.data[0].nama_anak);
                    $('#tanggal_lahir_edit').val(response.data[0].tanggal_lahir);
                    $('#jenis_kelamin_edit').val(response.data[0].jenis_kelamin);
                    $('#jenis_kelamin_edit').text(response.data[0].jenis_kelamin);
                    $('#tingkat_pendidikan_edit').val(response.data[0].tingkat_pendidikan);
                    $('#tingkat_pendidikan_edit').text(response.data[0].tingkat_pendidikan);
                    $('#nama_sekolah_edit').val(response.data[0].nama_sekolah);
                    $('#status_asuh_edit').val(response.data[0].status_asuh);
                    $('#status_asuh_edit').text(response.data[0].status_asuh);
                    $('#foto_edit').append(
                        '<img src="/media/images/foster-children/'+ response.data[0].foto +'" height="200">\
                        <p class="mb-2">'+ response.data[0].foto +'</p>'
                    );
                }
            });
        });

        $('body').on('click', '.tutup-modal-edit', function() {
            $('#form-tambah-anak-asuh').find('select').val("");
            $('#form-tambah-anak-asuh').find('input').val("");
            $('#foto_edit').html("");
        });

        $('#form-edit-anak-asuh').on('click', '#edit-anak-asuh', function(e) {

            $.validator.addMethod('filesize', function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param * 1000000) // here we are working with Byte
            }, 'Ukuran file gambar tidak boleh lebih dari {0} MB');

        }).validate({
                rules: {
                    nama_anak_edit: {
                        required: true,
                        maxlength: 50,
                    },
                    tanggal_lahir_edit: {
                        required: true,
                    },
                    jenis_kelamin_edit: {
                        required: true,
                    },
                    tingkat_pendidikan_edit: {
                        required: true,
                    },
                    nama_sekolah_edit: {
                        required: true,
                        maxlength: 50,
                    },
                    status_asuh_edit: {
                        required: true,
                    },
                    foto_anak_edit: {
                        required: true,
                        extension: "jpg|png|jpeg",
                        filesize : 2, // here we are working with MB
                    },
                },
                messages: {
                    nama_anak_edit: {
                        required: "Masukkan nama lengkap anak asuh.",
                        maxlength: "Tidak boleh lebih dari 50 karakter.",
                    },
                    tanggal_lahir_edit: {
                        required: "Pilih tanggal lahir.",
                    },
                    jenis_kelamin_edit: {
                        required: "Pilih jenis kelamin.",
                    },
                    tingkat_pendidikan_edit: {
                        required: "Pilih tingkat pendidikan.",
                    },
                    status_asuh_edit: {
                        required: "Pilih status asuh.",
                    },
                    nama_sekolah_edit: {
                        required: "Masukkan nama sekolah.",
                        maxlength: "Tidak boleh lebih dari 50 karakter.",
                    },
                    foto_anak_edit: {
                        required: "Foto anak asuh tidak boleh kosong.",
                        extension: "Hanya diperbolehkan menggunakan file image.",
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

                    var data_id = $('#edit_id').val();
                    var form_data = new FormData($('#form-edit-anak-asuh')[0]);

                    $.ajax({
                        type        : "POST",
                        dataType    : "json",
                        url         : "/admin/anak-asuh/update-anak-asuh/"+data_id,
                        cache       : false,
                        contentType : false,
                        processData : false,
                        data        : form_data,
                        success     : function(response) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data anak asuh berhasil diubah.",
                                icon: "success",
                            });
                        },
                        error: function(response) {
                            alert('gagal upload data...');
                        },
                        complete: function(response) {
                            $('#modal-edit-anak-asuh').modal('hide');
                            $('#form-edit-anak-asuh').find('input').val("");
                            $('#foto_edit').html("");
                            $('#anak-asuh-dt').DataTable().ajax.reload();
                        }
                    });
                }
            });

        /******** Hapus Data Anak Asuh *********/
        $(document).on('click', '.hapus', function (e) {
            $('#modal-hapus-body').html('');
            var id = $(this).attr('id');

            $.ajax({
                type: "GET",
                url: "/admin/anak-asuh/modal-hapus-anak-asuh/"+id,
                success: function (response) {
                    $('#modal-hapus-body').append(
                        '<input type="hidden" id="id_hapus_anak_asuh">\
                        <h6>Anda yakin untuk hapus data anak asuh: <strong>'+ response.data.nama_anak +'</strong> ?</h6>'
                    );
                    $('#id_hapus_anak_asuh').val(response.data.id);
                }
            });

            $('#modal-hapus-anak-asuh').modal('show');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#hapus_anak_asuh', function (e) {
                e.preventDefault();

                var id = $('#id_hapus_anak_asuh').val();

                $.ajax({
                    type: "DELETE",
                    url: "/admin/anak-asuh/hapus-anak-asuh/"+id,
                    success: function (response) {
                        $('#modal-hapus-anak-asuh').modal('hide');
                        Swal.fire({
                            title : "Berhasil",
                            text  : "Data anak asuh telah dihapus.",
                            icon  : "success",
                        });
                        $('#anak-asuh-dt').DataTable().ajax.reload();
                    },
                });
            }); 
        });

        /******** Lihat Data Detail Anak Asuh *********/
        $('body').on('click', '.lihat-detail-anak-asuh', function () {

            var data_id = $(this).data('id');

            $('#modal-lihat-detail-anak-asuh').modal('show');

            $.ajax({
                url : "/admin/anak-asuh/lihat-detail-anak-asuh/"+data_id,
                type : "GET",
                success : function (response) {

                    // console.log(response.data[0].nama_anak);
                    $("#frame-foto").append(
                        '<img class="img-fluid mt-1 ml-1" src="/media/images/foster-children/'+ response.data[0].foto +'">'
                    );
                    $('#id_detail').html(response.data[0].id);
                    $('#nama_anak_detail').html(response.data[0].nama_anak);
                    $('#tanggal_lahir_detail').html(response.data[0].tanggal_lahir);
                    $('#jenis_kelamin_detail').html(response.data[0].jenis_kelamin);
                    $('#tingkat_pendidikan_detail').html(response.data[0].tingkat_pendidikan);
                    $('#nama_sekolah_detail').html(response.data[0].nama_sekolah);
                    $('#status_asuh_detail').html(response.data[0].status_asuh);
                }
            });
        });

        $('#form-lihat-detail-anak-asuh').on('click', '#tutup-modal', function() {
            $('#modal-lihat-detail-anak-asuh').modal('hide');
            $('#frame-foto').html("");
            $('#nama_anak_detail').html("");
            $('#tanggal_lahir_detail').html("");
            $('#jenis_kelamin_detail').html("");
            $('#tingkat_pendidikan_detail').html("");
            $('#nama_sekolah_detail').html("");
            $('#status_asuh_detail').html("");
            $('#frame-foto').html("");
        });

    </script>
@stop