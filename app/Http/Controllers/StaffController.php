<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Jenjang;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class StaffController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }
        $name =[];
        $total =[];
        $jabatan = Jabatan::orderBy('jabatan', 'asc')->paginate(5);
        $user = User::find(Auth::user()->id);
        return view('layouts.dashboard.jabatan.index', compact(
            'jabatan',
            'user',
            'name',
            'total'
        ));
    }

    public function addJabatan(Request $request)
    {
        Jabatan::create([
            'jabatan' => $request->jabatan,
            'slug' => Str::slug($request->jabatan, '-'),

        ]);
        Alert::success('Success', 'Success menambahkan jenjang');
        return redirect()->back();
    }

    public function editJabatan(Request $request, $id)
    {
        Jabatan::findOrfail($id)->update([
            'jabatan' => $request->jabatan,
            'slug' => Str::slug($request->jabatan, '-'),
        ]);
        Alert::success('Success', 'Success mengubah jabatan');
        return redirect()->back();
    }

    public function delJabatan($id)
    {
        Jabatan::findOrFail($id)->delete();
        Alert::success('Success', 'Success menghapus jenjang');
        return redirect()->back();
    }

    public function indexStaff()
    {
        $jabatan    = Jabatan::all();
        $user       = User::find(Auth::user()->id);
        $name =[];
        $total =[];
        $staff      = User::where('role', 'staff')->orderBy('name', 'asc')->paginate(5);

        return view('layouts.dashboard.staff.index', compact(
            'jabatan',
            'user',
            'staff',
            'name',
            'total'
        ));
    }

    public function addStaff(Request $request)
    {
        $jabatan = Jabatan::all();
        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make('1234'),
            'jabatan_id' => $request->jabatan_id,
            'slug'       => Str::slug($request->name, '-'),
            'role'       => $request->role,
        ]);
        Alert::success('Succes', 'Berhasil membuat akun');
        return redirect()->back();
    }

    public function editStaff(Request $request, $id)
    {
        User::findOrfail($id)->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'jabatan_id'     => $request->jabatan_id,
        ]);
        Alert::success('Succes', 'Berhasil mengedit akun');
        return redirect()->back();
    }

    public function delStaff($id)
    {
        $user = User::where('id', $id)->first();
        Storage::delete($user->photo);
        User::findOrFail($id)->delete();
        Alert::success('Succes', 'Berhasil menghaspus');
        return redirect()->back();
    }


    public function createStaff(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        Staff::create([
            'user_id'   => Auth::user()->id,
            'photo'     => $request->file('photo')->store('photo'),
        ]);

        $status = User::find(Auth::user()->id);

        $status->update([
            'status_daftar' => 'update'
        ]);
    }

    public function updateStaff(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);

        $staff = Staff::where('user_id', '=', $user->id)->first();
        Storage::delete($staff->photo);
        $staff->update([
            'photo' => $request->file('photo')->store('photo'),
        ]);
        return redirect()->back();
    }

    public function searchStaff(Request $request){
        $jabatan = Jabatan::all();
        $keyword = $request->search;
        $staff = User::where('role', 'staff')->where('name', 'like', "%" . $keyword . "%")->paginate(5);
        $user = User::find(Auth::user()->id);
        $genderL    = User::where('role','alumni')->where('gender','laki')->count();
        $genderP    = User::where('role','alumni')->where('gender','perempuan')->count();
        $name =[];
        $total=[];

        return view('layouts.dashboard.staff.index', compact(
            'jabatan',
            'keyword',
            'staff',
            'user',
            'genderL',
            'genderP',
            'name',
            'total'
        ));
    }
}
