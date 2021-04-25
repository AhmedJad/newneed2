<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        /*********************** start header *************************/
        nav {
            background-color: #032541 !important;
        }

        nav ul li a {
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        nav ul li {
            margin-left: 15px;
        }

        nav .fas,
        nav p {
            color: white;
            font-size: 20px;
            padding-right: 20px;
            align-items: center;
            margin-top: 20px;
        }



        ul li .dropdown-item {
            color: #032541 !important;
        }

        nav ul li a:hover {
            color: darkgrey;
        }

        .dropdown-menu li a:hover {
            cursor: pointer;
        }

        /**************************** end header ***********************/

        .fa-1x {
            font-size: 50px;
            margin-top: 0 !important;
            padding: 7px 17px 5px;
        }

        .navbar-toggler.toggler-example {
            cursor: pointer;
        }


        .navbar-toggler {
            border: none !important;
            outline: none !important;

            text-align: center;

        }


        .logo text {
            font-weight: bold;
            font-size: 40px;

        }


        .fas:hover {
            cursor: pointer;
            color: darkgrey;
        }

        /*.fa-shopping-cart{
        position: relative;
        margin-top: 30px !important;
        margin-left: 7px;
        }
        .cart{
        position: absolute;
        top: 0;
        margin-top: 12px !important;
        margin-left: 12px;
        
        }*/
        .container-fluid {
            background-color: #031E36;
        }

        .col-sm-3 h5,
        .col-sm-2 p {
            color: white;
            margin: 0;
            padding: 0;
        }

        .col-sm-3 p {
            color: whitesmoke;
        }

        .footerLogo text {
            font-weight: bold;
            font-size: 55px;
        }

        @media (min-width:992px) and (max-width:1340px) {
             .footerLogo  text {
                font-size: 35px;
            }
        }

        .icons .fab {
            padding: 10px;
            font-size: 20px;
            opacity: 0.5;
            transition: 0.5s;
        }

        .icons .fab:hover {
            opacity: 1;
            transform: translateY(-5px);
            cursor: pointer;
        }

    </style>
    @stack('user-login-style')
    @stack('user-register-style')
    @stack('user-home-style')
    @stack('user-product-style')
    @stack('user-cart-style')
</head>
<body>
    @include('layouts.user.header')
    @yield('content')
    @include('layouts.user.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2e646d6873.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2e646d6873.js" crossorigin="anonymous"></script>
    @stack('user-product-js')
</body>
</html>
