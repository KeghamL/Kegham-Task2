@extends('admin.layout')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <!DOCTYPE html>
 <html lang="en">

<head>
     <meta charset="UTF-8">
     <title>Search - Bootstrap 4</title>
     <meta name="description" content="Search - Bootstrap 4">
     <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     <style>
     /*20px padding-Just to be well visible here*/
         #searchForm {
          padding: 20px;

        }

        #searchForm{
    display: absolute;
    width: 100%;
    margin-left: 11%;
    margin-top: 70px;
}

#searchForm .form-row .col {
  margin: 0;
  padding: 0;
}
#searchForm .form-row button, #searchForm .form-row input {
  border: 1px solid #DBDBDB;
  border-radius: 0;
  margin: 0;
}
#searchForm .form-row input {
  border-right: 0px;
  width: 750px;
}
/* #searchForm .form-row button {
  width: 50px;
} */
#searchForm .form-row button i{
 color: #FFFFFF;
}
#searchForm .form-row button:hover{
    background: #2ED654 !important;
}

.form-control:focus,
.btn:focus {
    border-color: none !important;
    box-shadow: none !important;
}

     </style>
 </head>

 <body>

         <div id="searchForm">
            <div class="container">
              <div class="row">
                <form class="form-row" id="search-form" action="/searchbook" method="GET">
                    @csrf
                <div class="col">
                  <input class="form-control" type="text" id="search" name="find" placeholder="Search Here..">
                <div id="searchlist"></div>
                </div>
            </div>
                <div class="col">
                  <button class="btn btn-success" type="submit" style="position: relative; bottom: 38px; left:710px;">Search</i></button>
                </div>
              </form>

            </div>
          </div>
          </div>


{{-- Ajax-LiveSearch --}}

          {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
          <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
          <script>
              $(document).ready(function() {
                  src = "{{ route('search-book') }}";
                  $("#search").autocomplete({
                      source: function(request, response) {
                          $.ajax({
                              url: src,
                              data: {
                                  term: request.term
                              },
                              dataType: "json",
                              success: function(data) {
                                  response(data);
                              }
                          });
                      },
                      minlenght: 1,
                  });

                  $(document).on('click', '.ui-menu-item', function() {
                      $('#search-form').submit();
                  });
              });
          </script> --}}
 </body>

 </html>
@endsection
