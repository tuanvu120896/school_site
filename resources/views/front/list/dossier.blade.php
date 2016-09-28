<!DOCTYPE html>
<?php $useragent = $_SERVER['HTTP_USER_AGENT']; ?>
@if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    <html lang="jp">
    <head>
        @include('front.layouts.SP.head')
    </head>
    <body class="home blog custom-background group-blog" style="cursor: default; padding: 0;">
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
            <div class="theTop">
                <div class="site-branding">
                    <div class="site-logo">
                        <a href="{{url(route('front_home'))}}" rel="home">
                            <img src="http://bikae.pmy91dczy3anjdz9.netdna-cdn.com/wp-content/themes/bikae/images/logo.png?4be1b2"
                                 alt="bikae.net">
                        </a>
                    </div>
                    <!-- <h2 class="site-description">Chia sẻ những trải nghiệm cuộc sống ở Nhật</h2>-->
                </div>
            </div>

            <!-- Menu -->
            @include('front.layouts.SP.nav')
            <!-- #Menu -->
        </header><!-- #masthead -->
        <!-- Ads -->
        <div id="slider" style="width: 100%; height: 100%; background-color: white">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="owl-slider" class="owl-carousel">
                            @include('front.layouts.SP.slide')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="category-box hoc-tieng-nhat clearfix">
                        <a href="#">
                            <h4>Hướng Dẫn Làm Hồ Sơ</h4>
                        </a>
                        <div id="main-list" style="margin-top: 5px">
                            @foreach($dossiers as $dossier)
                                <div id="item"
                                     style="width: 100%;height: 110px;border-bottom: 1px solid #ccc;margin-top: 5px;padding-bottom: 5px;">
                                    <div id="text-title" style="float: left;width: 35%;height: 100px;">
                                        <a href="{{url(route('front_dossier_detail',['name' => $dossier->title]))}}"><img src="{{url('asset/image/icon/dossier/'.$dossier->image)}}"
                                                         style="border: 1px solid #eeeeee;float: left;width: 100%;height: 100px;"
                                                         width="100%" height="100px"></a>
                                    </div>
                                    <div id="text-title" style="float: left;width: 65%;height: 100px;">
                                        <a href="{{url(route('front_dossier_detail',['name' => $dossier->title]))}}">
                                            <h1 style="float:left;font-size: 14px;margin-left: 5px;height: 65%;">
                                                {{substr(ucfirst($dossier->name),0,110)}}{{strlen($dossier->name) > 110 ? ' ...': ' '}}
                                            </h1>
                                        </a>
                                        <p style="float: left; font-size: 11px;margin-left: 5px;height: 35%">
                                            <img src="{{url('asset/front/SP/image/calendar-icon.png')}}" width="10px"
                                                 height="10px">
                                            {{$dossier->created_at}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <div style="margin-top: 5px; padding-bottom: 15px;width: 100%;height: auto; ">
                                @if($dossiers->previousPageUrl() !== NULL)
                                    <div style="float: left;">
                                        <a style="color:#079b9b;border: 1px solid #ddd;padding: 6px;border-radius: 5px;text-decoration: none;{{$dossiers->previousPageUrl() == NULL?'pointer-events: none;color:#ccc':''}}"
                                           href="{{ $dossiers->previousPageUrl() }}">Trang Trước</a>
                                    </div>
                                @endif
                                @if($dossiers->nextPageUrl() !== NULL)
                                    <div style="float: right;">
                                        <a style="color:#079b9b;border: 1px solid #ddd;padding: 6px;border-radius: 5px;text-decoration: none;{{$dossiers->nextPageUrl() == NULL?'pointer-events: none;color:#ccc':''}}"
                                           href="{{$dossiers->nextPageUrl()}}">Trang Sau</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- #content -->

        @include('front.layouts.SP.footer')
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
                <ul id="pan" class="clearfix">
                    <li id="home"><a href="{{url(route('front_home'))}}"><img alt="ホーム"
                                                                              src="{{url('asset/front/files/icon_home.gif')}}"
                                                                              width="16" height="14"
                                                                              class="over"> <strong>Home</strong></a>
                    </li>
                    <li>Hướng Dẫn Làm Hồ Sơ</li>
                </ul>
                <!-- //▼CONTENT▼// -->
                <div id="contents" class="clearfix">

                    <!-- //▼MAIN AREA▼// -->
                    <div id="mainArea">

                        <div id="mainPad">
                            <h2 class="title">Hướng Dẫn Làm Hồ Sơ</h2>
                            <div id="mainBox">
                                @foreach($dossiers as $dossier)
                                    <div id="item"
                                         style="width: 100%; height: 160px;border-bottom: 1px solid #cccccc; margin-bottom: 10px">
                                        <div style="float: left;width: 40%;height: 160px;">
                                            <a href="{{url(route('front_dossier_detail',['name' => $dossier->title]))}}"><img src="{{url('asset/image/icon/dossier/'.$dossier->image)}}" style="border: 1px solid #e3e3e3" width="100%"
                                                 height="150"></a>
                                        </div>
                                        <div style="float: left;height: 160px; width: 60%;">
                                            <a href="{{url(route('front_dossier_detail',['name' => $dossier->title]))}}"><h1
                                                        style="float:left; padding: 0 10px; height: 30%;">{{substr(ucfirst($dossier->name),0,110)}}{{strlen($dossier->name) > 110 ? ' ...': ' '}}</h1>
                                            </a>
                                            <i style="float:left; padding: 0 10px; height: 50%;text-indent: 10px;">{!! substr($dossier->about,0,150) .' ...' !!}</i>
                                            <p style="float:left; padding: 0 10px; height: 20%; color: gray">
                                                <img src="{{url('asset/front/SP/image/calendar-icon.png')}}"
                                                     width="15px" height="15px">
                                                {{$dossier->created_at}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                <div style=" padding-bottom: 15px;width: 100%;height: auto; ">
                                    @if($dossiers->previousPageUrl() !== NULL)
                                        <div style="float: left;">
                                            <a style="border: 1px solid #ddd;padding: 6px;border-radius: 5px;text-decoration: none;{{$dossiers->previousPageUrl() == NULL?'pointer-events: none;color:#ccc':''}}"
                                               href="{{ $dossiers->previousPageUrl() }}">Trang Trước</a>
                                        </div>
                                    @endif
                                    @if($dossiers->nextPageUrl() !== NULL)
                                        <div style="float: right;">
                                            <a style="border: 1px solid #ddd;padding: 6px;border-radius: 5px;text-decoration: none;{{$dossiers->nextPageUrl() == NULL?'pointer-events: none;color:#ccc':''}}"
                                               href="{{$dossiers->nextPageUrl()}}">Trang Sau</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
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