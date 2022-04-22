<!DOCTYPE html>
<html>
<head>

    <title>Nurul Hasanah Surabaya</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

    <script type="text/javascript">
        $(function(){
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                var ww = ( $(window).width() < window.screen.width ) ? $(window).width() : window.screen.width; //get proper width
                var mw = 480; // min width of site
                var ratio =  ww / mw; //calculate ratio
                if( ww < mw) { //smaller than minimum size
                    $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
                }
                else {//regular size
                    $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width=' + ww);
                }
            }
        });
    </script>

    <!-- Font Family -->
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('media/images/logo/favicon.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <link rel="stylesheet" href="{{asset('css/bootstrap-4-1-3.css')}}" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>
<body class="bg-frontend">
    {{-- Navbar Start --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <div>
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('media/images/logo/logo.png') }}" height="50px" alt="">
                    Yayasan Nurul Hasanah Surabaya
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link link-hover  text-white {{ Request::is('/') ? 'link-active' : '' }}" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover  text-white {{ Request::is('anak-asuh') ? 'link-active' : '' }}" href="{{ url('/anak-asuh') }}">Anak Asuh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  link-hover  text-white {{ Request::is('kegiatan') ? 'link-active' : '' }}" href="{{ url('/kegiatan') }}">Kegiatan Yayasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  link-hover  text-white {{ Request::is('profil') ? 'link-active' : '' }}" href="{{ url('/profil') }}">Profil Yayasan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Navbar End --}}

    {{-- Content Start --}}
    <div class="container-fluid">
        @yield('content')
    </div>
    {{-- Content End --}}

    {{-- Footer Start --}}
    <footer class="footer page-footer font-small text-white bg-success">
        <div class="container">
            <div class="row pt-4">
                <div class="col-md-4 text-center">
                    <span class="fa fa-phone d-inline"></span>
                    <p class="d-inline">+62 857-3000-3012 / +62 858-2155-8584</p>
                </div>
                <div class="col-md-4 text-center">
                    <span class="fa fa-whatsapp d-inline"></span>
                    <p class="d-inline">+62 857-3000-3012 / +62 858-2155-8584</p>
                </div>
                <div class="col-md-4 text-center">
                    <span class="fa fa-instagram d-inline"></span>
                    <p class="d-inline">nurul.hasanah.surabaya</p>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12 text-center">
                    <span class="fa fa-home d-inline"></span>
                    <a href="https://g.page/nurulhasanah?share" class="d-inline" style="text-decoration: none; color: white;">Jalan Dukuh Kupang Barat I No.223, Kelurahan Dukuh Pakis, Kecamatan Dukuh Pakis, Kota Surabaya, Jawa Timur 60225</a>
                </div>
            </div>
            <div class="footer-copyright text-center py-2">Copyright © 2022
                <a href="https://nurulhasanah.or.id/" class="text-white"> Yayasan Nurul Hasanah Surabaya</a>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}

</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<!-- Datepicker Plugins -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@yield('script')
</html>
