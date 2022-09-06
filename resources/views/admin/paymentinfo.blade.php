@extends('admin.layout')

@section('content')
{{-- <style>
    table, th, td {
      border:1px solid black;
    }
</style> --}}
@foreach ($payments as $payment )
    <table class="table">
        <thead>
            <th>Book-id</th>
            <th>FullName</th>
            <th>E-Mail</th>
            <th>Address</th>
            <th>City</th>
            <th>Card-Name</th>
            <th>Card-Number</th>
            <th>Expire-Date</th>
        </thead>
        <tbody>

            <tr>
                <td>{{$payment->book_id }}</td>
                <td>{{$payment->fullname}}</td>
                <td>{{$payment->email}}</td>
                <td>{{$payment->address}}</td>
                <td>{{$payment->city}}</td>
                <td>{{$payment->cardname}}</td>
                <td>{{$payment->cardnumber}}</td>
                <td>{{$payment->expdate}}</td>

                <td>
                    <form action="{{ route('payment-destroy', $payment->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">DeletePayment</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
@endforeach
    </body>

    </html>
@endsection
