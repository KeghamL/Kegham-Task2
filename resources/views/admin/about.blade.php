@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>About Us</h2>

            </div>

        </div>

    </div>



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



    <form action="/createabout" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>About-Us:</strong>

                    <input type="text" name="about" class="form-control" placeholder="" value="">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Location:</strong>

                    <input type="text" name="location" class="form-control" placeholder="" value="">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Phone Number:</strong>

                    <input type="text" name="phone" class="form-control" placeholder="" value="">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>E-Mail:</strong>

                    <input type="text" name="email" class="form-control" placeholder="" value="">

                </div>

            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Save</button>

            </div>

        </div>



    </form>
@endsection
