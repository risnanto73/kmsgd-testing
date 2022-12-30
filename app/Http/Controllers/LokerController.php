<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class LokerController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'alumni') {
            abort(403);
        }
        $name =[];
        $total =[];
        $user = User::find(Auth::user()->id);
        $loker = Loker::orderBy('name_pt', 'asc')->paginate(5);
        return view('layouts.dashboard.loker.index', compact('loker','user','name','total'));
    }

    public function viewAdd()
    {
        if (auth()->user()->role == 'alumni') {
            abort(403);
        }
        $name =[];
        $total =[];
        $loker = Loker::all();
        $user  = User::find(Auth::user()->id);
        return view('layouts.dashboard.loker.add-loker', compact(
            'loker',
            'user',
            'name',
            'total'
        ));
    }

    public function store(Request $request)
    {
        Loker::create([
            'name_pt'       => $request->name_pt,
            'isi_pt'        => $request->isi_pt,
            'status'        => $request->status,
            'penerbit_pt'   => $request->penerbit_pt,
            'slug'          => Str::slug($request->name_pt, '-'),
            'img_pt'        => $request->file('img_pt')->store('img_pt'),
        ]);

        return redirect('loker');
    }

    public function edit($slug)
    {
        if (auth()->user()->role == 'alumni') {
            abort(403);
        }
        
        $name =[];
        $total =[];
        $loker = Loker::where('slug', $slug)->first();
        $user  = User::find(Auth::user()->id);

        return view('layouts.dashboard.loker.edit', compact(
            'loker',
            'user',
            'name',
            'total'
        ));
    }

    public function update(Request $request, $id)
    {

        if (empty($request->file('img_pt'))) {
            $loker = Loker::findOrFail($id);
            $loker->update([
                'name_pt' => $request->name_pt,
                'isi_pt' => $request->isi_pt,
                'status'        => $request->status,
                'penerbit_pt' => $request->penerbit_pt,
            ]);
            Alert::Success('Success', 'berhasi mengedit');
            return redirect()->route('loker.index');
        } else {
            $loker = Loker::findOrFail($id);
            Storage::delete($loker->img_pt);
            $loker->update([
                'name_pt'       => $request->name_pt,
                'isi_pt'        => $request->isi_pt,
                'status'        => $request->status,
                'penerbit_pt'   => $request->penerbit_pt,
                'img_pt'        => $request->file('img_pt')->store('img_pt'),
            ]);
            Alert::Success('Success', 'berhasi mengedit');
            return redirect()->route('loker.index');
        }
    }

    public function view($slug)
    {
        if (auth()->user()->role == 'alumni') {
            abort(403);
        }
        $name =[];
        $total =[];
        $user  = User::find(Auth::user()->id);
        $loker = Loker::where('slug', $slug)->first();
        return view('layouts.dashboard.loker.view', compact(
            'loker',
            'user',
            'name',
            'total'
        ));
    }

    public function destroy($id)
    {
        $loker = Loker::find($id);
        Storage::delete($loker->img_pt);
        Loker::find($id)->delete();
        Alert::success('Success', 'Berhasil menghapus loker');
        return redirect()->back();
    }

}
