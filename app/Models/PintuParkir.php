<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// panggil fungsi tambahan untuk model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class PintuParkir extends Model
{
    use HasFactory;
    protected $table = 'pintu_parkir';
    protected $primaryKey = 'id_pintu_parkir';
    protected $guarded = [];

    // listing
    public static function listing()
    {
        return self::orderBy('id_pintu_parkir', 'DESC')
            ->get();
    }
}
