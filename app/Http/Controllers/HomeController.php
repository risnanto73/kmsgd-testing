<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jabatan;
use App\Models\Jenjang;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jenjang    = Jenjang::all();
        $tahun      = Tahun::all();
        $jabatan    = Jabatan::all();
        $alumni     = User::where('role', 'alumni')->orderBy('name', 'asc')->paginate(5);
        $staff      = User::where('role', 'staff')->orderBy('name', 'asc')->paginate(5);
        $user       = User::find(Auth::user()->id);
        $genderL    = User::where('role', 'alumni')->where('gender', 'laki')->count();
        $genderP    = User::where('role', 'alumni')->where('gender', 'perempuan')->count();

        $nama_jenjang = Jenjang::all();

        $name = [];
        $total = [];

        foreach ($nama_jenjang as $nam_jam) {
            $name[] = $nam_jam->jenjang;
            $total[] = User::where('jenjang_id', $nam_jam->id)->count();
        }

        return view('layouts.dashboard.dashboard', compact(
            'tahun',
            'jenjang',
            'user',
            'alumni',
            'staff',
            'jabatan',
            'genderL',
            'genderP',
            'nama_jenjang',
            'name',
            'total'
        ));
    }

    //ADMIN
    public function addAlumni(Request $request)
    {
        $jenjang = Jenjang::all();
        $tahun = Tahun::all();
        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make('1234'),
            'jenjang_id' => $request->jenjang_id,
            'tahun_id'   => $request->tahun_id,
            'slug'       => Str::slug($request->name, '-'),
            'role'       => $request->role,
            'gender'     => $request->gender,
        ]);
        Alert::success('Succes', 'Berhasil membuat akun');
        return redirect()->back();
    }

    //ADMIN
    public function editDataAlumni(Request $request, $id)
    {
        User::findOrfail($id)->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'gender'         => $request->gender,
            'jenjang_id'     => $request->jenjang_id,
            'tahun_id'       => $request->tahun_id
        ]);
        Alert::success('Succes', 'Berhasil mengedit akun');
        return redirect()->back();
    }

    //ADMIN
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        Storage::delete($user->photo);
        Storage::delete($user->cv);
        Storage::delete($user->portofolio);
        User::findOrFail($id)->delete();
        Alert::success('Succes', 'Berhasil menghaspus');
        return redirect()->back();
    }

    //ADMIN
    public function detailSiswa($slug)
    {
        $jenjang = Jenjang::all();
        $tahun   = Tahun::all();
        $alumni = User::where('slug', $slug)->first();
        $user   = User::find(Auth::user()->id);

        return view('layouts.dashboard.alumni.detail-alumni', compact('jenjang', 'tahun', 'alumni', 'user'));
    }

    //ADMIN
    public function searchAlumniDashboard(Request $request)
    {
        $jenjang = Jenjang::all();
        $tahun = Tahun::all();
        $keyword = $request->search;
        $alumni = User::where('role', 'alumni')->where('name', 'like', "%" . $keyword . "%")->paginate(5);
        $user = User::find(Auth::user()->id);
        $genderL    = User::where('role', 'alumni')->where('gender', 'laki')->count();
        $genderP    = User::where('role', 'alumni')->where('gender', 'perempuan')->count();
        $name = [];
        $total = [];



        return view('layouts.dashboard.dashboard', compact(
            'keyword',
            'alumni',
            'tahun',
            'jenjang',
            'user',
            'genderL',
            'genderP',
            'name',
            'total'
        ));
    }

    //ALUMNI
    public function viewTambahAlumni($slug)
    {
        $jenjang = Jenjang::all();
        $tahun  = Tahun::all();
        $alumni = User::where('slug', $slug)->first();
        $user = User::find(Auth::user()->id);
        $name = [];
        $total = [];

        return view('layouts.dashboard.alumni.detail-add-alumni', compact(
            'alumni',
            'tahun',
            'jenjang',
            'user',
            'name',
            'total'
        ));
    }

    // //ALUMNI
    // public function tambahAlumni(Request $request, $id)
    // {
    //     $jenjang = Jenjang::all();
    //     $tahun = Tahun::all();
    //     User::create([
    //         'name'       => $request->name,
    //         'email'      => $request->email,
    //         'jenjang_id' => $request->jenjang_id,
    //         'tahun_id'   => $request->tahun_id,
    //         'slug'       => Str::slug($request->name, '-'),
    //         'gender'     => $request->gender,
    //         'linkedin'   => $request->linkedin,
    //         'specialist' => $request->specialist,
    //         'address'    => $request->address,
    //         'maps'       => $request->maps,
    //         'salary'     => $request->salary,
    //         'experience' => $request->experience,
    //         'photo' => $request->file('photo')->store('photo'),

    //     ]);
    //     Alert::success('Succes', 'Berhasil memperbaharui akun');
    //     return redirect()->back();
    // }

    //ALUMNI
    public function editAlumni(Request $request)
    {

        $user = User::find(Auth::user()->id);
        Alumni::create([
            'user_id'   => Auth::user()->id,
            'phone'     => $request->phone,
            'specialist' => $request->specialist,
            'salary'    => $request->salary,
            'linkedin'    => $request->linkedin,
            'address'   => $request->address,
            'photo'     => $request->file('photo')->store('photo'),

        ]);

        $status = User::find(Auth::user()->id);

        $status->update([
            'status_daftar' => 'update'
        ]);

        Alert::success('Succes', 'Berhasil mengedit akun');
        return redirect('home');
    }

    public function detailUpdateAlumni($slug)
    {


        $jenjang = Jenjang::all();
        $tahun   = Tahun::all();
        $user    = User::find((Auth::user()->id));
        $alumni = User::where('slug', $slug)->first();
        $name = [];
        $total = [];

        return view('layouts.dashboard.alumni.update', compact(
            'jenjang',
            'tahun',
            'user',
            'alumni',
            'total','name'
        ));
    }

    public function updateAlumni(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);

        if (empty($request->file('photo'))) {
            $alumni = Alumni::where('user_id', '=', $user->id)->first();
            $alumni->update([
                'phone'     => $request->phone,
                'specialist' => $request->specialist,
                'salary'    => $request->salary,
                'linkedin'    => $request->linkedin,
                'address'   => $request->address,
            ]);
            return redirect()->route('home');
        } else {
            $alumni = Alumni::where('user_id', '=', $user->id)->first();
            Storage::delete($alumni->photo);
            $alumni->update([
                'phone'     => $request->phone,
                'specialist' => $request->specialist,
                'salary'    => $request->salary,
                'linkedin'    => $request->linkedin,
                'address'   => $request->address,

                'photo' => $request->file('photo')->store('photo'),
            ]);
            return redirect()->route('home');
        }
    }
}
