<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Banquet Booking System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
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

<body>



    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i
                    class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
            <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ABOUT</a>
            <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SERVICES</a>
            <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MAIL-US</a>
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




    <!-- Navbar on small screens-->
    <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top"
        style="margin-top:46px">
        <a href="#band" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ABOUT</a>
        <a href="#tour" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">SERVICES</a>
        <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MAIL-US</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MY ACCOUNT</a>
    </div>




    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">




        <!-- Automatic Slideshow Images -->
        <div class="mySlides w3-display-container w3-center">
            <img src="https://images.squarespace-cdn.com/content/v1/55e89347e4b04b81f1f025da/1566596127200-PKII7W3O12FXMMCZGIPI/image-asset.jpeg?format=1500w"
                style="width:100%" , height="700px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                {{-- <h3>Armenia</h3>
                <p><b>In Armenia We Have Many Beautiful Places To Offer.</b></p> --}}
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="https://wallpaperaccess.com/full/6402231.jpg" style="width:100%" , height="700px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                {{-- <h3>Syria</h3>
                <p><b>In Syria We Have Very Coltural Places.</b></p> --}}
            </div>
        </div>
        <div class="mySlides w3-display-container w3-center">
            <img src="https://i.pinimg.com/originals/11/aa/4b/11aa4b40a7e0f41c480a5b8527d83d7c.jpg" style="width:100%" ,
                height="700px">
            <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                {{-- <h3>Lebanon</h3>
                <p><b>In Lebanon We Have the Best Dj.</b></p> --}}
            </div>
        </div>





        <!-- The About Us Section -->
        <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
            <h2 class="w3-wide">ABOUT US</h2>
            <p class="w3-opacity"><i>We love Weddings</i></p>
            @if (!empty($abouts))
                <p class="w3-justify">{{ $abouts->about }}</p>
            @endif
            <div class="w3-row w3-padding-32">
                <div class="w3-third">
                    <p>We Have DJs</p>
                    <img src="https://imageio.forbes.com/blogs-images/zackomalleygreenburg/files/2017/08/0731_lb-dj-marshmello_1200x630.jpg?format=jpg&width=1200"
                        class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>We Have Photographers</p>
                    <img src="https://dvyvvujm9h0uq.cloudfront.net/com/articles/1543483387-reinhart-julian-1145947-unsplash.jpg"
                        class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
                </div>
                <div class="w3-third">
                    <p>We Have Kareoke Nights</p>
                    <img src="https://s3.amazonaws.com/ht-images.couchsurfing.com/u/1002627961/f5cb1b63-7e4d-4dd1-97b8-403d08acb81c"
                        class="w3-round" alt="Random Name" style="width:60%">
                </div>
            </div>
        </div>





        <!-- The Services Section -->
        <div class="w3-black" id="tour">
            <div class="w3-container w3-content w3-padding-64" style="max-width:80%">
                <h2 class="w3-wide w3-center">SERVICES</h2>
                <p class="w3-opacity w3-center"><i>BOOK ANY SERVICE YOU WANT!-+</i></p><br>
                <div class="row d-flex align-items-center justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-lg-4 w3-container w3-white"
                            style="width:300px; margin:20px; border-radius:2px;padding:20px;">
                            <input type="hidden" name="service_id" id="service_id" value="{{$service->id}}" readonly>
                            <p><b>{{ $service->name }}</b></p>
                            <p class="w3-opacity">{{ $service->price }}$</p>
                            <p>{{ $service->description }}</p>
                            @if (Auth::check())
                          <button class="w3-button w3-black w3-margin-bottom" data-id="{{$service->id}}"
                                onclick="openModal(this)">BOOK</button>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>



    <!-- Booking Section -->
    <div id="ticketModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal w3-center w3-padding-32">
                <span onclick="document.getElementById('ticketModal').style.display='none'"
                    class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
                <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
            </header>
            <div class="w3-container">
                <form action="/booking " method="POST">
                    @csrf
                    <input id="modal-service_id" type="text" name="service_id" hidden>
                    <p><label><i class="fa fa-shopping-cart"></i>Number of Guests:</label></p>
                    <input class="w3-input w3-border" name="guests" type="text" placeholder="">
                    <p><label><i class="fa fa-user"></i>Booking From:</label></p>
                    <input class="w3-input w3-border" name="datefrom" type="date" placeholder="">
                    <p><label><i class="fa fa-user"></i>Booking To:</label></p>
                    <input class="w3-input w3-border" name="dateto" type="date" placeholder="">
                    <p><label><i class="fa fa-user"></i>Event Type:</label></p>
                    <select class="w3-input w3-border" name="event">
                        @foreach ($events as $event)
                            <option value="{{ $event->event }}">{{ $event->event }}</option>
                        @endforeach
                    </select>
                    <p><label><i class="fa fa-user"></i>Message:</label></p>
                    <input class="w3-input w3-border" name="message" type="text" placeholder="">
                    <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i
                            class="fa fa-check"></i></button>
                </form>
                <button class="w3-button w3-red w3-section"
                    onclick="document.getElementById('ticketModal').style.display='none'">Close <i
                        class="fa fa-remove"></i></button>
            </div>
        </div>
    </div>





    <!-- The Contact Section -->
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
        <h2 class="w3-wide w3-center">CONTACT US</h2>
        <p class="w3-opacity w3-center"><i>Fan? Drop a note!</i></p>
        <div class="w3-row w3-padding-32">
            @if (!empty($abouts))
                <div class="w3-col m6 w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker" style="width:30px"></i>{{ $abouts->location }}<br>
                    <i class="fa fa-phone" style="width:30px"></i>{{ $abouts->phone }}<br>
                    <i class="fa fa-envelope" style="width:30px"> </i>{{ $abouts->email }}<br>
                </div>
            @endif
            <div class="w3-col m6">
                <form action="{{ route('sendmessage') }}" method="POST">
                    @csrf
                    <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Name" required
                                name="name">
                        </div>
                        <div class="w3-half">
                            <input class="w3-input w3-border" type="text" placeholder="Email" required
                                name="email">
                        </div>
                    </div>
                    <input class="w3-input w3-border" type="text" placeholder="Message" required name="message">
                    <button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
    </div>




    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge mt-auto">
        <a href="https://www.facebook.com/" style="color: navy"><i
                class="fa fa-facebook-official w3-hover-opacity"></i></a>
        <a href="https://www.instagram.com/" style="color: purple"><i
                class="fa fa-instagram w3-hover-opacity"></i></a>
        <a href="https://www.snapchat.com/" style="color: yellow"><i class="fa fa-snapchat w3-hover-opacity"></i></a>
        <a href="https://www.pinterest.com/" style="color: red"><i
                class="fa fa-pinterest-p w3-hover-opacity"></i></a>
        <a href="https://twitter.com/?lang=en" style="color: blue"><i class="fa fa-twitter w3-hover-opacity"></i></a>
        <a href="https://www.linkedin.com/" style="color: green"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
        <p class="w3-medium">&copy; Copyright 2022 , Online Banquet Booking.</p>
    </footer>


    <!-- JavaScript Section -->


    <script>
        // Automatic Slideshow - change image every 4 seconds
        var myIndex = 0;
        carousel();

        function openModal(e) {
            document.getElementById('ticketModal').style.display='block'
            document.getElementById('modal-service_id').value = e.getAttribute('data-id')
        }

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 4000);
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function myFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // When the user clicks anywhere outside of the modal, close it
        var modal = document.getElementById('ticketModal');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

{{-- <script>
    $('.accept-btn').on('click', function() {
    var service_id = $(this).data('id');
    alert(service_id);
});
</script> --}}

</body>

</html>
