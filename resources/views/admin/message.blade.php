@extends('admin.layout')

@section('content')
    @foreach ($messages as $message)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Message</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    <td>
                        <form action="{{ route('message-delete', $message->id) }}" method="POST">
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
