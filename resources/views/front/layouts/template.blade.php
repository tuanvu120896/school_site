<!doctype html>
<?php $useragent = $_SERVER['HTTP_USER_AGENT']; ?>
@if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Chia sẻ những trải nghiệm cuộc sống ở Nhật</title>
        @include('front.layouts.SP.head')
    </head>
    <body class="home blog custom-background group-blog" style="cursor: default; padding: 0px;">
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
            <div class="theTop">
                <div class="site-branding">
                    <div class="site-logo">
                        <a href="http://bikae.net/" rel="home">
                            <img src="http://bikae.pmy91dczy3anjdz9.netdna-cdn.com/wp-content/themes/bikae/images/logo.png?4be1b2"
                                 alt="bikae.net">
                        </a>
                    </div>
                    <!-- <h2 class="site-description">Chia sẻ những trải nghiệm cuộc sống ở Nhật</h2>-->
                </div>
            </div>

            <!-- Menu -->
            <nav role="navigation" class="swipe-menu js-swipe-menu">
                <ul class="swipe-menu-list js-swipe-menu-list"
                    style="transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1); transition-duration: 0ms; transform: translate(0px, 0px) translateZ(0px);">
                    <li class="swipe-menu-item current">
                        <a href="http://bikae.net/" class="title"><i class="fa fa-lg fa-home spaceRight"></i></a>
                    </li>
                    <li class="swipe-menu-item">
                        <a href="#" class="title">Find School</a>
                    </li>
                    <li class="swipe-menu-item">
                        <a href="#" class="title">Make Dossier</a>
                    </li>
                    <li class="swipe-menu-item">
                        <a href="#" class="title">Areas of Japan</a>
                    </li>
                </ul>
            </nav>
            <!-- #Menu -->
        </header><!-- #masthead -->
        <!-- Ads -->
        <div id="slider" style="width: 100%; height: 100%; background-color: white">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="owl-slider" class="owl-carousel">

                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage1.jpg')}}" alt="The Last of us">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Hokkaido・Tohoku</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage2.jpg')}}" alt="GTA V">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Kanto・Koshin-Etsu</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage3.jpg')}}" alt="Mirror Edge">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Tokyo</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage4.jpg')}}" alt="Mirror Edge">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Tokai・Hokuriku</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage5.jpg')}}" alt="Mirror Edge">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Kinki</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage6.jpg')}}" alt="Mirror Edge">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Chugoku・Shikoku</a>
                                </p>
                            </div>
                            <div class="item">
                                <img width="100%" height="150"
                                     src="{{url('asset/front/SP/imageSlider/fullimage7.jpg')}}" alt="Mirror Edge">
                                <p style="margin-left: 10px">
                                    <strong>Area:</strong>
                                    <a href="#" style="color: #0a7db0">Kyusyu・Okinawa</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    @include('front.home.index')
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->

        @include('front.layouts.SP.footer')

        <script>
            $(document).ready(function () {
                $("#owl-slider").owlCarousel({
                    navigation: false,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true,
                    autoPlay: 3000,
                    itemsTablet: false,
                    itemsMobile: false
                });
            });
        </script>
    </div>
    </body>
    </html>
@else
    <html lang="jp">
    <head>
        @include('front.layouts.PC.head')
    </head>
    <body id="pageTop">
    <div id="wrapper">

        <!-- //▼HEADER▼// -->
        @include('front.layouts.PC.header')
                <!-- //△HEADER△// -->

        <!-- //▼CONTAINER▼// -->
        <div id="container">
            <div class="frame">
                @yield('breadcrumbs')
                        <!-- //▼CONTENT▼// -->
                <div id="contents" class="clearfix">

                    <!-- //▼MAIN AREA▼// -->
                    <div id="mainArea">
                        @yield('main_template')
                    </div>
                    <!-- //△MAIN AREA△// -->

                    <!-- //▼LEFT MENU▼// -->
                    @include('front.layouts.PC.nav')
                            <!-- //△LEFT MENU△// -->

                </div>
                <!-- //△CONTENT△// -->
            </div>
        </div>

        <!-- //△CONTAINER△// -->


        <!-- //▼FOOTER▼// -->
        @include('front.layouts.PC.footer')
                <!-- //△FOOTER△// -->

    </div><!-- End of wrapper -->
    </body>
    </html>
@endif