<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function markRead(Notification $notice)
    {
        // dd($notice);
        // dd($notice);
        // $notification->markas();
        $notice->markAsRead();
        return redirect(route('home'))->with('message', 'Notification marked as read');
    }
}
