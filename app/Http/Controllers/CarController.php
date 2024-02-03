<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AddCarNotification;

class CarController extends Controller
{

    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars =  Car::get();
        
        return view('admin.cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();

        return view('admin.addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'luggage'     => 'required|numeric',
            'doors'       => 'required|numeric',
            'passengers'  => 'required|numeric',
            'price'       => 'required|numeric',
            'image'       => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ], $messages
        );

        $imageName = $this->uploadFile($request->image, 'assets/images');

        $data['image'] = $imageName;

        $data['active'] = isset($request['active']);

        $car = Car::create($data);

        $userAdmin = User::find(Auth::user()->id);

        Notification::send($userAdmin, new AddCarNotification($car));

        return redirect()->route('carsList')->with('success', 'The car has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, string $id)
    {
        $car = Car::FindOrFail($id);

        $categories = Category::get();

        return view('admin.editCar', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car, string $id)
    {
        $messages = $this->messages();

        $data = $request->validate(
            [
                'title'       => 'required|string|max:50',
                'content'     => 'required|string',
                'luggage'     => 'required|numeric',
                'doors'       => 'required|numeric',
                'passengers'  => 'required|numeric',
                'price'       => 'required|numeric',
                'image'       => 'sometimes|mimes:png,jpg,jpeg|max:2048',
                'category_id' => 'required',
            ],
            $messages
        );

         if (isset($request['image'])) {

            $data['image'] =$this->uploadFile($request->image, 'assets/images');
         }

        $data['active'] = isset($request['active']);

        Car::where('id', $id)->update($data);

        return redirect()->route('carsList')->with('success', 'The car has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car, string $id)
    {
        Car::where('id', $id)->delete();
        
        return redirect()->route('carsList')->with('success','The car has been deleted successfully');
    }

    public function messages()
    {
        return [
            'title.required'        =>'Title is required',
            'title.max'             => 'Title mustn\'t be over 50 character',
            'content.required'      => 'Content is required',
            'luggage.required'      => 'Luggage is required',
            'luggage.numeric'       => 'Luggage must be a number',
            'doors.required'        => 'Doors is required',
            'doors.numeric'         => 'Doors must be a number',
            'passengers.required'   => 'Passangers is required',
            'passengers.numeric'    => 'Passangers must be a number',
            'price.required'        => 'Price is required',
            'price.numeric'         => 'Price must be a number',
            'image.required'        => 'Image is required',
            'image.mimes'           => 'Image\'s type must be png,jpg or jpeg',
            'category_id.required'  => 'You must choose a category',
        ];
    }
}
