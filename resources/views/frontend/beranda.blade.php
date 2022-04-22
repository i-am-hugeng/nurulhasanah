@extends('layouts.frontend-template')

@section('content')
    <div id="frame-kegiatan-terbaru">

    </div>

    <div id="frame-statistik-anak">

    </div>

    <div id="frame-jumbotron">

    </div>

    <!-- {{-- Modal Dokumentasi --}} -->
    <div class="modal fade" id="modal-dokumentasi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-dokumentasi-content text-white">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carousel-dokumentasi" class="carousel slide" data-ride="carousel">
                        <ol id="carousel-indicators-modal-dokumentasi" class="carousel-indicators">
                        </ol>
                        <div id="carousel-inner-modal-dokumentasi" class="carousel-inner" role="listbox">

                        </div>
                        <a class="carousel-control-prev" href="#carousel-dokumentasi" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-dokumentasi" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- {{-- End of - Modal Dokumentasi --}} -->
@stop

@section('script')
    <script src="{{ asset('js/beranda.js') }}"></script>
@stop
