@extends('auth.layout')

@section('content')
{{-- <style>
    table, th, td {
      border:1px solid black;
    }
</style> --}}
@foreach ($books as $book )
@if (isset(auth()->user()->id) && auth()->user()->id == $book->user_id)

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
                    <form action="{{ route('cancel-book', $book->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">CancelBooking</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
@endif

@endforeach
    </body>

    </html>
@endsection
