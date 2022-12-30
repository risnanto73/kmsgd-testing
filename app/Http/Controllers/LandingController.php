<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $carousel = Carousel::all();

        return view('welcome',compact(
            'carousel'
        ));
    }
}
