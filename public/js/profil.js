$(document).ready(function() {
    //prevent right click to download on images
    $("body").on("contextmenu", "img", function(e) {
        return false;
    });

    $.ajax({
        type: "get",
        url: "/konten-profil",
        dataType: "JSON",
        success: function(response) {
            $('#frame-profil').append(
                '<div class="jumbotron bg-jumbotron mt-4">\
                    <h1 class="display-8 mb-3" style="margin-top:-4%">'+ response.profil[0].judul +'</h1>\
                    <div id="foto-profil-frame" class="row">\
                        <div class="col-md-6">\
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
                        <div class="col-md-6">\
                            <p id="uraian-profil">'+ response.profil[0].uraian +'</p>\
                        </div>\
                    </div>\
                </div>'
            );
            $.each(response.profil, function(key, item) {
                $('#carousel-indicators').append(
                    '<li data-target="#myCarousel" data-slide-to="'+ key +'"></li>'
                );
                $('#carousel-inner').append(
                    '<div id="profil-carousel-image" class="carousel-item">\
                        <img src="/media/images/profile-foundation-photos/'+ item.nama_foto +'" class="d-block w-100 rounded img-fluid">\
                    </div>'
                );
                if(key == 0) {
                    $('#carousel-indicators > li').addClass('active');
                    $('.carousel-item').addClass('active');
                }
            });
        }
    });

});