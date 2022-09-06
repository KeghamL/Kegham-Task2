@extends('admin.layout')

@section('content')
    @foreach ($events as $event)
        <table class="table">
            <thead>
                <th>Event Type</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $event->event }}</td>
                    <td>
                        <form action="{{ route('destroy-event', $event->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
    @endforeach
    </tbody>

    </table>

    </body>

    </html>
@endsection
