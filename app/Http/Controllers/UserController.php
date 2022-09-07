<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\About;
use App\Models\Event;
use App\Models\Massege;
use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use App\Notifications\SendNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserController extends Controller
{
    public function main()
    {
        $abouts = About::first();
        $services = Service::all();
        $events = Event::all();
        // dd($abouts);
        return view('main', compact('abouts', 'services', 'events'));
    }


    public function registration()
    {

        return view('auth.register');
    }


    public function login()
    {

        return view('auth.login');
    }

    public function registerUser(Request $request)
    {

        $request->validate([

            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:8',
            'repassword' => 'required|same:password',
            'birthday' => 'required|before:5 years ago',
            'gender' => 'required'

        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $res = $user->save();
        if ($res == true) {

            $admins = User::where('role_as', 1)->get();
            Notification::send($admins, new SendNotification($user));


            return redirect('login')->with('success', 'User Registered Successfully!');
        } else {
            return back()->with('fail', 'Something Went Wrong!');
        }
    }

    public function loginUser(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        auth()->attempt($request->only(['email', 'password']));

        if ($user = auth()->user()->role_as == '1') {
            $messages = Massege::count();
            $services = Service::count();
            $bookings = Book::count();
            $events = Event::count();
            $payments = Payment::count();
            $users = User::count();
            // $admins = User::where('role_as' , '=' , '1')->count();
            return view('admin.dashboard', compact('messages', 'services', 'bookings', 'events', 'users', 'payments'))->with('success', 'Welcome to Admin Dashboard!');
        } elseif (!Auth::user() && empty(auth()->user()->role_as == '0')) {
            return back()->with('fail', 'No User With This E-mail ');
        }
        // elseif($user()->isEmpty()){
        //     return back()->with('fail', 'No User With This E-mail ');
        // }
        elseif ($user = auth()->user()->role_as == '0') {
            return redirect('/')->with('success', 'Logged In Successfully!');
        } else {
            return back()->with('fail', 'Password Didnt Match!');
        }
    }

    public function userInfo()
    {
        $user = auth()->user();
        return view('auth.userinfo', compact('user'));
    }

    public function changepassword()
    {
        return view('auth.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'newconfirmedpassword' => 'required|same:newpassword'
        ]);

        if (!Hash::check($request->oldpassword, auth()->user()->password)) {

            return redirect('/login')->with('fail', 'Old Password Does not Match!');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return redirect('/login')->with('success', 'Password Changed Successfully!');
    }

    public function message(Request  $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $message = new Massege();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $res = $message->save();

        if ($res == true) {

            return back()->with('success', 'Message Delivered Successfully!');
        } else {
            return back()->with('fail', 'Something Went Wrong');
        }
    }

    public function history()
    {
        $books = Book::all();
        return view('auth.bookinghistory', compact('books'));
    }

    public function cancelbook(Request $request, Book $book)
    {
        $book->delete();
        return back()->with('success', 'Booking Canceled Successfully');
    }

    public function payment()
    {
        $books = Book::first();
        return view('auth.payment', compact('books'));
    }

    public function paymentprocess(Request $request, Book $book)
    {
        $request->validate([
            'book_id' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'cardname' => 'required',
            'expdate' => 'required',
        ]);

        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->book_id = $request->book_id;
        $payment->fullname = $request->fullname;
        $payment->email = $request->email;
        $payment->address = $request->address;
        $payment->city = $request->city;
        $payment->cardname = $request->cardname;
        $payment->cardnumber = $request->cardnumber;
        $payment->expdate = $request->expdate;
        $res = $payment->save();
        if ($res == true) {
            return redirect('/')->with('success', 'Your Payment Is Done!');
        } else {
            return back()->with('fail', 'There Is Something Wrong!');
        }
    }



    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('login')->with('success', 'You Logged Out!');
    }
}
