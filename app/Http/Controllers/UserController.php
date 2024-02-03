<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AddUserNotification;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function messages()
    {
        return [
            'name.required'     => 'Full Name is required',
            'name.max'          => 'Full Name mustn\'t be over 255 character',
            'userName.required' => 'Username is required',
            'userName.max'      => 'Username mustn\'t be over 255 character',
            'email.required'    => 'Email is required',
            'email.email'       => 'You must enter email form example@gmail.com',
            'email.unique'      => 'This Email already exists',
            'password.required' => 'Full Name is required',
            'password.min'      => 'The password field must be at least 8 characters',
        ];
    }


    public function index()
    {
        
        $userList = User::get();
        
        return view('admin.index', compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        $data = $request->validate([
            'name'              =>'required|string|max:255',
            'email'             =>'required|string|email|max:255|unique:users',
            'password'          =>'required|string|min:8',
            'userName'          =>'required|string|max:255',
        ], $messages);

        $data['active']   = isset($request->active);
        
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->markEmailAsVerified();

        $userAdmin = User::find(Auth::user()->id);

        Notification::send($userAdmin, new AddUserNotification($user));

        return redirect()->route('adminIndex')->with('success', 'User had been add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User:: FindOrFail($id);

        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'userName' => 'required|string|max:255',
        ], $messages);

        $data['active']   = isset($request->active);

        $data['password'] = Hash::make($data['password']);

        User::where('id', $id)->update($data);

        return redirect()->route('adminIndex')->with('success', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
