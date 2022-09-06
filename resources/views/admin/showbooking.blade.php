@extends('admin.layout')

@section('content')
    {{-- <style>
    table, th, td {
      border:1px solid black;
    }
</style> --}}
    @foreach ($books as $book)
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
                    <td>{{ $book->user->fname ?? 'unknown' }}</td>
                    <td>{{ $book->user->email ?? 'unknown' }}</td>
                    <td>{{ $book->service->name ?? 'unknown' }}</td>
                    <td>{{ $book->service->price ?? 'unknown' }}</td>
                    <td>{{ $book->guests ?? 'unknown' }}</td>
                    <td>{{ $book->datefrom ?? 'unknown' }}</td>
                    <td>{{ $book->dateto ?? 'unknown' }}</td>
                    <td>{{ $book->event ?? 'unknown' }}</td>
                    <td>{{ $book->status ?? 'unknown' }}</td>
                    <td>
                        <form action="{{ route('cancel-book', $book->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">DeleteBooking</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    @endforeach
    </body>

    </html>
@endsection
