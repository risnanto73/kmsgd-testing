<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePassword extends Controller
{
    public function gantiPassword(){
        $name =[];
        $total =[];
        $user = User::find(Auth::user()->id);
        return view('layouts.dashboard.alumni.change-password',compact('user','name','total'));
    }

    public function  updatePass(ChangePasswordRequest $request)
    {
        // return dd($request);
        $old_pass = auth()->user()->password;
        $user_id = auth()->user()->id;        

        if(Hash::check($request->input('old_password'),$old_pass)){
            
            if(Hash::check($request->input('password'),$old_pass)){
                return redirect()->back()->with('Failed','Password tidak boleh sama !');
            }else{
                $alumni = User::find($user_id);
                $alumni->password = Hash::make($request->input('password'));
                $alumni->save();
                return redirect()->back()->with('Success','Password berhasil diubah !');
            }             
                        
        }
        else{
            return redirect()->back()->with('Failed','Password salah !');
        }
    }

    public function resetPassword($id)
    {

        $user = User::findOrfail($id);
        $user->update([
            'password'  => Hash::make('1234'),
        ]);
        $user->save();

        Alert::success('Success', 'Password Berhasil di Reset ke 1234');
        return redirect()->back();
    }
}
