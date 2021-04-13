<?php

namespace App\Http\Controllers;

use App\Models\HcLoker;
use App\Models\HcLamaran;
use Illuminate\Http\Request;
use App\Models\HcMediaSosial;
use App\Models\HcKerabatDarurat;
use Illuminate\Support\Facades\Auth;
use App\Models\HcKeluargaSebelumMenikah;
use App\Models\HcKeluargaSetelahMenikah;

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

    public function rekrutmenUpdate(Request $request)
    {
        dd($request);
        // $lamaran = HcLamaran::where('email', Auth::user()->email)->first();
        // $lamaran->nama_panggilan = $request->nama_panggilan;
        // $lamaran->nomor_ktp = $request->nomor_ktp;
        // $lamaran->nomor_sim = $request->nomor_sim;
        // $lamaran->agama = $request->agama;
        // $lamaran->jenis_kelamin = $request->jenis_kelamin;
        // $lamaran->tempat_lahir = $request->tempat_lahir;
        // $lamaran->tanggal_lahir = $request->tanggal_lahir;
        // $lamaran->alamat_ktp = $request->alamat_ktp;
        // $lamaran->alamat_sekarang = $request->alamat_sekarang;
        // $lamaran->status_perkawinan = $request->status_perkawinan;
        // $lamaran->save();

        // $media_sosial = new HcMediaSosial;
        // $media_sosial->email = Auth::user()->email;
        // $media_sosial->facebook = $request->facebook;
        // $media_sosial->instagram = $request->instagram;
        // $media_sosial->linkedin = $request->linkedin;
        // $media_sosial->youtube = $request->youtube;
        // $media_sosial->save();

        // foreach ($request->keluarga_sebelum_menikah_hubungan as $key => $value) {
        //     $keluarga_sebelum_menikah = new HcKeluargaSebelumMenikah;
        //     $keluarga_sebelum_menikah->email = Auth::user()->email;
        //     $keluarga_sebelum_menikah->hubungan = $value;
        //     $keluarga_sebelum_menikah->nama = $request->keluarga_sebelum_menikah_nama[$key];
        //     $keluarga_sebelum_menikah->usia = $request->keluarga_sebelum_menikah_usia[$key];
        //     $keluarga_sebelum_menikah->jenis_kelamin = $request->keluarga_sebelum_menikah_jenis_kelamin[$key];
        //     $keluarga_sebelum_menikah->pendidikan_terakhir = $request->keluarga_sebelum_menikah_pendidikan_terakhir[$key];
        //     $keluarga_sebelum_menikah->pekerjaan_terakhir = $request->keluarga_sebelum_menikah_pekerjaan_terakhir[$key];
        //     $keluarga_sebelum_menikah->save();
        // }

        if ($request->jenis_kelamin == 'l') {
            $hubungan = "istri";
        } else if ($request->jenis_kelamin == 'p') {
            $hubungan = "suami";
        } else {
            $hubungan = "anak";
        }

        foreach ($request->keluarga_setelah_menikah_nama as $key => $value) {
            $keluarga_setelah_menikah = new HcKeluargaSetelahMenikah;
            $keluarga_setelah_menikah->email = Auth::user()->email;
            $keluarga_setelah_menikah->hubungan = $hubungan;
            $keluarga_setelah_menikah->nama = $request->keluarga_setelah_menikah_nama[$key];
            $keluarga_setelah_menikah->tempat_lahir = $request->keluarga_setelah_menikah_tempat_lahir[$key];
            $keluarga_setelah_menikah->tanggal_lahir = $request->keluarga_setelah_menikah_tanggal_lahir[$key];
            $keluarga_setelah_menikah->pekerjaan_terakhir = $request->keluarga_setelah_menikah_pekerjaan_terakhir[$key];
            $keluarga_setelah_menikah->save();
        }

        // $kerabat = new HcKerabatDarurat;
        // $kerabat->email = Auth::user()->email;
        // $kerabat->hubungan = $request->kerabat_hubungan;
        // $kerabat->nama = $request->kerabat_nama;
        // $kerabat->jenis_kelamin = $request->kerabat_jenis_kelamin;
        // $kerabat->telepon = $request->kerabat_telepon;
        // $kerabat->alamat = $request->kerabat_alamat;
        // $kerabat->save();

        // $pendidikan = new HcPendidikan;
        // $pendidikan->email = Auth::user()->email;
        // $pendidikan->tingkat = $request->pendidikan_tingkat;
        // $pendidikan->nama = $request->pendidikan_nama_gedung;
        // $pendidikan->kota = $request->pendidikan_kota;
        // $pendidikan->jurusan = $request->pendidikan_jurusan;
        // $pendidikan->tahun_masuk = $request->pendidikan_tahun_masuk;
        // $pendidikan->tahun_lulus = $request->pendidikan_tahun_lulus;
        // $pendidikan->save();

        // $pelatihan = new HcPelatihan;
        // $pelatihan->email = Auth::user()->email;
        // $pelatihan->nama = $request->pelatihan_nama;
        // $pelatihan->tahun = $request->pelatihan_tahun;
        // $pelatihan->save();

        // $penghargaan = new HcPenghargaan;
        // $penghargaan->email = Auth::user()->email;
        // $penghargaan->nama = $request->penghargaan_nama;
        // $penghargaan->tahun = $request->penghargaan_tahun;
        // $penghargaan->save();

        // $organisasi = new HcOrganisasi;
        // $organisasi->email = Auth::user()->email;
        // $organisasi->nama = $request->organisasi_nama;
        // $organisasi->jabatan = $request->organisasi_jabatan;
        // $organisasi->masa_kerja = $request->organisasi_masa_kerja;
        // $organisasi->save();

        // foreach ($request->pekerjaan_nama as $key => $value) {
        //     $pekerjaan = new HcRiwayatPekerjaan;
        //     $pekerjaan->email = Auth::user()->email;
        //     $pekerjaan->nama_perusahaan = $request->pekerjaan_nama;
        //     $pekerjaan->jenis_industri = $request->pekerjaan_jenis_industri;
        //     $pekerjaan->jabatan_awal = $request->pekerjaan_jabatan_awal;
        //     $pekerjaan->jabatan_akhir = $request->pekerjaan_jabatan_akhir;
        //     $pekerjaan->awal_bekerja = $request->pekerjaan_awal_bekerja;
        //     $pekerjaan->akhir_bekerja = $request->pekerjaan_akhir_bekerja;
        //     $pekerjaan->gaji_awal = $request->pekerjaan_gaji_awal;
        //     $pekerjaan->gaji_akhir = $request->pekerjaan_gaji_akhir;
        //     $pekerjaan->nama_atasan = $request->pekerjaan_nama_atasan;
        //     $pekerjaan->alasan_berhenti = $request->pekerjaan_alasan_berhenti;
        //     $pekerjaan->save();
        // }

        // foreach ($request->pertanyaan_tambahan as $key => $value) {

        //     $index = $key + 1;
        //     $pertanyaan_tambahan = new HcPertanyaanTambahan;
        //     $pertanyaan_tambahan->email = Auth::user()->email;
        //     $pertanyaan_tambahan->master_pertanyaan_id = $key + 1;
        //     $pertanyaan_tambahan->jawaban = $request->jawaban_ . $index;
        //     $pertanyaan_tambahan->uraian = $request->jawaban_uraian_ . $index;
        //     $pertanyaan_tambahan->save();
        // }
    }
}
