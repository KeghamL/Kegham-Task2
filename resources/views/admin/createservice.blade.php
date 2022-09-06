@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Services</h2>

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



    <form action="/addservice" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Service Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="" value="">

                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Service Description:</strong>

                    <input type="text" name="description" class="form-control" placeholder="" value="">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Service Price:</strong>

                    <input type="text" name="price" class="form-control" placeholder="" value="">

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Save</button>

            </div>

        </div>



    </form>
@endsection
