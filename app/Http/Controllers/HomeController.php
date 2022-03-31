<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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

    public function change_password(Request $request)
    {
        $user = auth()->user();
        $data = $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if (Hash::check($data['old_password'], $user->password)) {
            $user->update([
                'password' => Hash::make($data['password'])
            ]);
            return redirect(route('home'))->with('message', 'Password Changed');
        } else {
            return redirect()->back()->with('error', 'Invalid Old Pasword');
        }
    }
}
