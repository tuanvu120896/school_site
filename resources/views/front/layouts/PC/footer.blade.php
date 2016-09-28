<div id="footer" style="padding: 5px 0; margin-bottom: -2px">
    <p id="copy">© {{date('Y')}} School.net All rights reserved. <br> Please do not repost content on this site without
        our permission.</p>
</div>
<script type="text/javascript" src="{{url('asset/front/SP/js/jquery.min.js')}}"></script>
<script src="{{url('asset/front/SP/js/owl.carousel.js')}}"></script>
<script>
    $(document).ready(function () {
        $("#owl-slider").owlCarousel({
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: 3000,
            itemsDesktop: true,
            itemsDesktopSmall: true
        });
    });
</script>