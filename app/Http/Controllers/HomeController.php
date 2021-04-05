<?php

namespace App\Http\Controllers;

use App\Models\HcLoker;
use App\Models\HcLamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lamaran = HcLamaran::where('email', Auth::user()->email)->first();
        $lokers = HcLoker::with('masterJabatan')->get();

        return view('home', ['lokers' => $lokers, 'lamaran' => $lamaran]);
    }

    public function persyaratanUpdate(Request $request)
    {
        $lamaran = HcLamaran::where('email', Auth::user()->email)->first();
        $lamaran->master_jabatan_id = $request->master_jabatan_id;
        $lamaran->surat_lamaran = base64_encode(file_get_contents($request->file('surat_lamaran')));
        $lamaran->curriculum_vitae = base64_encode(file_get_contents($request->file('curriculum_vitae')));
        $lamaran->ijazah = base64_encode(file_get_contents($request->file('ijazah')));
        $lamaran->transkip_nilai = base64_encode(file_get_contents($request->file('transkip_nilai')));
        $lamaran->foto = base64_encode(file_get_contents($request->file('foto')));
        $lamaran->kartu_keluarga = base64_encode(file_get_contents($request->file('kartu_keluarga')));
        $lamaran->ktp = base64_encode(file_get_contents($request->file('ktp')));
        $lamaran->status_lamaran = 1;
        $lamaran->save();

        return redirect()->route('home');
    }
}
