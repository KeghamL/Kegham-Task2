@extends('admin.layout')

@section('content')
{{-- <style>
    table, th, td {
      border:1px solid black;
    }
</style> --}}
@foreach ($books as $book )

    <table class="table">
        <thead>
            <th>Name</th>
            <th>E-Mail</th>
            <th>ServiceName</th>
            <th>ServicePrice</th>
            <th>GuestNumber</th>
            <th>DateFrom</th>
            <th>DateTo</th>
            <th>Event</th>
            <th>Status</th>
        </thead>
        <tbody>

            <tr>
                <td>{{ $book->user->fname }}</td>
                <td>{{ $book->user->email }}</td>
                <td>{{ $book->service->name }}</td>
                <td>{{ $book->service->price }}</td>
                <td>{{ $book->guests }}</td>
                <td>{{ $book->datefrom }}</td>
                <td>{{ $book->dateto }}</td>
                <td>{{ $book->event }}</td>
                <td>{{ $book->status }}</td>
                <td>
                   <a class="btn btn-success" href=" /adminapprove/{{ $book->id }}">Approved</a>
                </td>
                <td>
                    <a class="btn btn-danger" href=" /admincancel/{{ $book->id }}">Canceled</a>
                 </td>
            </tr>

        </tbody>
    </table>

@endforeach
    </body>

    </html>
@endsection
