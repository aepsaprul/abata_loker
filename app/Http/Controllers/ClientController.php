<?php

namespace App\Http\Controllers;

use App\Models\HcLoker;
use App\Models\HcLamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $lamaran = HcLamaran::first();
        $lokers = HcLoker::with('masterJabatan')->get();
        return view('client.index', ['lokers' => $lokers, 'lamaran' => $lamaran]);
    }

    public function persyaratanUpdate(Request $request)
    {
        $lamaran = HcLamaran::where('email', Auth::user()->email)->first();
        $lamaran->master_jabatan_id = $request->master_jabatan_id;
        $lamaran->surat_lamaran = base64_encode(file_get_contents($request->file('surat_lamaran')));
        $lamaran->save();
    }
}
