<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('/css')}}/panel.css">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/all.min.css">
    <link rel="stylesheet" href="{{URL::asset('/css')}}/alertify.min.css"/>
    <link rel="stylesheet" href="{{URL::asset('/css')}}/persian-datepicker.min.css">
    <script src="{{URL::asset('/js')}}/alertify.min.js"></script>
    <script src="{{URL::asset('/js')}}/jquery.min.js"></script>
    <script src="{{URL::asset('/js')}}/persian-date.min.js"></script>
    <script src="{{URL::asset('/js')}}/persian-datepicker.min.js"></script>
</head>
<body>
    <div class="top-navbar">
        <i style="float:right;margin-top:5px;font-size:20px;border:1px solid black;padding:7px 10px;border-radius:20px;" class="fa fa-bars m-menu"></i>
        <span class="date">امروز {{\Morilog\Jalali\Jalalian::forge('today')->format('%A, %d %B %Y');}}</span>
        <div class="user">
            <span>
                <i class="fa fa-angle-down"></i>
                {{Auth::user()['name']}}
            </span>
            <div class="user_menu">
                <a href="/" target="_blank">مشاهده سایت <i class="fa fa-globe"></i></a>
                <a href="/admin/user/edit/{{Auth::user()['id']}}">حساب کاربری <i class="fa fa-user"></i></a>
                <a href="/logout">خروج <i class="fa fa-sign-out"></i></a>
            </div>
        </div>
    </div>
    <div class="navbar">
        <div class="logo">
            <img src="{{URL::asset('/img')}}/logo.png" alt="لوگو پنل">
            <h1>پنل مدیریت</h1>
        </div>
        <ul id="menu">
            <li class="active-nav"><a href="/admin">داشبورد</a><i class="fa fa-home"></i></li>
        </ul>
    </div>
    <div class="content">
        <div class="page-title">
            <h2>@yield('title')</h2>
        </div>
        <div class="container">
           @yield('content')
        </div> <!--end container-->
    </div>
</body>
<script>
        @if($errors->any())
    alertify.error('{{$errors->first()}}',30);
    @endif
    @if(session('success'))
    alertify.success('{{session('success')}}',30);
    @endif
    $('.collapase').on('click',function()
    {
        this.classList.toggle('collapse-active');
        var con = this.nextElementSibling;
        con.classList.toggle('submenu-active');
               
    });
    $('.user span').on('click',function()
    {
        var con = this.nextElementSibling;
        $(con).toggleClass('user_menu_show');
    });
    $('.m-menu').on('click',function()
    {
        $('.navbar').toggleClass('m-menu-active');
    })
</script>
</html>