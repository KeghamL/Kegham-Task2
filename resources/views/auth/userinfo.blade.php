@extends('auth.layout')

@section('content')
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
            </tr>
        </tbody>
    </table>

    </body>

    </html>
@endsection
