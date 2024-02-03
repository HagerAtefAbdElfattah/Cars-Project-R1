<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TestimonialController;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Testimonial;

class IndexController extends Controller
{
    public function index()
    {
        $category = Category::get();

        $cars = Car::where('active', 1)->latest()->take(6)->get();

        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();

        return view('index', compact('cars', 'testimonials', 'category'));
    }



    public function singleCar(string $id)
    {
        
        $car = Car::FindOrfail($id);

        $categories = Category::get();

        return view('singleCar',compact('car', 'categories'));
    }



    public function listing(Request $request)
    {
        $categoryId = $request->query('category_id');

        if ($categoryId) {
           
            $cars = Car::search($categoryId)->where('active', 1)->orderBy('created_at')->paginate(6);

        } else {
            $cars = Car::where('active', 1)->orderBy('created_at')->paginate(6);

        }

        if ($cars->isEmpty()) {

            return redirect()->back()->withInput()->with('error', 'No results found.');
        }

        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();

        return view('listing', compact('cars', 'testimonials'));
    }



    public function testimonials()
    {
        $testimonials = Testimonial::where('published', 1)->latest()->get();

        return view('testimonials', compact('testimonials'));
    }



    public function blog()
    {
        return view('blog');
    }



    public function about()
    {
        return view('about');
    }



    public function contact()
    {
        return view('contact');
    }
}
