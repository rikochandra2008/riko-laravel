<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// panggil fungsi tambahan untuk model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $guarded = [];

    // login
    public static function login($username, $password)
    {
        return self::where('username', $username)
            ->where('password', sha1($password))
            ->first();
    }
}
