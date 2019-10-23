<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>訂飲料</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/nav.css">

    @yield('head')

</head>
<body>
    <!-- header -->
    <div id="bgHeader" class="container-fluid" style="background:url('/image/menuBg.jpg');height:85px">

        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="/home/index"> <img class="mt-1 mr-5 mb-3" src="/image/logo_h.png"
                    style="height:56px"></a>

            <button id="myButton" class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ">
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/news">新品推薦</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/order">線上訂飲料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/shop">我的飲料</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/check">飲料訂單</a>
                    </li>
                    @if(isset($_SESSION['userID']))
                    <!-- <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/logout">登出</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">你好，{{$emp->cName}} </a>
                        <div class="dropdown-menu" style="background:url('/image/menuBg.jpg')">
                        <a class="dropdown-item" href="#">修改會員資料</a>
                        <a class="dropdown-item" href="#">我的優惠</a>
                        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/home/logout">登出</a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="/home/login">登入</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')

    <div class="container-field" id="footer"></div>

    <script src="/js/nav.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>