@extends('admin.layout')

@section('content')
@foreach ($users as $user)
    <table class="table">
        <thead>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Birthday</th>
            <th>Gender</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->fname }}</td>
                <td>{{ $user->lname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                    <form action="{{ route('remove-users', $user->id) }}" method="POST">
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
