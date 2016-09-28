<!DOCTYPE html>
<html>
<head>
    <title>reset password - admin site</title>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- styles -->
    <link href="{{url('asset/admin/css/styles.css')}}" rel="stylesheet">
    <![endif]-->
</head>
<body class="login-bg">
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">School Site</a></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 col-md-offset-4">
            <div class="login-wrapper">
                <div class="box">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                        </div>
                    @endif
                    <div class="content-wrap">
                        <form method="post" action="{{route('reset_password',['id' => $user->id,'code' => $user->forgotten_password_code])}}">
                            <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                            <i class="left">set new your password, Note : password need more than 5 chars.</i>
                            <input class="form-control" name="password" type="password" placeholder="Password">
                            <input class="form-control" name="password_confirmation" type="password" placeholder="Password Confirm">
                            <div class="action">
                                <button type="submit" class="btn btn-primary signup">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<script src="{{url('asset/admin/js/custom.js')}}"></script>
</body>
</html>