<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Banquet Booking System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            font-family: "Lato", sans-serif;
            margin-top: 50px;
        }

        .mySlides {
            display: none;
        }

        a {
            text-decoration: none;
        }

        .btnnew {
            background-color: black;
            border: none;
            color: white;
            padding-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            float: right;
            cursor: pointer;
        }

        .btnnew:hover {
            color: red;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="/" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="/#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
            <a href="/#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SERVICES</a>
            <a href="/#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MAIL-US</a>
            @if (Auth::check())
                <div class="w3-dropdown-hover w3-hide-small">
                    <button class="w3-padding-large w3-button" title="More">MY ACCOUNT <i
                            class="fa fa-caret-down"></i></button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="/userinfo" class="w3-bar-item w3-button">PROFILE</a>
                        <a href="/history" class="w3-bar-item w3-button">BOOKING HISTORY</a>
                        <a href="/changepassword" class="w3-bar-item w3-button">CHANGE PASSWORD</a>
                    </div>
                </div>
            @endif
            @if (!Auth::check())
                <a href="/login" class="w3-padding-large w3-hover-red w3-hide-small w3-right">LOGIN</a>
                <a href="/register" class="w3-padding-large w3-hover-red w3-hide-small w3-right">REGISTER</a>
            @else
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btnnew">LOGOUT</button>
                </form>
            @endif
        </div>
    </div>
    </div>


    <div class="container">
        @yield('content')
    </div>

    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge mt-auto">
        <a href="https://www.facebook.com/" style="color: navy"><i
                class="fa fa-facebook-official w3-hover-opacity"></i></a>
        <a href="https://www.instagram.com/" style="color: purple"><i class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://www.snapchat.com/" style="color: yellow"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
        <a href="https://www.pinterest.com/" style="color: red"><i class="fa fa-pinterest-p w3-hover-opacity"></i></a>
        <a href="https://twitter.com/?lang=en" style="color: blue"><i class="fa fa-twitter w3-hover-opacity"></i></a>
        <a href="https://www.linkedin.com/" style="color: green"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        <p class="w3-medium">&copy; Copyright 2022 , Online Banquet Booking.</p>
    </footer>

</body>

</html>
