<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OkController extends Controller
{
    //index
    public function index()
    {
        echo 'Ini halaman index';
    }

    //Berita
    public function berita()
    {
        echo 'Ini halaman berita';
    }

    //profil
    public function profil()
    {
        echo 'Ini halaman profil';
    }
}
