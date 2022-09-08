<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\About;
use App\Models\Event;
use App\Models\Contact;
use App\Models\Massege;
use App\Models\Payment;
use App\Models\Service;
use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AdminController extends Controller
{

    public function dashboardpage()
    {
        $messages = Massege::count();
        $services = Service::count();
        $bookings = Book::count();
        $events = Event::count();
        $payments = Payment::count();
        $users = User::count();
        // $admins = User::where('role_as' , '=' , '1')->count();
        return view('admin.dashboard', compact('messages', 'services', 'bookings', 'events', 'users', 'payments'));
    }


    public function messageinfo()
    {
        $messages = Massege::all();
        return view('admin.message', compact('messages'));
    }

    public function messagedelete(Request $request, Massege  $message)
    {
        $message->delete();
        return back()->with('success', 'Message Deleted Successfully!');
    }

    public function about()
    {

        return view('admin.about');
    }

    public function createabout(Request $request)
    {
        $request->validate([
            'about' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $about = About::find(1);
        $about->about = $request->about;
        $about->location = $request->location;
        $about->phone = $request->phone;
        $about->email = $request->email;
        $res = $about->save();
        if ($res == true) {
            return back()->with('success', 'About-Us is Created!');
        } else {
            return back()->with('fail', 'There is Something Wrong!');
        }
    }

    public function createservice()
    {

        return view('admin.createservice');
    }

    public function addservice(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $res = $service->save();
        if ($res == true) {
            return back()->with('success', 'Service Added Successfully!');
        } else {
            return back()->with('fail', 'Something Went Wrong!');
        }
    }

    public function deleteservice()
    {
        $services = Service::all();
        return view('admin.deleteservice', compact('services'));
    }

    public function destroyservice(Request $request, Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service Deleted Successfully!');
    }

    public function createevent()
    {

        return view('admin.createevent');
    }

    public function deleteevent()
    {
        $events = Event::all();
        return view('admin.deleteevent', compact('events'));
    }

    public function addevent(Request $request)
    {
        $request->validate([
            'event' => 'required',
        ]);

        $event = new Event();
        $event->event = $request->event;
        $res = $event->save();
        if ($res == true) {
            return back()->with('success', 'Event Added Successfully!');
        } else {
            return back()->with('fail', 'Something Went Wrong!');
        }
    }

    public function destroyevent(Request $request, Event $event)
    {
        $event->delete();
        return back()->with('success', 'Event Deleted Successfully!');
    }

    public function book(Request $request)
    {
        $request->validate([
            'guests' => 'required|numeric',
            'datefrom' => 'required|date',
            'dateto' => 'required|date',
            'event' => 'required',
            'message' => 'required'
        ]);

        // $input = $request->all();

        // $input['user_id'] = auth()->user()->id;

        // Book::create($input);

        // return redirect()->route('login-user')
        //     ->with('success', 'You Booked This Service!');

        $guests = $request->input('guests');
        $datefrom = $request->input('datefrom');
        $service_id = $request->input('service_id');
        $dateto = $request->input('dateto');
        $message = $request->input('message');
        $event = $request->input('event');

        // $service_check = Service::where('id', $service_id)->first();

        // if ($service_check == true) {
        Book::create([
            'user_id' => auth()->user()->id,
            'service_id' => $service_id,
            'guests' => $guests,
            'datefrom' => $datefrom,
            'dateto' => $dateto,
            'message' => $message,
            'event' => $event,
        ]);

        return redirect('/payment')->with('success', 'You Booked This Service!');
        // } else {
        //     return back()->with('fail', 'Something Went Wrong!');
        // }
    }

    public function showbook()
    {
        $books = Book::all();
        return view('admin.showbooking', compact('books'));
    }

    public function adminbook()
    {
        $books = Book::all();
        return view('admin.approvecancel', compact('books'));
    }

    public function approve($id)
    {
        $books = Book::find($id);
        $books->status = 'Approved';
        $books->save();
        return back();
    }

    public function cancel($id)
    {
        $books = Book::find($id);
        $books->status = 'Canceled';
        $books->save();
        return back();
    }

    public function search()
    {

        return view('admin.search');
    }

    public function searchbook(Request $request)
    {
        $request->validate([
            'find' => 'required',
        ]);
        $search_text = $_GET['find'];
        $books = DB::table('books')
            ->join('services', 'services.id', '=', 'books.service_id')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select(
                'books.id',
                'books.guests',
                'books.event',
                'books.datefrom',
                'books.dateto',
                'books.status',
                'users.fname',
                'users.email',
                'services.name',
                'services.price'
            )
            ->where('books.event', 'LIKE', '%' . $search_text . '%')
            ->orWhere('users.fname', 'LIKE', '%' . $search_text . '%')
            ->get();
        return view('admin.resaultsearch', compact('books'));
    }

    public function paymentinfo()
    {
        $payments = Payment::all();
        return view('admin.paymentinfo', compact('payments'));
    }

    public function paymentdestroy(Request $request, Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Payment Deleted Successfuly!');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function removeusers(Request $request, User $user)
    {
        $user->delete();
        return back()->with('success', 'User Removed Successfuly!');
    }

    public function markasread($id)
    {
        if ($id == true) {
            auth()->user()->unreadnotifications->where('id', $id)->markAsRead();
        }
        return back();
    }
}
