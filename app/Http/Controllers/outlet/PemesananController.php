<?php

namespace App\Http\Controllers\outlet;

use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\pemesanan;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class PemesananController extends Controller
{
    function index()
    {   
        return view('outlet.Pemesanan.pemesanan');
    }

}
