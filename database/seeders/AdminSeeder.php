<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->name         = "Admin";
        $user->email        = "admin@gmail.com";
        $user->password     = Hash::make("1234");
        $user->role         = "admin";
        $user->slug         = "admin";
        $user->status_daftar= "admin";

        $user->save();
    }
}
