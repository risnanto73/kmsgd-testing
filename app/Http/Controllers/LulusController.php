<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LulusController extends Controller
{
    public function lulus(){
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $name =[];
        $total =[];

        $user = User::find(Auth::user()->id);
        $tahun = Tahun::orderBy('tahun','asc')->get();
        return view('layouts.dashboard.lulus.index',compact(
            'tahun','user',
            'name',
            'total'
        ));
    }

    public function store(Request $request){
        Tahun::create([
            'tahun' => $request->tahun,
            'slug'  => Str::slug($request->tahun,'-'),
        ]);
        Alert::success('Success', 'Success menambahkan tahun');
        return redirect()->back();
    }

    public function edit(Request $request,$id){
        Tahun::findOrFail($id)->update([
            'tahun' => $request->tahun,
            'slug'  => Str::slug($request->tahun,'-')
        ]);
        Alert::success('Success', 'Success mengubah tahun');
        return redirect()->back();
    }

    public function destroy($id){
        Tahun::findOrFail($id)->delete();
        Alert::success('Success', 'Success menghapus tahun');
        return redirect()->back();
    }
}
