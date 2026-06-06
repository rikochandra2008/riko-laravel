<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// panggil fungsi tambahan untuk model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kendaraan';
    protected $primaryKey = 'id_jenis_kendaraan';
    protected $guarded = [];

    // listing
    public static function listing()
    {
        return self::orderBy('id_jenis_kendaraan', 'DESC')
            ->get();
    }
}
