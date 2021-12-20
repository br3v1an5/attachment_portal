<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createSupervisorRequest;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = Supervisor::orderBy('created_at', 'desc')->get();
        return view('admin.supervisors.index', compact('supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supervisors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createSupervisorRequest $request)
    {
        $uname = strtolower($request->firstname) . '_' . strtolower($request->lastname);
        $usere = User::where('username', $uname)->first();
        if ($usere != null) {
            return response()->json(['message' => 'Username ' . $uname . ' Already Exists'], 400);
        }
        $user = User::create([
            'is_supervisor' => true,
            'name' => ucfirst($request->firstname) . ' ' . ucfirst($request->lastname),
            'email' => strtolower($request->email),
            'password' => Hash::make('ziwatti'),
            'username' => strtolower($request->firstname) . '_' . strtolower($request->lastname)
        ]);
        if ($user != null) {
            return  $user->supervisor()->create([
                'phone_number' => $request->phone_number,
                'department' => $request->department,
                'dob' => $request->dob,
                'class_name' => $request->class_name,
                'alt_phone' => $request->alt_phone,
            ]);
        } else {
            return response()->json(['message' => 'Error Creating User Account For Supervisor'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Supervisor $supervisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supervisor $supervisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supervisor $supervisor)
    {
        //
    }
}
