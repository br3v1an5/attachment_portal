<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        if (Setting::where('key', 'application_status')->first() == null) {
            Setting::create([
                'key' => 'application_status',
                'value' => 'CLOSED'
            ]);
        }
        if (Setting::where('key', 'application_deadline')->first()->value == 'OPEN') {
            Setting::create([
                'key' => 'application_deadline'
            ]);
        }
    }



    public function show()
    {
        if (!in_array(Auth::user()->user_role, ['Admin', 'Super Admin', 'Ilo'])) {
            abort(403);
        };
        $application_status  = Setting::where('key', 'application_status')->first()->value;
        $deadline   = Setting::where('key', 'application_deadline')->first()->value;
        return view('admin.settings.show', compact('deadline', 'application_status'));
    }


    public function save(Request $request)
    {
        $deadline = Setting::where('key', 'application_deadline')->first();
        $deadline->value = $request->application_deadline;
        $deadline->save();


        $application_status  = Setting::where('key', 'application_status')->first();
        $application_status->value =  $request->application_status;
        $application_status->save();


        return redirect()->route('home');
    }
}
