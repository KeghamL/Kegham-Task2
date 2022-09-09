<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
</head>

<style>
    img {
        width: 230px;
        height: 155px;
        border-radius: 7px;
    }

    .badge {
        font-size: 20px;
        position: absolute;
        left: 245px;
        bottom: 155px
    }
</style>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <h3 style="color: white">ADMIN PAGE</h3>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="/dashboardpage">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Events</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="/createevent">Create Event</a>
                            </li>
                            <li>
                                <a href="/deleteevent">Remove Event</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#page1Submenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Bookings</a>
                        <ul class="collapse list-unstyled" id="page1Submenu">
                            <li>
                                <a href="/showbook"> New Booking</a>
                            </li>
                            <li>
                                <a href="/adminbook">Approved/Cancelled</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Services</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="createservice">Add Service</a>
                            </li>
                            <li>
                                <a href="deleteservice">Delete Service</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/message">Messages</a>
                    </li>
                    <li>
                        <a href="/about">About-Us</a>
                    </li>
                    <li>
                        <a href="/search">Search</a>
                    </li>
                    <li>
                        <a href="/paymentinfo">Payment-Info</a>
                    </li>
                </ul>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btnnew">LOGOUT</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="py-12">
                <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if (!empty($unreadNotifications))
                                @forelse (auth()->user()->unreadNotifications as $notification)
                                @endif
                                @if ($notification->type == 'App\Notifications\BrandNewNotification')
                                    <div class="bg-light text-dark  p-2 m-3 ">
                                        <b>{{ $notification->data['fname'] }}
                                            ({{ $notification->data['email'] }})
                                        </b>
                                        Registered In
                                        Your
                                        Website!!
                                        <a href="{{ route('markasread', $notification->id) }}"
                                            class="p-2 bg-red-400 text-danger rounded-lg">MarkAsRead</a>
                                    @elseif ($notification->type == 'App\Notifications\MessageNewNotification')
                                        <div class="bg-light text-dark  p-2 m-3 ">
                                            You Have A New Message Send By
                                            <b>({{ $notification->data['name'] }})
                                            </b>
                                            <a href="{{ route('markasread', $notification->id) }}"
                                                class="p-2 bg-red-400 text-danger rounded-lg">MarkAsRead</a>
                                        @elseif ($notification->type == 'App\Notifications\PaymentNotification')
                                            <div class="bg-light text-dark  p-2 m-3 ">
                                                User<b>({{ $notification->data['fullname'] }})</b> From
                                                <b>({{ $notification->data['city'] }})
                                                </b>
                                                Has Purhcased A New Service!!
                                                <a href="{{ route('markasread', $notification->id) }}"
                                                    class="p-2 bg-red-400 text-danger rounded-lg">MarkAsRead</a>
                                @endif

                            @empty
                                You Dont Have Any Notification!
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $services }}</span>
                        <a href="/deleteservice"> <img
                                src="https://thumbs.dreamstime.com/b/conceptual-hand-writing-showing-our-services-concept-meaning-occupation-function-serving-intangible-products-male-wear-160644151.jpg">
                        </a>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $messages }}</span>
                        <a href="/message"><img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGS-oYo9h09L_M33hu-shr5k7QwcD1bEpIEQ&usqp=CAU">
                    </div>
                </div>



                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $bookings }}</span>
                        <a href="/showbook"><img
                                src="https://www.vanroey.be/wp-content/uploads/Microsoft-Bookings.jpg">

                    </div>
                </div>



                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $events }}</span>
                        <a href="/deleteevent"><img
                                src="https://circulareconomy.europa.eu/sites/all/themes/cecon_theme/images/events.jpg">

                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $payments }}</span>
                        <a href="/paymentinfo"><img
                                src="https://tap2pay.me/wp-content/uploads/2019/11/payment-methods-with-circle_23-2147674741-1-750x423@2x.jpg">
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card-body">
                        <span class="badge badge-danger">{{ $users }}</span>
                        <a href="/users"><img
                                src="https://www.prajwaldesai.com/wp-content/uploads/2021/02/Find-Users-Last-Logon-Time-using-4-Easy-Methods.jpg">
                    </div>
                </div>

            </div>
        </div>



        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

</body>

</html>
