<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="icon" href="../../favicon.ico">

    <title>Department of computer engineering TNEU</title>


    <link rel="stylesheet" type="text/css" href="/semantic/out/semantic.css">
    <link rel="stylesheet" type="text/css" href="/css/meia.css">
    <link rel="stylesheet" type="text/css" href="/css/ropdown.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">





    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="/semantic/out/semantic.js"></script>
    <script>
        $(function () {
            //var $lists = $('.list-group li').click(function(e) {

            $(".item").click(function () {
                $(this).toggleClass("active");
                e.preventDefault(); /*ignores actual link*/
            });


            //$lists.filter(".active").removeClass("active");
            //$(this).addClass('active');
            //e.preventDefault() /*ignores actual link*/
            //});
        });

    </script>


    <![endif]-->
</head>

<body>
@include('layouts.top-menu')

<div class="container">

    @yield('content')


    <footer class="footer" style="background-color: #455A64">
        <div class="container" style="text-align: center;  -webkit-text-fill-color: white">
            <?php
            $url = "$_SERVER[REQUEST_URI]";
            if($url == "/abiturient"){
            ?>
                <p>&copy; 2018 Кафедра комп'ютерної інженерії ТНЕУ</p>
            <?php } else { ?>
            <p>&copy; 2018 TNEU Computer Vision & Artificial Intelligence
                Scientific Group</p>
            <?php } ?>
        </div>
    </footer>

</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.1/vue-resource.min.js"></script>

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
@stack('scripts')

</body>
</html>
