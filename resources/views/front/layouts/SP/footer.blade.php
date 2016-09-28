<footer id="colophon" class="site-footer" role="contentinfo" style="margin-top: 5px">
    <div class="site-info smallPart">
        © {{date('Y')}} <a href="{{url(route('front_home'))}}">School.net All rights reserved.</a>
        <p>Vui lòng không sử dụng nội dung trên trang web khi chúng tôi chưa cho phép</p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
<script type="text/javascript">
    disableSelection(document.body)
</script>
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
            itemsTablet: true,
            itemsMobile: true
        })
    });
</script>