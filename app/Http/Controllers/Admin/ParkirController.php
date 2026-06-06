<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// panggil model
use App\Models\Parkir;
use App\Models\JenisKendaraan;
use App\Models\PintuParkir;

//string
use Illuminate\Support\Str;
use Carbon\Carbon;

class ParkirController extends Controller
{
    // index
    public function index(Request $request)
    {
        // check form pencarian
        if(isset($_GET['keywords'])) {
            $keywords   = $request->keywords;
            
            $parkir       = Parkir::where('nama_parkir', 'LIKE', "%{$keywords}%")
                                ->orWhere('tarif_parkir', 'LIKE', "%{$keywords}%")
                                ->orWhere('keterangan', 'LIKE', "%{$keywords}%")
                                ->orderBy('id_parkir','DESC')->get();
        }else{
            $parkir       = Parkir::orderBy('id_parkir','DESC')->get();
        }
        // end form pencarian

        $JenisKendaraan     = JenisKendaraan::orderBy('nama_jenis_kendaraan', 'ASC')->get();
        $PintuMasuk         = PintuParkir::where('jenis_pintu_parkir', 'Masuk')
                                ->orderBy('nama_pintu_parkir','ASC')
                                ->get();
        $PintuKeluar         = PintuParkir::where('jenis_pintu_parkir', 'Keluar')
                                ->orderBy('nama_pintu_parkir','ASC')
                                ->get();

        $data = [   'title'             => 'Data Parkir',
                    'parkir'            => $parkir,
                    'JenisKendaraan'    => $JenisKendaraan,
                    'PintuMasuk'        => $PintuMasuk,
                    'PintuKeluar'       => $PintuKeluar,
                    'content'   => 'admin/parkir/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    //proses tambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            'id_jenis_kendaraan' => 'required'
        ]);
    

    // Simpan ke Database
    $JenisKendaraan = JenisKendaraan::where('id_jenis_kendaraan', $request->id_jenis_kendaraan)->first();
    $harga          = $JenisKendaraan->tarif_parkir;

        Parkir::create([
            'id_jenis_kendaraan'    => $request->id_jenis_kendaraan,
            'id_pintu_masuk'        => $request->id_pintu_masuk,
            'nomor_parkir'          => strtoupper(Str::random(12)),
            'nomor_polisi'          => $request->nomor_polisi,
            'tanggal_masuk'         => date('Y-m-d H:i:s'),
            'tanggal_keluar'        => date('Y-m-d H:i:s'),
            'harga'                 => $harga,
            'status_bayar'          => 'Menunggu',
            
            'created_by'            => session()->get('id_parkir') ?? 1,
            'updated_by'            => session()->get('id_parkir') ?? 1,
            'created_at'            => now()
        ]);

        return redirect('admin/parkir')->with('sukses', 'Data berhasil ditambahkan');
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'id_pintu_keluar'           => 'required',
        ]);
        // Simpan ke Database
        $parkir         = Parkir::where('id_parkir',$request->id_parkir)->first();
        // hitung durasi
        $harga          = $parkir->harga;
        $tanggal_masuk  = Carbon::parse($parkir->tanggal_masuk);
        $tanggal_keluar = Carbon::parse($request->tanggal_keluar);
        // Selisih total menit
        $jumlah_menit   = $tanggal_masuk->diffInMinutes($tanggal_keluar);
        // Jam dan menit
        $total_jam      = floor($jumlah_menit / 60);
        $total_menit    = $jumlah_menit % 60;
        // Jam desimal
        $total_durasi   = round($jumlah_menit / 60, 2);
        $total_harga = round(($total_durasi * $harga) / 500) * 500;
        Parkir::where(   'id_parkir',$request->id_parkir)->update([
                        'total_jam'     => $total_jam,
                        'total_menit'   => $total_menit,
                        'total_durasi'  => $total_durasi,
                        'total_harga'   => $total_harga,
                        'tanggal_keluar'=> date('Y-m-d H:i:s'),
                        'status_bayar'  => 'Sudah',
                        'updated_by'    => session()->get('id_user') ?? 1,
                        'updated_at'    => now()
                    ]);
        return redirect('admin/parkir')->with('sukses', 'Data berhasil diupdate');
    }

    // delete
    public function delete($id_parkir)
    {
        Parkir::where('id_parkir',$id_parkir)->delete();
        return redirect('admin/parkir')->with('sukses', 'Data berhasil dihapus');
    }
}
