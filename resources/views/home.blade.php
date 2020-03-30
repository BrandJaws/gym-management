<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<section class="gymSection">
    <div class="logo">
        <img alt="Logo" src="{{asset('assets/media/logos/logo1.png')}}" />
        <h2>Let Zumba Fitness Gym Software for billing take the worry out of getting paid</h2>
        <p>Here are the most widely recognized fitness terms clarified so you can turn into a specialist in exercise center language in a matter of seconds?</p>
    </div>
    <div class="links">
        <h1>Login As</h1>
        <ul>
            <li><a href="{{asset(url('/admin/login'))}}">Admin</a></li>
            <li><a href="{{asset(url('/gym/login'))}}">Employee</a></li>
            <li><a href="{{asset(url('/member/login'))}}">Member</a></li>
            <li><a href="{{asset(url('/trainer/login'))}}">Trainer</a></li>
        </ul>
    </div>
</section>

</body>
</html>
