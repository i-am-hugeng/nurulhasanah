@extends('layouts.frontend-template')

@section('content')
    <div id="frame-anak-asuh-sd">

    </div>

    <div id="frame-anak-asuh-smp">

    </div>

    <div id="frame-anak-asuh-sma">

    </div>


    <!-- {{-- Modal Lihat Anak Asuh --}} -->
    <div class="modal fade" id="modal-lihat-anak-asuh" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-dokumentasi-content text-white">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Anak Asuh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="frame-foto" class="col-md-3">

                        </div>
                        <div class="col-md-9">
                            <table class="table-sm mb-3">
                                <tr class="form-group">
                                    <th>Nama Lengkap</th>
                                    <td>:</td>
                                    <td id="nama_anak_detail"></td>
                                </tr>
                                <tr class="form-group">
                                    <th>Tanggal Lahir</th>
                                    <td>:</td>
                                    <td id="tanggal_lahir_detail"></td>
                                </tr>
                                <tr class="form-group">
                                    <th>Jenis Kelamin</th>
                                    <td>:</td>
                                    <td id="jenis_kelamin_detail"></td>
                                </tr>
                                <tr class="form-group">
                                    <th>Tingkat Pendidikan</th>
                                    <td>:</td>
                                    <td id="tingkat_pendidikan_detail"></td>
                                </tr>
                                <tr class="form-group">
                                    <th>Nama Sekolah</th>
                                    <td>:</td>
                                    <td id="nama_sekolah_detail"></td>
                                </tr>
                                <tr class="form-group">
                                    <th>Status Asuh</th>
                                    <td>:</td>
                                    <td id="status_asuh_detail"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- {{-- End of - Modal Lihat Anak Asuh --}} -->
@stop

@section('script')
    <script src="{{ asset('js/anak-asuh.js') }}"></script>
@stop