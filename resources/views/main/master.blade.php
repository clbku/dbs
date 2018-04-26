<html>
@include('main.headtag')
<body>
</body>

@include('main.header')
@yield('content')
@include('main.footer')
<script type="text/javascript">
    var carousel;
    $(document).ready(function () {
        carousel = $(".our-cources ul");
        carousel.itemslide();
    });
</script>
</body>
</html>