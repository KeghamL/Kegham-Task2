@extends('admin.layout')

@section('content')
    @foreach ($services as $service)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>
                        <form action="{{ route('destroy-service', $service->id) }}" method="POST">
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
