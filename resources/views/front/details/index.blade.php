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
                    <div class="main-list" style="">
                        <a href="#">
                            <h4 class="title-list" style="">Thông Tin Trường Học</h4>
                        </a>
                        <table id="table-details" width="100%" height="auto">
                            <tbody>
                            <tr>
                                <th class="cell2" width="25%">name english</th>
                                <td class="cell1" width="75%" colspan="3">{{ucwords(strtolower($school['name_en']))}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">name japanese</th>
                                <td class="cell1" width="75%" colspan="3">{{ucwords(strtolower($school['name_jp']))}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">city</th>
                                <td class="cell1" width="25%">{{$school['city_name']}}</td>
                                <th class="cell2" width="25%">zip code</th>
                                <td class="cell1" width="25%">{{$school['zip_code']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">phone</th>
                                <td class="cell1" width="75%" colspan="3">{{$school['phone']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">fax</th>
                                <td class="cell1" width="75%" colspan="3">{{$school['fax']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">email</th>
                                <td class="cell1" width="75%" colspan="3">{{$school['email']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">website</th>
                                <td class="cell1" width="75%" colspan="3"><a
                                            href="{{$school['url']}}">{{$school['url']}}</a></td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">address1</th>
                                <td class="cell1" width="75%" colspan="3">{{$school['address1']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">address2</th>
                                <td class="cell1" width="75%" colspan="3">{{$school['address2']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2" width="25%">building</th>
                                <td class="cell1" width="25%">{{$school['building']}}</td>
                                <th class="cell2" width="25%">home</th>
                                <td class="cell1" width="25%">{{$school['home']}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table id="table-details">
                            <thead>
                            <tr>
                                <th class="title-table-detail">
                                    other info
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="cell2">dormitory</th>
                                <td class="cell1">{{$school['school_details']->dorm_status}}
                                    <br>有 {{$school['school_details']->dorm_money}}
                                    〜円(月額)
                                </td>
                                <th class="cell2">number student</th>
                                <td class="cell1">{{$school['school_details']->number_student}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">career guidance</th>
                                <td class="cell1">{{$school['school_details']->career}}</td>
                                <th class="cell2">about student</th>
                                <td class="cell1">{{$school['school_details']->about}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">type test</th>
                                <td class="cell1" colspan="3">{{$school['school_details']->type_test}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">about japanese</th>
                                <td class="cell1" colspan="3">{{$school['school_details']->japanese}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">scholarship</th>
                                <td class="cell1">{{$school['school_details']->scholarship}}</td>
                                <th class="cell2">additional Job</th>
                                <td class="cell1">{{$school['school_details']->overtime}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">staff</th>
                                <td class="cell1">{{$school['school_details']->staff}}</td>
                                <th class="cell2">number country</th>
                                <td class="cell1">{{$school['school_details']->number_country}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if(count($school['courses']) > 0)
                            <table id="table-details">
                                <thead>
                                <tr>
                                    <th class="title-table-detail" colspan="2">
                                        courses({{count($school['courses'])}})
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="cell2" width="20%" colspan="2" style="text-align: center">course</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{$course->name}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" colspan="2" style="text-align: center">apprenticeship</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{$course->time}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" colspan="2" style="text-align: center">started learning</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{$course->date}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" rowspan="5" style="text-align: center">payments</th>
                                </tr>
                                <tr>
                                    <th class="cell2" style="text-align: center">enrollment fee</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{number_format($course->admission_money)}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" style="text-align: center">tuition fee</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{number_format($course->tuition_money)}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" style="text-align: center">other</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{number_format($course->other_money)}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" style="text-align: center">total</th>
                                    @foreach($school['courses'] as $course)
                                        <td class="cell1" colspan="{{5 - count($school['courses'])}}"
                                            width="{{80 / count($school['courses']) .'%'}}"
                                            style="text-align: left">{{number_format($course->other_money + $course->admission_money + $course->tuition_money)}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th class="cell2" colspan="2" style="text-align: center">fee records :</th>
                                    <td class="cell1" colspan="5">
                                        {{number_format($school['courses'][0]->record_money)}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
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
                                                                              class="over"></a><strong> Home</strong></li>
                    <li><a href="{{url(route('front_home'))}}">{{config('global.front_school_title')}}</a></li>
                    <li><a href="{{url(route('front_area',['name' => $school['locality_name'],'id' => $school['locality_id']]))}}">{{$school['locality_name']}}</a></li>
                    <li>{{strtolower($school['name_en'])}}</li>
                </ul>
                <!-- //▼CONTENT▼// -->
                <div id="contents" class="clearfix">

                    <!-- //▼MAIN AREA▼// -->
                    <div id="mainArea">

                        <table id="table-details">
                            <tbody>
                            <tr>
                                <th class="cell2">Name</th>
                                <td class="cell1">{{ucwords(strtolower($school['name_en']))}}</td>
                                <th class="cell2">Name Japanese</th>
                                <td class="cell1">{{ucwords(strtolower($school['name_jp']))}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">zip code</th>
                                <td class="cell1">{{$school['zip_code']}}</td>
                                <th class="cell2">city</th>
                                <td class="cell1">{{$school['city_name']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">fax</th>
                                <td class="cell1">{{$school['fax']}}</td>
                                <th class="cell2">Phone</th>
                                <td class="cell1">{{$school['phone']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Address 1</th>
                                <td class="cell1" colspan="3">{{$school['address1']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Address 2</th>
                                <td class="cell1" colspan="3">{{$school['address2']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Home Number</th>
                                <td class="cell1">{{$school['home']}}</td>
                                <th class="cell2">Email</th>
                                <td class="cell1">{{$school['email']}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Building</th>
                                <td class="cell1">{{$school['building']}}</td>
                                <th class="cell2">Website</th>
                                <td class="cell1"><a href="{{$school['url']}}">{{$school['url']}}</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <table id="table-details">
                            <thead>
                            <tr>
                                <th style="text-decoration: underline; color: #3b9dda">Other Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="cell2">Dormitory</th>
                                <td class="cell1">{{$school['school_details']->dorm_status}}
                                    <br>有 {{$school['school_details']->dorm_money}}
                                    〜円(月額)
                                </td>
                                <th class="cell2">Number Student</th>
                                <td class="cell1">{{$school['school_details']->number_student}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Career Guidance</th>
                                <td class="cell1">{{$school['school_details']->career}}</td>
                                <th class="cell2">About Student</th>
                                <td class="cell1">{{$school['school_details']->about}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Type Test</th>
                                <td class="cell1" colspan="3">{{$school['school_details']->type_test}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Scholarship</th>
                                <td class="cell1">{{$school['school_details']->scholarship}}</td>
                                <th class="cell2" colspan="2">About Japanese</th>

                            </tr>
                            <tr>
                                <th class="cell2">Additional Job</th>
                                <td class="cell1">{{$school['school_details']->overtime}}</td>
                                <td class="cell1" colspan="2">{{$school['school_details']->japanese}}</td>
                            </tr>
                            <tr>
                                <th class="cell2">Staff</th>
                                <td class="cell1">{{$school['school_details']->staff}}</td>
                                <th class="cell2">Number Country</th>
                                <td class="cell1">{{$school['school_details']->number_country}}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if(count($school['courses']) > 0)
                            <table id="table-details">
                                <thead>
                                <tr>
                                    <th style="text-decoration: underline; color: #3b9dda">Courses</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class="cell2" rowspan="2" style="text-align: center">certification course</th>
                                    <th class="cell2" rowspan="2" style="text-align: center">Apprenticeship period</th>
                                    <th class="cell2" rowspan="2" style="text-align: center">Day started learning</th>
                                    <th class="cell2" colspan="4" style="text-align: center">Payments</th>
                                </tr>
                                <tr>
                                    <th class="cell2" style="text-align: center">enrollment fee</th>
                                    <th class="cell2" style="text-align: center">tuition fee</th>
                                    <th class="cell2" style="text-align: center">Other</th>
                                    <th class="cell2" style="text-align: center">Total</th>
                                </tr>
                                @foreach($school['courses'] as $course)
                                    <tr>
                                        <td class="cell1">{{$course->name}}</td>
                                        <td class="cell1">{{$course->time}}</td>
                                        <td class="cell1">{{$course->date}}</td>
                                        <td class="cell1">{{number_format($course->admission_money)}}</td>
                                        <td class="cell1">{{number_format($course->tuition_money)}}</td>
                                        <td class="cell1">{{number_format($course->other_money)}}</td>
                                        <td class="cell1">{{number_format($course->other_money + $course->admission_money + $course->tuition_money)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="cell2">
                                        fee records :
                                    </td>
                                    <td class="cell1" colspan="6">
                                        {{number_format($school['courses'][0]->record_money)}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
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