<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// panggil fungsi tambahan untuk model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Parkir extends Model
{
    use HasFactory;
    protected $table        = 'parkir';
    protected $primaryKey   = 'id_parkir';
    protected $guarded      = [];

    // listing
    public static function listing()
    {
        return self::orderBy('id_parkir', 'DESC')
            ->get();
    }
}
