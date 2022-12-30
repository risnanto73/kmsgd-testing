<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user() {
        return $this->hasMany(User::class, 'jenjang_id', 'id');
    }
}
