@extends('auth.layout')

@section('content')

    <div class="container" style="width: 400px">
        @if ($errors->any())
            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.<br><br>

                <ul>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif
        <div class="row">
            <div class="text-center" style="margin-top: 20px">
                <h3>Registration</h3>
                <hr>
            </div>
            <form action="{{ route('register-user') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="form-group">
                    <label for="fname">FirstName:</label>
                    <input type="text" class="form-control" placeholder="Enter Your FirstName" name="fname"
                        value="{{ old('fname') }}">
                </div>

                <div class="form-group">
                    <label for="lname">LastName:</label>
                    <input type="text" class="form-control" placeholder="Enter Your LastName" name="lname"
                        value="{{ old('lname') }}">
                </div>

                <div class="form-group">
                    <label for="email">E-Mail:</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                        value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password" name="password"
                        value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <label for="repassword">Confirm Password:</label>
                    <input type="password" class="form-control" placeholder="Repeat Your Password" name="repassword"
                        value="{{ old('repassword') }}">
                </div>

                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" class="form-control" placeholder="Enter Your Birthday" name="birthday"
                        value="{{ old('birthday') }}">
                </div>


                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female">Female
                </div>

                <P>Your Registered Allready? LogIn<a href='login'>Here</a></P>

                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>
    </body>

    </html>
@endsection
