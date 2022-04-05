<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Normalizer\SlugNormalizer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string|max:115',
            'lastname' => 'required|string|max:115',
            'email' => 'required|unique:users|email|max:255',
            'phone_number' => 'required|digits:10',
            'department_id' => 'required',
            'alt_phone' => 'required|digits:10',
            'role' => 'required'
        ]);
        $name = $data['firstname'] . ' ' . $data['lastname'];
        $user =  User::create([
            'name' => $name,
            'email' => $data['email'],
            'password' => Hash::make('password'),
            'username' => $data['firstname'],
            'department_id' => $data['department_id'],
            'role' => $data['role']
        ]);
        if ($data['role'] == 1) {
            $user->supervisor()->create([
                'phone_number' => $data['phone_number'],
                'department_id' => $data['department_id'],
                'alt_phone' => $data['alt_phone'],
            ]);
        }
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
