<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym Management System</title>
    <link rel="shortcut icon" href="{{asset('assets/media/logos/logo1.jpg')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<section class="gymSection">
    <div class="frontSection">
        <div class="logo">
            <img alt="Logo" src="{{asset('assets/media/logos/brandjaws.png')}}" />
            <h2>BrandJaws Gym Software</h2>
            <p>BrandJaws has been recognized internationally on multiple platforms across the continents in collaboration with numerous IT markets, experiencing the diversity of clients globally. To facilitate the international clients we will soon be extending our network on global level.</p>
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
    </div>
</section>

</body>
</html>
