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
                            <h4>Tìm Trường Tiếng Nhật</h4>
                        </a>
                        <table border="0" cellpadding="0" cellspacing="1" id="mapSearch">
                            <tbody>
                            <tr>
                                <td colspan="14"></td>
                                <td colspan="2" rowspan="2" class="bgc1" id="area1" title="demo1"><br><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 1]))}}">1</a><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14"></td>
                            </tr>
                            <tr>
                                <td colspan="16"></td>
                            </tr>
                            <tr>
                                <td colspan="14"></td>
                                <td colspan="2" class="bgc1" id="area2"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 2]))}}">2</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="14"></td>
                                <td class="bgc1" id="area5"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 5]))}}">5</a>
                                </td>
                                <td class="bgc1" id="area3"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 3]))}}">3</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10"></td>
                                <td rowspan="2" class="bgc2" id="area17"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 17]))}}">17</a>
                                </td>
                                <td colspan="3"></td>
                                <td class="bgc1" id="area6"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 6]))}}">6</a>
                                </td>
                                <td class="bgc1" id="area4"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 4]))}}">4</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10"></td>
                                <td class="bgc2" id="area16"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 16]))}}">16</a>
                                </td>
                                <td colspan="2" class="bgc3" id="area15"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 15]))}}">15</a>
                                </td>
                                <td colspan="2" class="bgc1" id="area7"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 7]))}}">7</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9"></td>
                                <td colspan="2" class="bgc2" id="area18"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 18]))}}">18</a>
                                </td>
                                <td rowspan="2" class="bgc2" id="area21"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 21]))}}">21</a>
                                </td>
                                <td rowspan="2" class="bgc3" id="area20"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 20]))}}">20</a>
                                </td>
                                <td class="bgc3" id="area10"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 10]))}}">10</a>
                                </td>
                                <td class="bgc3" id="area9"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 9]))}}">9</a>
                                </td>
                                <td rowspan="2" class="bgc3" id="area8"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 8]))}}">8</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="bgc4" id="area35"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 35]))}}">35</a>
                                </td>
                                <td class="bgc4" id="area32"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 32]))}}">32</a>
                                </td>
                                <td class="bgc4" id="area31"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 31]))}}">31</a>
                                </td>
                                <td rowspan="2" class="bgc5" id="area28"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 28]))}}">28</a>
                                </td>
                                <td class="bgc5" id="area26"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 26]))}}">26</a>
                                </td>
                                <td colspan="2" class="bgc5" id="area25"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 25]))}}">25</a>
                                </td>
                                <td colspan="2" class="bgc3" id="area11"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 11]))}}">11</a>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="bgc8" id="area42"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 42]))}}">42</a>
                                </td>
                                <td rowspan="2" class="bgc8" id="area41"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 41]))}}">41</a>
                                </td>
                                <td colspan="2" class="bgc8" id="area40"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 40]))}}">40</a>
                                </td>
                                <td></td>
                                <td class="bgc4" id="area34"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 34]))}}">34</a>
                                </td>
                                <td class="bgc4" id="area33"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 33]))}}">33</a>
                                </td>
                                <td class="bgc5" id="area27"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 27]))}}">27</a>
                                </td>
                                <td class="bgc5" id="area29"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 29]))}}">29</a>
                                </td>
                                <td rowspan="2" class="bgc5" id="area24"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 24]))}}">24</a>
                                </td>
                                <td class="bgc2" id="area23"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 23]))}}">23</a>
                                </td>
                                <td rowspan="2" class="bgc2" id="area22"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 22]))}}">22</a>
                                </td>
                                <td class="bgc3" id="area19"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 19]))}}">19</a>
                                </td>
                                <td class="bgc6" id="area13"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 13]))}}">13</a>
                                </td>
                                <td rowspan="2" class="bgc3" id="area12"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 12]))}}">12</a>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" class="bgc8" id="area43"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 43]))}}">43</a>
                                </td>
                                <td class="bgc8" id="area44"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 44]))}}">44</a>
                                </td>
                                <td colspan="4"></td>
                                <td colspan="2" class="bgc5" id="area30"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 30]))}}">30</a>
                                </td>
                                <td></td>
                                <td class="bgc3" id="area14"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 14]))}}">14</a>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td rowspan="2" class="bgc8" id="area45"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 45]))}}">45</a>
                                </td>
                                <td></td>
                                <td class="bgc4" id="area38"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 38]))}}">38</a>
                                </td>
                                <td class="bgc4" id="area37"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 37]))}}">37</a>
                                </td>
                                <td colspan="2"></td>
                                <td></td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="bgc8" id="area47"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 47]))}}">47</a>
                                </td>
                                <td colspan="4"></td>
                                <td class="bgc4" id="area39"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 39]))}}">39</a>
                                </td>
                                <td class="bgc4" id="area36"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 36]))}}">36</a>
                                </td>
                                <td colspan="9"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="bgc8" id="area46"><a
                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 46]))}}">46</a>
                                </td>
                                <td colspan="13"></td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table border="0" cellpadding="0" cellspacing="1" id="areaSearch">
                            <tbody>
                            <tr>
                                <th class="bgc1"><a>Hokkaido・Tohoku</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 1]))}}">Hokkaido(1)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 2]))}}">Aomori(2)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 3]))}}">Iwate(3)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 4]))}}">Miyagi(4)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 5]))}}">Akita(5)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 6]))}}">Yamagata(6)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 7]))}}">Fukushima(7)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc3"><a>Kanto・Koshin-Etsu</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 8]))}}">Ibaraki(8)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 9]))}}">Tochigi(9)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 10]))}}">Gunma(10)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 11]))}}">Saitama(11)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 12]))}}">Chiba(12)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 14]))}}">Kanagawa(14)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 19]))}}">Yamanashi(19)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 20]))}}">Nagano(20)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 15]))}}">Niigata(15)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc6"><a>Tokyo</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 13]))}}">Tokyo(13)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc2"><a>Tokai・Hokuriku</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 16]))}}">Toyama(16)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 17]))}}">Ishikawa(17)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 19]))}}">Fukui(18)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 21]))}}">Gifu(21)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 22]))}}">Shizuoka(22)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 23]))}}">Aichi(23)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 24]))}}">Mie(24)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc5"><a>Kinki</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 25]))}}">Shiga(25)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 26]))}}">Kyoto(26)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 27]))}}">Osaka(27)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 28]))}}">Hyogo(28)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 29]))}}">Nara(29)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 30]))}}">Wakayama(30)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc4"><a>Chugoku・Shikoku</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 31]))}}">Tottori(31)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 32]))}}">Shimane(32)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 33]))}}">Okayama(33)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 34]))}}">Hiroshima(34)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 35]))}}">Yamaguchi(35)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 36]))}}">Tokushima(36)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 37]))}}">Kagawa(37)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 38]))}}">Ehime(38)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 39]))}}">Kochi(39)</a>
                                </td>
                            </tr>
                            <tr>
                                <th class="bgc8"><a>Kyusyu・Okinawa</a>
                                </th>
                                <td>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 40]))}}">Fukuoka(40)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 41]))}}">Saga(41)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 42]))}}">Nagasaki(42)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 43]))}}">Kumamoto(43)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 44]))}}">Oita(44)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 45]))}}">Miyazaki(45)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 46]))}}">Kagoshima(46)</a>
                                    <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => 47]))}}">Okinawa(47)</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="category-box hoc-tieng-nhat clearfix">
                        <a href="#">
                            <h4>Hướng Dẫn Làm Hồ Sơ</h4>
                        </a>
                        <div id="main-list" style="margin-top: 5px">
                            @foreach($dossiers as $dossier)
                                <div id="item"
                                     style="width: 100%;height: 110px;border-bottom: 1px solid #ccc;margin-top: 5px;padding-bottom: 5px;">
                                    <div id="text-title" style="float: left;width: 35%;height: 100px;">
                                        <a href="{{url(route('front_dossier_detail',['name' => $dossier->title]))}}"><img
                                                    src="{{url('asset/image/icon/dossier/'.$dossier->image)}}"
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
                            <div style="float: right"><strong>Xem thêm : <a href="{{url(route('front_dossier_list'))}}"
                                                                            style="color: #079b9b">Hướng Dẫn Làm Hồ Sơ
                                        > </a></strong></div>
                        </div>
                    </div>

                    <div class="category-box hoc-tieng-nhat clearfix">
                        <a href="#">
                            <h4>Thông Tin Về Các Vùng Ở Nhật</h4>
                        </a>
                        <div id="main-list" style="margin-top: 5px">
                            @foreach($area_info as $item)
                                <div id="item"
                                     style="width: 100%;height: 110px;border-bottom: 1px solid #ccc;margin-top: 5px;padding-bottom: 5px;">
                                    <div id="text-title" style="float: left;width: 35%;height: 100px;">
                                        <a href="{{url(route('front_area_info_detail',['name' => $item->title]))}}"><img
                                                    src="{{url('asset/image/icon/area_info/'.$item->image)}}"
                                                    style="border: 1px solid #eeeeee;float: left;width: 100%;height: 100px;"
                                                    width="100%" height="100px"></a>
                                    </div>
                                    <div id="text-title" style="float: left;width: 65%;height: 100px;">
                                        <a href="{{url(route('front_area_info_detail',['name' => $item->title]))}}">
                                            <h1 style="float:left;font-size: 14px;margin-left: 5px;height: 65%;">
                                                {{substr(ucfirst($item->name),0,110)}}{{strlen($item->name) > 110 ? ' ...': ' '}}
                                            </h1>
                                        </a>
                                        <p style="float: left; font-size: 11px;margin-left: 5px;height: 35%">
                                            <img src="{{url('asset/front/SP/image/calendar-icon.png')}}" width="10px"
                                                 height="10px">
                                            {{$item->created_at}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                            <div style="float: right"><strong>Xem thêm : <a
                                            href="{{url(route('front_area_info_list'))}}" style="color: #079b9b">Thông
                                        Tin Về Các Vùng Ở Nhật > </a></strong></div>
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
                </ul>
                <!-- //▼CONTENT▼// -->
                <div id="contents" class="clearfix">

                    <!-- //▼MAIN AREA▼// -->
                    <div id="mainArea">
                        <!-- //▼ slide ▼// -->
                        @include('front.layouts.PC.slide')
                        <!-- //▼ end slide ▼// -->
                        <div id="mainPad">
                            <h2 class="title">Tìm Trường Tiếng Nhật</h2>

                            <div id="mainBox">

                                <div id="searchArea">
                                    <div id="searchAreaPad">
                                        <div id="areajapan">
                                            <ul>
                                                @for($i = 0; $i < 16 ; $i++)
                                                    <li>
                                                        <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => $cities[$i]->number]))}}"
                                                           onmouseover="onMouseover=document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#45b7ff'"
                                                           onmouseout="document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#c6ecec'">{{$cities[$i]->number}} {{$cities[$i]->name}}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <ul>
                                                @for($i = 16; $i < 32 ; $i++)
                                                    <li>
                                                        <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => $cities[$i]->number]))}}"
                                                           onmouseover="onMouseover=document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#45b7ff'"
                                                           onmouseout="document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#c6ecec'">{{$cities[$i]->number}} {{$cities[$i]->name}}</a>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <ul>
                                                @for($i = 32; $i < count($cities) ; $i++)
                                                    <li>
                                                        <a href="{{url(route('front_list',['name' => 'Hokkaido','id' => $cities[$i]->number]))}}"
                                                           onmouseover="onMouseover=document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#45b7ff'"
                                                           onmouseout="document.getElementById('area{{$cities[$i]->number}}').style.backgroundColor='#c6ecec'">{{$cities[$i]->number}} {{$cities[$i]->name}}</a>
                                                    </li>
                                                @endfor
                                            </ul>

                                        </div>

                                        <table border="0" cellpadding="0" cellspacing="1" id="mapSearch">
                                            <tbody>
                                            <tr>
                                                <td colspan="14"></td>
                                                <td colspan="2" rowspan="2" class="bgc1" id="area1"><br><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 1]))}}">1</a><br><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="14"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="16"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="14"></td>
                                                <td colspan="2" class="bgc1" id="area2"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 2]))}}">2</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="14"></td>
                                                <td class="bgc1" id="area5"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 5]))}}">5</a>
                                                </td>
                                                <td class="bgc1" id="area3"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 3]))}}">3</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"></td>
                                                <td rowspan="2" class="bgc2" id="area17"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 17]))}}">17</a>
                                                </td>
                                                <td colspan="3"></td>
                                                <td class="bgc1" id="area6"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 6]))}}">6</a>
                                                </td>
                                                <td class="bgc1" id="area4"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 4]))}}">4</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10"></td>
                                                <td class="bgc2" id="area16"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 16]))}}">16</a>
                                                </td>
                                                <td colspan="2" class="bgc3" id="area15"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 15]))}}">15</a>
                                                </td>
                                                <td colspan="2" class="bgc1" id="area7"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 7]))}}">7</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="9"></td>
                                                <td colspan="2" class="bgc2" id="area18"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 18]))}}">18</a>
                                                </td>
                                                <td rowspan="2" class="bgc2" id="area21"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 21]))}}">21</a>
                                                </td>
                                                <td rowspan="2" class="bgc3" id="area20"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 20]))}}">20</a>
                                                </td>
                                                <td class="bgc3" id="area10"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 10]))}}">10</a>
                                                </td>
                                                <td class="bgc3" id="area9"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 9]))}}">9</a>
                                                </td>
                                                <td rowspan="2" class="bgc3" id="area8"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 8]))}}">8</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4"></td>
                                                <td class="bgc4" id="area35"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 35]))}}">35</a>
                                                </td>
                                                <td class="bgc4" id="area32"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 32]))}}">32</a>
                                                </td>
                                                <td class="bgc4" id="area31"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 31]))}}">31</a>
                                                </td>
                                                <td rowspan="2" class="bgc5" id="area28"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 28]))}}">28</a>
                                                </td>
                                                <td class="bgc5" id="area26"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 26]))}}">26</a>
                                                </td>
                                                <td colspan="2" class="bgc5" id="area25"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 25]))}}">25</a>
                                                </td>
                                                <td colspan="2" class="bgc3" id="area11"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 11]))}}">11</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" class="bgc8" id="area42"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 42]))}}">42</a>
                                                </td>
                                                <td rowspan="2" class="bgc8" id="area41"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 41]))}}">41</a>
                                                </td>
                                                <td colspan="2" class="bgc8" id="area40"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 40]))}}">40</a>
                                                </td>
                                                <td></td>
                                                <td class="bgc4" id="area34"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 34]))}}">34</a>
                                                </td>
                                                <td class="bgc4" id="area33"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 33]))}}">33</a>
                                                </td>
                                                <td class="bgc5" id="area27"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 27]))}}">27</a>
                                                </td>
                                                <td class="bgc5" id="area29"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 29]))}}">29</a>
                                                </td>
                                                <td rowspan="2" class="bgc5" id="area24"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 24]))}}">24</a>
                                                </td>
                                                <td class="bgc2" id="area23"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 23]))}}">23</a>
                                                </td>
                                                <td rowspan="2" class="bgc2" id="area22"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 22]))}}">22</a>
                                                </td>
                                                <td class="bgc3" id="area19"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 19]))}}">19</a>
                                                </td>
                                                <td class="bgc6" id="area13"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 13]))}}">13</a>
                                                </td>
                                                <td rowspan="2" class="bgc3" id="area12"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 12]))}}">12</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3" class="bgc8" id="area43"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 43]))}}">43</a>
                                                </td>
                                                <td class="bgc8" id="area44"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 44]))}}">44</a>
                                                </td>
                                                <td colspan="4"></td>
                                                <td colspan="2" class="bgc5" id="area30"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 30]))}}">30</a>
                                                </td>
                                                <td></td>
                                                <td class="bgc3" id="area14"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 14]))}}">14</a>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td rowspan="2" class="bgc8" id="area45"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 45]))}}">45</a>
                                                </td>
                                                <td></td>
                                                <td class="bgc4" id="area38"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 38]))}}">38</a>
                                                </td>
                                                <td class="bgc4" id="area37"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 37]))}}">37</a>
                                                </td>
                                                <td colspan="2"></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2" class="bgc8" id="area47"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 47]))}}">47</a>
                                                </td>
                                                <td colspan="4"></td>
                                                <td class="bgc4" id="area39"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 39]))}}">39</a>
                                                </td>
                                                <td class="bgc4" id="area36"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 36]))}}">36</a>
                                                </td>
                                                <td colspan="9"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2" class="bgc8" id="area46"><a
                                                            href="{{url(route('front_list',['name' => 'Hokkaido','id' => 46]))}}">46</a>
                                                </td>
                                                <td colspan="13"></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <table border="0" cellpadding="0" cellspacing="1" id="areaSearch">
                                            <tbody>
                                            <tr>
                                                <th class="bgc1"><a>Hokkaido・Tohoku</a>
                                                </th>
                                                <td>
                                                    <a>Hokkaido</a>
                                                    <a>Aomori</a>
                                                    <a>Iwate</a>
                                                    <a>Miyagi</a>
                                                    <a>Akita</a>
                                                    <a>Yamagata</a>
                                                    <a>Fukushima</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc3"><a>Kanto・Koshin-Etsu</a>
                                                </th>
                                                <td>
                                                    <a>Ibaraki</a>
                                                    <a>Tochigi</a>
                                                    <a>Gunma</a>
                                                    <a>Saitama</a>
                                                    <a>Chiba</a>
                                                    <a>Kanagawa</a>
                                                    <a>Yamanashi</a>
                                                    <a>Nagano</a>
                                                    <a>Niigata</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc6"><a>Tokyo</a>
                                                </th>
                                                <td>
                                                    <a>Chiyoda-ku</a>
                                                    <a>Chuo-ku</a>
                                                    <a>Minato-ku</a>
                                                    <a>Shinjuku-ku</a>
                                                    <a>Bunkyo-ku</a>
                                                    <a>Taito-ku</a>
                                                    <a>Sumida-ku</a>
                                                    <a>Koto-ku</a>
                                                    <a>Shinagawa-ku</a>
                                                    <a>Meguro-ku</a>
                                                    <a>Ota-ku</a>
                                                    <a>Setagaya-ku</a>
                                                    <a>Shibuya-ku</a>
                                                    <a>Nakano-ku</a>
                                                    <a>Suginami-ku</a>
                                                    <a>Toshima-ku</a>
                                                    <a>Kita-ku</a>
                                                    <a>Arakawa-ku</a>
                                                    <a>Itabashi-ku</a>
                                                    <a>Nerima-ku</a>
                                                    <a>Adachi-ku</a>
                                                    <a>Katsushika-ku</a>
                                                    <a>Edogawa-ku</a>
                                                    <a></a>
                                                    <a>Mitaka-shi</a>
                                                    <a></a>
                                                    <a>Musashino-shi</a>
                                                    <a>Hachioji-shi</a>
                                                    <a>Hino-shi</a>
                                                    <a>Kiyose-shi</a>
                                                    <a>Fussa-shi</a>
                                                    <a></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc2"><a>Tokai・Hokuriku</a>
                                                </th>
                                                <td>
                                                    <a>Toyama</a>
                                                    <a>Ishikawa</a>
                                                    <a>Fukui</a>
                                                    <a>Gifu</a>
                                                    <a>Shizuoka</a>
                                                    <a>Aichi</a>
                                                    <a>Mie</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc5"><a>Kinki</a>
                                                </th>
                                                <td>
                                                    <a>Shiga</a>
                                                    <a>Kyoto</a>
                                                    <a>Osaka</a>
                                                    <a>Hyogo</a>
                                                    <a>Nara</a>
                                                    <a>Wakayama</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc4"><a>Chugoku・Shikoku</a>
                                                </th>
                                                <td>
                                                    <a>Tottori</a>
                                                    <a>Shimane</a>
                                                    <a>Okayama</a>
                                                    <a>Hiroshima</a>
                                                    <a>Yamaguchi</a>
                                                    <a>Tokushima</a>
                                                    <a>Kagawa</a>
                                                    <a>Ehime</a>
                                                    <a>Kochi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="bgc8"><a>Kyusyu・Okinawa</a>
                                                </th>
                                                <td>
                                                    <a>Fukuoka</a>
                                                    <a>Saga</a>
                                                    <a>Nagasaki</a>
                                                    <a>Kumamoto</a>
                                                    <a>Oita</a>
                                                    <a>Miyazaki</a>
                                                    <a>Kagoshima</a>
                                                    <a>Okinawa</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                ※ブラウザによっては正しく表示されない場合があります。その際はご不便をおかけしますが<a
                                        href="http://www.nisshinkyo.org/search/terms.php">「条件で探す」</a>をご利用ください。

                                <!--**▼検索結果**-->
                                <a name="terms"></a>
                            </div>

                        </div>
                        <div id="mainPad">
                            <h2 class="title">Hướng Dẫn Làm Hồ Sơ</h2>
                            <div id="mainBox">
                                @foreach($dossiers as $dossier)
                                    <div id="item"
                                         style="width: 100%; height: 160px;border-bottom: 1px solid #cccccc; margin-bottom: 10px">
                                        <div style="float: left;width: 40%;height: 160px;">
                                            <img src="{{'asset/image/icon/dossier/'.$dossier->image}}"
                                                 style="border: 1px solid #e3e3e3" width="100%" height="150">
                                        </div>
                                        <div style="float: left;height: 160px; width: 60%;">
                                            <a href="#"><h1
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
                                <div style=" padding-bottom: 15px;width: 100%;height: auto; "><p
                                            style="float: right;font-weight: bold"><span>Xem Thêm : </span>
                                        <a class="more-info" href="{{url(route('front_dossier_list'))}}"
                                           style="text-decoration: none; font-weight: bold;">Hướng Dẫn Làm Hồ Sơ > </a>
                                    </p></div>
                            </div>

                        </div>
                        <div id="mainPad">
                            <h2 class="title">Thông Tin Về Các Vùng Ở Nhật</h2>
                            <div id="mainBox">
                                @foreach($area_info as $item)
                                    <div id="item"
                                         style="width: 100%; height: 160px;border-bottom: 1px solid #cccccc; margin-bottom: 10px">
                                        <div style="float: left;width: 40%;height: 160px;">
                                            <img src="{{url('asset/image/icon/area_info/'.$item->image)}}"
                                                 style="border: 1px solid #e3e3e3" width="100%" height="150">
                                        </div>
                                        <div style="float: left;height: 160px; width: 60%;">
                                            <a href="#"><h1
                                                        style="float:left; padding: 0 10px; height: 30% ">{{substr(ucfirst($item->name),0,110)}}{{strlen($item->name) > 110 ? ' ...': ' '}}</h1>
                                            </a>
                                            <i style="float:left; padding: 0 10px; height: 50%;text-indent: 10px;">{!! substr($item->about,0,150) .' ...' !!}</i>
                                            <p style="float:left; padding: 0 10px; height: 20%; color: gray">
                                                <img src="{{url('asset/front/SP/image/calendar-icon.png')}}"
                                                     width="15px" height="15px">
                                                {{$item->created_at}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                <div style=" padding-bottom: 15px;width: 100%;height: auto; ">
                                    <p style="float: right;font-weight: bold">
                                        <span>Xem Thêm : </span>
                                        <a href="{{url(route('front_area_info_list'))}}" class="more-info"
                                           style="text-decoration: none; font-weight: bold;">Thông Tin Về Các Vùng Ở
                                            Nhật > </a></p></div>
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