<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class JenjangController extends Controller
{
    public function jenjang(){
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $name =[];
        $total =[];

        $user = User::find(Auth::user()->id);
        $jenjang = Jenjang::orderBy('jenjang','asc')->get();
        return view('layouts.dashboard.jenjang.index', compact('jenjang','user','name','total'));
    }

    public function store(Request $request)
    {
        Jenjang::create([
            'jenjang' => $request->jenjang,
            'slug' => Str::slug($request->jenjang,'-'),

        ]);
        Alert::success('Success', 'Success menambahkan jabatan');
        return redirect()->back();
    }

    public function update(Request $request, $id){

        jenjang::findOrfail($id)->update([
            'jenjang' => $request->jenjang,
            'slug' => Str::slug($request->jenjang,'-'),
        ]);
        Alert::success('Success', 'Success mengubah jabatan');
        return redirect()->back();

    }

    public function delete($id){
        Jenjang::findOrFail($id)->delete();
        Alert::success('Success', 'Success menghapus jabatan');
        return redirect()->back();
    }

}


