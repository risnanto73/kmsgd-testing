<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class CarouselController extends Controller
{
    public function index(){
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $carousel = Carousel::paginate(5);
        $name =[];
        $total =[];
        $user = User::find(Auth::user()->id);
        
        return view('layouts.dashboard.carousel.index', compact(
            'carousel',
            'name',
            'total',
            'user'
        ));
    }

    public function addCarousel(Request $request){
        Carousel::create([
            'text1' => $request->text1,
            'text2' => $request->text2,
            'img'     => $request->file('img')->store('img'),
        ]);
        Alert::success('Succes', 'Berhasil menambahkan Carousel');
        return redirect()->back();
    }

    public function delCarousel($id){
        $carousel = Carousel::where('id', $id)->first();
        Storage::delete($carousel->photo);
        Carousel::findOrFail($id)->delete();
        Alert::success('Succes', 'Berhasil menghaspus carousel');
        return redirect()->back();
    }
    
}
