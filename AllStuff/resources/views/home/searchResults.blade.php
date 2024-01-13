<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/AllStuff.png" type="">
    <title>AllStuff</title>

    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css">
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/css/style.css" rel="stylesheet">
    <link href="home/css/responsive.css" rel="stylesheet">
</head>
<body>

<div class="hero_area">
    @include('home.header')

    @if(request()->has('search')&& isset($product) && count($product) > 0)
    <div class="container">
    Available <span style="color: #ff5733;">Products:</span>
        </div>
        @else
        <div class="container">
            <p>Cannot not find that product.</p>
        </div>
        @endif
        @include('home.product')
</div>

@include('home.slider')
@include('home.whyallstuff')
@include('home.arrival')
@include('home.footer')

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

<script src="home/js/jquery-3.4.1.min.js"></script>
<script src="home/js/popper.min.js"></script>
<script src="home/js/bootstrap.js"></script>
<script src="home/js/custom.js"></script>

</body>
</html>
