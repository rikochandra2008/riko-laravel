<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// panggil model
use App\Models\JenisKendaraan;

class JenisKendaraanController extends Controller
{
    // index
    public function index(Request $request)
    {
        // check form pencarian
        if(isset($_GET['keywords'])) {
            $keywords   = $request->keywords;
            
            $jenisKendaraan       = JenisKendaraan::where('nama_jenis_kendaraan', 'LIKE', "%{$keywords}%")
                                ->orWhere('tarif_parkir', 'LIKE', "%{$keywords}%")
                                ->orWhere('keterangan', 'LIKE', "%{$keywords}%")
                                ->orderBy('id_jenis_kendaraan','DESC')->get();
        }else{
            $jenisKendaraan       = JenisKendaraan::orderBy('id_jenis_kendaraan','DESC')->get();
        }
        // end form pencarian

        $data = [   'title'     => 'Data Jenis Kendaraan',
                    'jenisKendaraan'      => $jenisKendaraan,
                    'content'   => 'admin/jenis-kendaraan/index'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // edit
    public function edit($id_jenis_kendaraan)
    {
        $jenisKendaraan   = JenisKendaraan::where('id_jenis_kendaraan',$id_jenis_kendaraan)->first();

        $data = [   'title'         => 'Edit Data Jenis Kendaraan: '.$jenisKendaraan->nama_jenis_kendaraan,
                    'jenisKendaraan'   => $jenisKendaraan,
                    'content'       => 'admin/jenis-kendaraan/edit'
                ];
        return view('admin/layout/wrapper', $data);
    }

    // prosesTambah
    public function prosesTambah(Request $request)
    {
        $request->validate([
            
            'nama_jenis_kendaraan'       => 'required|unique:jenis_kendaraan',
           
        ]);

        // Simpan ke Database
        JenisKendaraan::create([
            'nama_jenis_kendaraan'     => $request->nama_jenis_kendaraan,
            'tarif_parkir'            => $request->tarif_parkir,
            'keterangan'            => $request->keterangan,                      
            'created_by'            => session()->get('id_jenis_kendaraan') ?? 1,
            'updated_by'            => session()->get('id_jenis_kendaraan') ?? 1,
            'created_at'            => now()
        ]);

        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data berhasil ditambahkan');
    }

    // prosesEdit
    public function prosesEdit(Request $request)
    {
        $request->validate([
            'nama_jenis_kendaraan'     => 'required',
            
        ]);

        // Simpan ke Database
        
            JenisKendaraan::where(   'id_jenis_kendaraan',$request->id_jenis_kendaraan)->update([
                            'nama_jenis_kendaraan'     => $request->nama_jenis_kendaraan,
                            'tarif_parkir'         => $request->tarif_parkir,
                            'keterangan'            => $request->keterangan,                               
                            'updated_by'            => session()->get('id_jenis_kendaraan') ?? 1,
                            'updated_at'        => now()
                        ]);
        
        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data berhasil diupdate');
    }

    // delete
    public function delete($id_jenis_kendaraan)
    {
        JenisKendaraan::where('id_jenis_kendaraan',$id_jenis_kendaraan)->delete();
        return redirect('admin/jenis-kendaraan')->with('sukses', 'Data berhasil dihapus');
    }
}
