<div>
    <p>Info account</p>
    <p><strong>Name : </strong> {{$user['name']}}</p>
    <p><strong>Email : </strong> {{$user['email']}}</p>
</div>
Click here to active your account: <a
        href="{{ $link = url('admin/active_account',[$user['id'], $user['activation_code']])}}"> {{ $link }} </a>