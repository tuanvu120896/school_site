<div class="container">
    <div class="row">
        <div class="col-md-5">
            <!-- Logo -->
            <div class="logo">
                <h1><a href="{{route('dashboard')}}">School Site</a></h1>
            </div>
        </div>

        <div class="col-md-3 col-sm-3 pull-right" >
            <div class="navbar navbar-inverse" role="banner">
                <nav class=" navbar-collapse bs-navbar-collapse navbar-right" role="">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                                <li><a href="{{route('profile_view')}}"><i class="glyphicon glyphicon-dashboard"></i> Profile</a></li>
                                <li><a href="{{route('profile_edit')}}"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
                                <li><a href="{{route('admin_logout')}}"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
