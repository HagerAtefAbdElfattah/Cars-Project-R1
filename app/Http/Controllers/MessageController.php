<?php

namespace App\Http\Controllers;

use App\Mail\ConectUsMail;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactMessagesNotification;
use App\Events\MessagesEvent;

class MessageController extends Controller
{

    public function messages()
    {
        return [
            'firstName.required' => 'First Name is required',
            'firstName.max'      => 'First Name mustn\'t be over 50 character',
            'lastName.required'  => 'Last Name is required',
            'lastName.max'       => 'Last Name mustn\'t be over 255 character',
            'email.required'     => 'Email is required',
            'email.email'        => 'You must enter email form "example@gmail.com"',
            'content.required'   => 'Please inter your message',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();

        return view('admin.messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        $data = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName'  => 'required|string|max:50',
            'email'     => 'required|string|email|max:255',
            'content'   => 'required|string',
            'read'      => 'required',
        ], $messages);

        $message = Message::create($data);
        

        //---------------- sending email to laravel email in env file------------------------
        Mail::to(config('mail.from.address'), config('mail.from.name'))->send(new ConectUsMail($data));

        // $userAdmin = User::find(Auth::user()->id);

        // Notification::send($userAdmin, new ContactMessagesNotification( $message) );

        // ---------using event-listener to notify both "the admin and sender" instead of using notify() directly------
        event(new MessagesEvent($message));

        return  view('includes.replayContactUs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message, string $id)
    {
        $message =  Message::find($id);
        if (isset($message) ) {
            
            $message->read= 1; 

            $message->save();

        return view('admin.showMessage', compact('message'));
        
        }else {
            return redirect()->back()->withErrors(['error' => 'This message has been deleted.']);
        }
        
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message, string $id)
    {
        Message::where('id', $id)->delete();

        return redirect()->route('messagesList');
    }
}
