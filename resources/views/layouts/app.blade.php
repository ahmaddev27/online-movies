
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OnlineMovies | {{@$title}}</title>


    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/easyautocomplete/easy-autocomplete.min.css') }}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{ asset('css/vendor.min.css') }}">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

    <!--main styles -->
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">

    <style>
        .fw-900{
            font-weight: 900;
        }

        .easy-autocomplete{
            width: 90%;
        }

        .easy-autocomplete input{

            color: #ffff !important;
        }

        .eac-icon-left .eac-item img {
            max-height: 80px !important;
        }

    </style>

</head>
<body>

@yield('content')

@include('layouts._footer')
<!--jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/fontawesome.min.js"></script>

<script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>

<!--bootstrap-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>

<!--vendor js-->
<script src="{{asset('js/vendor.min.js')}}"></script>


<!--main scripts-->
<script src="{{asset('js/main.min.js')}}"></script>

<script src="{{asset('js/playerjs.js')}}"></script>

<script src="{{asset('js/custom/movie.js')}}"></script>

<script src="{{asset('dashboard/plugins/easyautocomplete/jquery.easy-autocomplete.min.js')}}"></script>



<script>
    $.ajaxSetup({

        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    var options = {
        url: function(search) {
            return "/movies?search=" + search ;
        },

        getValue: "name",

        template: {
            type: 'iconLeft',
            fields: {
                iconSrc: "poster_path"
            }
        },

        list: {
            onChooseEvent: function() {
              var movie = $('.form-control[type="search"]').getSelectedItemData();
              var url = window.location.origin + '/movies/'+movie.id;
              window .location.replace(url);
            }
        }
    };

    $(".form-control").easyAutocomplete(options);

    $(document).ready(function () {

        $("#banner .movies").owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: false,
        });

        $(".listing .movies").owlCarousel({
            loop: true,
            nav: false,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },
            dots: false,
            margin: 15,
            loop: true,
        });

    });


</script>

@stack('scripts')
</body>
</html>
