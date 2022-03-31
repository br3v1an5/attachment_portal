<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

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
    public function markRead($notice)
    {
        $notification  = auth()->user()->notifications->where('id', $notice)->first();
        $notification->markAsRead();
        return redirect(route('home'))->with('message', 'Notification marked as read');
    }
    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
}
