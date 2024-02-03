<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AddTestimonialNotification;
use App\Traits\Common;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();

        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        $data = $request->validate([

            'name'      => 'required|string|max:50',
            'position'  => 'required|string|max:50',
            'content'   => 'required|string',
            'image'     => 'required|mimes:png,jpg,jpeg|max:2048',

        ], $messages);

        $data['published'] = isset($request['published']);

        $imageName = $this->uploadFile($request->image, 'assets/images');

        $data['image'] = $imageName;


        $testimonial = Testimonial::create($data);

        $userAdmin = User::find(Auth::user()->id);

        Notification::send($userAdmin, new AddTestimonialNotification($testimonial));

        return redirect()->route('testimonialsList')->with('success', 'The testimonial has been added successfuly.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial,  string $id)
    {
        $testimonial = Testimonial::FindOrFail($id);

        return view('admin.editTestimonial', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial, string $id)
    {
        $messages = $this->messages();

        $data = $request->validate([

            'name'      => 'required|string|max:50',
            'position'  => 'required|string|max:50',
            'content'   => 'required|string|max:255',
            'image'     => 'sometimes|mimes:png,jpg,jpeg|max:2048',

        ], $messages);

        $data['published'] = isset($request['published']);

        if (isset($request['image'])) {

            $data['image'] = $this->uploadFile($request->image, 'assets/images');
        }

        Testimonial::where('id', $id)->update($data);

        return redirect()->route('testimonialsList')->with('success', 'The testimonial has been updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial, string $id)
    {
        Testimonial::where('id', $id)->delete();

        return redirect()->route('testimonialsList')->with('success', 'The testimonial has been deleted successfuly.');
    }

    public function messages()
    {
        return [
            'name.required'     => 'Title is required',
            'name.max'          => 'Title mustn\'t be over 50 character',
            'position.required' => 'content is required',
            'position.max'      => 'luggage must be a number',
            'image.required'    => 'image is required',
            'image.mimes'       => 'image\'s type must be png,jpg or jpeg',
        ];
    }
}
