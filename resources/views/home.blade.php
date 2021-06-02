@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/bootstrap4/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                @if ($lamaran == null)
                    {{-- form persyaratan  --}}
                    <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">selamat datang</h3>
                    <p class="text-center text-capitalize font-weight-bold">silahkan isi formulir dengan lengkap dan benar</p>
                    <form action="{{ route('home.persyaratan.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="master_jabatan_id">Posisi yg dilamar</label>
                                    <select name="master_jabatan_id" id="master_jabatan_id" class="form-control">
                                        <option value="">--Pilih Posisi--</option>
                                        @foreach ($lokers as $loker)  
                                            <option value="{{ $loker->master_jabatan_id }}">{{ $loker->masterJabatan->nama_jabatan }}</option>    
                                        @endforeach
                                    </select>  
                                </div>  
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="surat_lamaran">Scan Surat Lamaran (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" autofocus value="{{ old('surat_lamaran') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="curriculum_vitae">Scan Curriculum Vitae (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" autofocus value="{{ old('curriculum_vitae') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ijazah">Scan Ijazah (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" autofocus value="{{ old('ijazah') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="transkip_nilai">Scan Transkip Nilai (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="transkip_nilai" class="form-control @error('transkip_nilai') is-invalid @enderror" id="transkip_nilai" autofocus value="{{ old('transkip_nilai') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto">Foto 3x4</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" autofocus value="{{ old('foto') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kartu_keluarga">Scan Kartu Keluarga (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" autofocus value="{{ old('kartu_keluarga') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ktp">Scan KTP (JPG/PNG max size 2MB)</label>
                                    <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp" autofocus value="{{ old('ktp') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <hr class="border-secondary">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Kirim</button>
                                </div> 
                            </div> 
                        </div>
                    </form>
                    {{-- end form persyaratan  --}}
                @else
                    @if ($lamaran->status_lamaran == 0)
                        {{-- form persyaratan  --}}
                        <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">selamat datang</h3>
                        <p class="text-center text-capitalize font-weight-bold">silahkan isi formulir dengan lengkap dan benar</p>
                        <form action="{{ route('home.persyaratan.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="master_jabatan_id">Posisi yg dilamar</label>
                                        <select name="master_jabatan_id" id="master_jabatan_id" class="form-control">
                                            <option value="">--Pilih Posisi--</option>
                                            @foreach ($lokers as $loker)  
                                                <option value="{{ $loker->master_jabatan_id }}">{{ $loker->masterJabatan->nama_jabatan }}</option>    
                                            @endforeach
                                        </select>  
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="surat_lamaran">Scan Surat Lamaran (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" autofocus value="{{ old('surat_lamaran') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="curriculum_vitae">Scan Curriculum Vitae (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" autofocus value="{{ old('curriculum_vitae') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ijazah">Scan Ijazah (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" autofocus value="{{ old('ijazah') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="transkip_nilai">Scan Transkip Nilai (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="transkip_nilai" class="form-control @error('transkip_nilai') is-invalid @enderror" id="transkip_nilai" autofocus value="{{ old('transkip_nilai') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto">Foto 3x4</label>
                                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" autofocus value="{{ old('foto') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kartu_keluarga">Scan Kartu Keluarga (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" autofocus value="{{ old('kartu_keluarga') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ktp">Scan KTP (JPG/PNG max size 2MB)</label>
                                        <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp" autofocus value="{{ old('ktp') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Kirim</button>
                                    </div> 
                                </div> 
                            </div>
                        </form>
                        {{-- end form persyaratan  --}}
                    @elseif ($lamaran->status_lamaran == 1)
                        <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">terima kasih</h3>
                        <p class="text-center text-capitalize font-weight-bold">berkas sedang kami proses...</p>
                    @elseif ($lamaran->status_lamaran == 2)
                        {{-- form rekrutmen  --}}
                        <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">selamat datang</h3>
                        <p class="text-center text-capitalize font-weight-bold">silahkan isi formulir dengan lengkap dan benar</p>
                        <form action="{{ route('home.rekrutmen.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                {{-- data pribadi  --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_panggilan">Nama Panggilan</label>
                                        <input type="text" name="nama_panggilan" class="form-control" id="nama_panggilan" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_ktp">Nomor KTP</label>
                                        <input type="text" name="nomor_ktp" class="form-control" id="nomor_ktp">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_sim">Nomor SIM</label>
                                        <input type="text" name="nomor_sim" class="form-control @error('nomor_sim') is-invalid @enderror" id="nomor_sim" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror">
                                            <option value="ISLAM">ISLAM</option>
                                            <option value="KRISTEN">KRISTEN</option>
                                            <option value="HINDU">HINDU</option>
                                            <option value="BUDHA">BUDHA</option>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="l">Laki - laki</option>
                                            <option value="p">Perempuan</option>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="text" class="form-control pl-3 tanggal_lahir" name="tanggal_lahir" autocomplete="off">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_ktp">Alamat Sesuai KTP</label>
                                        <input type="text" name="alamat_ktp" class="form-control" id="alamat_ktp" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_sekarang">Alamat Sekarang</label>
                                        <input type="text" name="alamat_sekarang" class="form-control" id="alamat_sekarang" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status_perkawinan">Status Perkawinan</label>
                                        <select name="status_perkawinan" id="status_perkawinan" class="form-control @error('status_perkawinan') is-invalid @enderror">
                                            
                                        </select>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- media sosial  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Media Sosial</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="instagram" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin" placeholder="">
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="">
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- susunan keluarga sebelum menikah --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Susunan Keluarga Sebelum Menikah</p>
                                </div>

                                <input type="hidden" name="keluarga_sebelum_menikah_hubungan[]" class="form-control" id="keluarga_sebelum_menikah_hubungan[]" value="AYAH">
                                <input type="hidden" name="keluarga_sebelum_menikah_hubungan[]" class="form-control" id="keluarga_sebelum_menikah_hubungan[]" value="IBU">

                                <input type="hidden" name="keluarga_sebelum_menikah_jenis_kelamin[]" class="form-control" id="jenis_kelamin_ayah" value="L">
                                <input type="hidden" name="keluarga_sebelum_menikah_jenis_kelamin[]" class="form-control" id="jenis_kelamin_ibu" value="P">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_nama[]" class="form-control" id="nama_ayah" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usia_ayah">Usia Ayah</label>
                                        <input type="number" name="keluarga_sebelum_menikah_usia[]" class="form-control" id="usia_ayah">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pendidikan_terakhir[]" class="form-control" id="pendidikan_terakhir_ayah" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_terkahir_ayah">Pekerjaan Terakhir Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pekerjaan_terakhir[]" class="form-control" id="pekerjaan_terkahir_ayah" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_nama[]" class="form-control" id="nama_ibu" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usia_ibu">Usia Ibu</label>
                                        <input type="number" name="keluarga_sebelum_menikah_usia[]" class="form-control" id="usia_ibu">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pendidikan_terakhir[]" class="form-control" id="pendidikan_terakhir_ibu" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_terakhir_ibu">Pekerjaan Terakhir Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pekerjaan_terakhir[]" class="form-control" id="pekerjaan_terakhir_ibu" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div>   
                                <div class="col-lg-12 col-md-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="penghasilan_orangtua">Penghasilan Orang Tua</label>
                                        <input type="number" name="keluarga_sebelum_menikah_pekerjaan_terakhir[]" class="form-control" id="penghasilan_orangtua" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div>                                 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_saudara">Jumlah Saudara</label>
                                        <select name="jml_saudara" id="jml_saudara" class="form-control">
                                            <option value="0">Tidak punya saudara</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>  
                                </div> 
                                <p class="container" id="saudara">  

                                </p>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- susunan keluarga setelah menikah  --}}
                                <div class="container" id="susunan_keluarga_setelah_menikah">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center text-capitalize font-weight-bold">Susunan Keluarga Setelah Menikah</p>
                                        </div>

                                        {{-- hubungan  --}}
                                        <div id="hubungan" class="container">
                                            
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jml_anak">Jumlah Anak</label>
                                                <select name="jml_anak" id="jml_anak" class="form-control @error('jml_anak') is-invalid @enderror">
                                                    <option value="0">Belum punya anak</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>  
                                        </div>
                                        <p class="container" id="anak">  

                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <hr class="border-secondary">
                                        </div> 
                                    </div> 
                                </div>

                                {{-- kerabat yg bisa dihubungi saat darurat  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Kerabat Yg Bisa Dihubungi Saat Darurat</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_hubungan">Hubungan</label>
                                        <input type="text" name="kerabat_hubungan" class="form-control" id="kerabat_hubungan" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_nama">Nama Kerabat</label>
                                        <input type="text" name="kerabat_nama" class="form-control" id="kerabat_nama" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" name="kerabat_jenis_kelamin" class="form-control" id="kerabat_jenis_kelamin" placeholder="L/P">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_telepon">Telepon Kerabat</label>
                                        <input type="number" name="kerabat_telepon" class="form-control" id="kerabat_telepon">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kerabat_alamat">Alamat Kerabat</label>
                                        <input type="text" name="kerabat_alamat" class="form-control" id="kerabat_alamat" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- data pendidikan  --}}                                
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Data Pendidikan Terakhir</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pendidikan_tingkat">Tingkatan Pendidikan</label>
                                        <select name="pendidikan_tingkat" id="pendidikan_tingkat" class="form-control">
                                            <option value="">--Pilih Pendidikan--</option>
                                            <option value="1">SD / Sederajat</option>
                                            <option value="2">SMP / Sederajat</option>
                                            <option value="3">SMA / Sederajat</option>
                                            <option value="4">D1</option>
                                            <option value="5">D2</option>
                                            <option value="6">D3</option>
                                            <option value="7">S1</option>
                                            <option value="8">S2</option>
                                            <option value="9">S3</option>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pendidikan_nama_gedung">Nama <span class="nama_gedung"></span></label>
                                        <input type="text" name="pendidikan_nama_gedung" class="form-control" id="pendidikan_nama_gedung" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_kota">Kota</label>
                                        <input type="text" name="pendidikan_kota" class="form-control" id="pendidikan_kota" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group jurusan">
                                        
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_tahun_masuk">Tahun Masuk</label>
                                        <input type="text" name="pendidikan_tahun_masuk" class="form-control" id="pendidikan_tahun_masuk" maxlength="4" placeholder="ex 2020" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_tahun_lulus">Tahun Lulus</label>
                                        <input type="text" name="pendidikan_tahun_lulus" class="form-control" id="pendidikan_tahun_lulus" maxlength="4" placeholder="ex 2020" onkeyup="this.value = this.value.toUpperCase()">
                                    </div>  
                                </div>                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div>

                                {{-- pelatihan  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Pelatihan / Kursus</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Apakah anda punya riwayat pelatihan / kursus? Jika ada, berapa dan sebutkan</label>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_riwayat_pelatihan">Jumlah Riwayat Pelatihan</label>
                                        <select name="jml_riwayat_pelatihan" id="jml_riwayat_pelatihan" class="form-control">
                                            <option value="0">Tidak Ada</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>  
                                </div>
                                <div id="riwayat_pelatihan" class="container">
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- penghargaan  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Penghargaan</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Apakah anda punya riwayat penghargaan? Jika ada, berapa dan sebutkan</label>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_riwayat_penghargaan">Jumlah Riwayat Penghargaan</label>
                                        <select name="jml_riwayat_penghargaan" id="jml_riwayat_penghargaan" class="form-control">
                                            <option value="0">Tidak Ada</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>  
                                </div>
                                <div id="riwayat_penghargaan" class="container">
                                    
                                </div>                             
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- pengalaman organisasi  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Pengalaman Organisasi</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Apakah anda punya riwayat organisasi? Jika ada, berapa dan sebutkan</label>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_riwayat_organisasi">Jumlah Riwayat Organisasi</label>
                                        <select name="jml_riwayat_organisasi" id="jml_riwayat_organisasi" class="form-control">
                                            <option value="0">Tidak Ada</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>  
                                </div>
                                <div id="riwayat_organisasi" class="container">
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- riwayat pekerjaan terkahir  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Riwayat Pekerjaan</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan1">Apakah anda punya riwayat pekerjaan? Jika ada, berapa dan sebutkan</label>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_riwayat_pekerjaan">Jumlah Riwayat Pekerjaan</label>
                                        <select name="jml_riwayat_pekerjaan" id="jml_riwayat_pekerjaan" class="form-control">
                                            <option value="0">Tidak Ada</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>  
                                </div>
                                <div id="riwayat_pekerjaan" class="container">
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- pertanyaan tambahan  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Pertanyaan Tambahan</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Apakah anda sedang mengikuti peroses rekrutmen dan seleksi di perusahaan lain? Jika ya, sebutkan nama perusahaannya</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_1" id="pertanyaan1_ya" value="ya">
                                        <label class="form-check-label" for="pertanyaan1_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_1" id="pertanyaan1_tidak" value="tidak">
                                        <label class="form-check-label" for="pertanyaan1_tidak">Tidak</label>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jawaban_uraian_1">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_1" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Apakah anda bersedia dengan jam kerja shift dan system kontrak?</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_2" id="pertanyaan2_ya" value="ya">
                                        <label class="form-check-label" for="pertanyaan2_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_2" id="pertanyaan2_tidak" value="tidak">
                                        <label class="form-check-label" for="pertanyaan2_tidak">Tidak</label>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jawaban_uraian_2">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_2" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Apa anda bersedia di tempatkan di segala posisi kerja? Sebutkan posisi yang anda inginkan dan mengapa</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_3" id="pertanyaan3_ya" value="ya">
                                        <label class="form-check-label" for="pertanyaan3_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jawaban_3" id="pertanyaan3_tidak" value="tidak">
                                        <label class="form-check-label" for="pertanyaan3_tidak">Tidak</label>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jawaban_uraian_3">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_3" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Apa alasan anda mendaftar di perusahaan kami?</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="jawaban_4" id="pertanyaan3_tidak" value="null" checked style="display: none;">

                                        <label for="jawaban_uraian_4">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_4" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Bila diterima, berapa besar gaji dan fasilitas apa yang anda harapkan? Apakah menurut anda layak?</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="jawaban_5" id="pertanyaan3_tidak" value="null" checked style="display: none;">

                                        <label for="jawaban_uraian_5">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_5" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pertanyaan">Bila diterima, kapankah anda bisa mulai kerja?</label>
                                        <input type="hidden" name="pertanyaan[]" id="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="jawaban_6" id="pertanyaan3_tidak" value="null" checked style="display: none;">

                                        <label for="jawaban_uraian_6">Uraian:</label>
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_6" class="form-control" cols="30" rows="3"></textarea>
                                    </div>  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 

                                {{-- pernyataan  --}}
                                <div class="col-md-12">
                                    <p class="text-center text-capitalize font-weight-bold">Pernyataan</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check form-check">
                                        <input class="form-check-input" type="checkbox" name="pernyataan" id="pernyataan" value="yes">
                                        <label class="form-check-label" for="pernyataan"> Dengan ini saya menyatakan bahwa keterangan yang saya berikan diatas adalah benar isinya, Bilamana ternyata terdapat ketidakbenaran, saya bertanggung jawab penuh atas akibatnya.</label>
                                    </div>
                                </div>

                                {{-- footer  --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr class="border-secondary">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Kirim</button>
                                    </div> 
                                </div> 
                            </div>
                        </form>
                        @elseif ($lamaran->status_lamaran == 3)
                            <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">terima kasih</h3>
                            <p class="text-center text-capitalize font-weight-bold">berkas sedang kami proses...</p>
                        @else
                        <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">terima kasih</h3>
                        <p class="text-center text-capitalize font-weight-bold">berkas sedang kami proses...</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ asset('js/bootstrap4/bootstrap-datepicker.min.js') }}"></script>


<script>
    $(document).ready(function() {

        $('#nomor_ktp').on('keyup', function() {
            var jml_karakter = $(this).val();
            if (jml_karakter.length == 16) {
                var provinsi = jml_karakter.substring(0,2);
                var kabupaten = jml_karakter.substring(0,4);
                var kecamatan = jml_karakter.substring(0,6);
                var tanggal_lahir = jml_karakter.substring(6,12);
                console.log("provinsi " + provinsi + " kabupaten " + kabupaten + " kecamatan " + kecamatan + " tanggal lahir " + tanggal_lahir);
            }
        });

        function ktp(nomor_ktp) {

        }
        
        $('#jenis_kelamin').on('change', function() {

            var jenis_kelamin_value = $('#jenis_kelamin').val();
            $('#status_perkawinan').empty();

            var jenis_kelamin = "" +
                "<option value=\"\">--Pilih Status--</option>" +
                "<option value=\"1\">Lajang</option>" +
                "<option value=\"2\">Menikah</option>" +
                "<option value=\"3\">Cerai</option>";
                if (jenis_kelamin_value == "l") {
                    jenis_kelamin += "<option value=\"4\">Duda</option>";
                } else {
                    jenis_kelamin += "<option value=\"5\">Janda</option>";
                }
            
            $('#status_perkawinan').append(jenis_kelamin);
        });

        $('#status_perkawinan').on('change', function() {

            $('#hubungan').empty();

            var jenis_kelamin_value = $('#jenis_kelamin').val();
            var status_perkawinan_value = $('#status_perkawinan').val();

            if (status_perkawinan_value == 1) {
                $('#susunan_keluarga_setelah_menikah').hide();
            } else if (status_perkawinan_value == 2) {
                $('#susunan_keluarga_setelah_menikah').show();

                var hubungan_istri = "" +
                    "<input type=\"hidden\" name=\"keluarga_setelah_menikah_hubungan[]\" class=\"form-control\" value=\"istri\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_istri\">Nama Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control\" id=\"nama_istri\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_istri\">Tempat Lahir Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control\" id=\"tempat_lahir_istri\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_istri\">Tanggal Lahir Istri</label>" +
                                "<input type=\"text\" id=\"tanggal_lahir_istri\" class=\"form-control pl-3 tanggal_lahir_istri\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_istri\">Pekerjaan Terakhir Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control\" id=\"pekerjaan_terakhir_istri\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                    "</div>";

                var hubungan_suami = "" +
                    "<input type=\"hidden\" name=\"keluarga_setelah_menikah_hubungan[]\" class=\"form-control\" value=\"suami\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_suami\">Nama Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control\" id=\"nama_suami\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_suami\">Tempat Lahir Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control\" id=\"tempat_lahir_suami\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_suami\">Tanggal Lahir Suami</label>" +
                                "<input type=\"text\" id=\"tanggal_lahir_suami\" class=\"form-control pl-3 tanggal_lahir_suami\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_suami\">Pekerjaan Terakhir Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control\" id=\"pekerjaan_terakhir_suami\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                    "</div>";

                if (jenis_kelamin_value == "l") {
                    $('#hubungan').append(hubungan_istri);
                } else {
                    $('#hubungan').append(hubungan_suami);
                }
            } else {
                $('#susunan_keluarga_setelah_menikah').show();
            }
        });

        $('#jml_saudara').on('change', function() {
            var jml_saudara = $('#jml_saudara').val();
            var saudara = $('#saudara').empty();

            for (let index = 1; index <= jml_saudara; index++) {

                var form_saudara = "" +
                    "<input type=\"hidden\" name=\"keluarga_sebelum_menikah_hubungan[]\" class=\"form-control\" id=\"keluarga_sebelum_menikah_hubungan[]\" value=\"saudara\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_saudara\">Nama Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_nama[]\" class=\"form-control\" id=\"nama_saudara\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"usia_saudara\">Usia Saudara " + index + "</label>" +
                                "<input type=\"number\" name=\"keluarga_sebelum_menikah_usia[]\" class=\"form-control\" id=\"usia_saudara\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"jenis_kelamin_saudara\">Jenis Kelamin Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_jenis_kelamin[]\" class=\"form-control\" id=\"jenis_kelamin_saudara\" placeholder=\"L/P\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pendidikan_terakhir_saudara\">Pendidikan Terakhir Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_pendidikan_terakhir[]\" class=\"form-control\" id=\"pendidikan_terakhir_saudara\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_saudara\">Pekerjaan Terakhir Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_pekerjaan_terakhir[]\" class=\"form-control\" id=\"pekerjaan_terakhir_saudara\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                    "</div><hr>";
                $('#saudara').append(form_saudara);
            }
        });
        
        $('#jml_anak').on('change', function() {
            var jml_anak = $('#jml_anak').val();
            $('#anak').empty();

            for (let index = 1; index <= jml_anak; index++) {    
                var form_anak = "" +
                    "<input type=\"hidden\" name=\"keluarga_setelah_menikah_hubungan[]\" class=\"form-control\" value=\"anak\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_anak\">Nama Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control\" id=\"nama_anak\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_anak\">Tempat Lahir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control\" id=\"tempat_lahir_anak\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_anak\">Tanggal Lahir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\" class=\"form-control\" id=\"tanggal_lahir_anak\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                                "<input type=\"text\" id=\"tanggal_lahir_anak\" class=\"form-control pl-3 tanggal_lahir_anak\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_anak\">Pekerjaan Terakhir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control\" id=\"pekerjaan_terakhir_anak\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" +
                    "</div><hr>";

                $('#anak').append(form_anak);
            }
        });

        $('#pendidikan_tingkat').on('change', function() {
            
            $('.nama_gedung').empty();
            $('.jurusan').empty();
            var pendidikan_tingkat_value = $('#pendidikan_tingkat').val();
            var form_jurusan = "" +
                "<label for=\"pendidikan_jurusan\">Jurusan</label>" +
                "<input type=\"text\" name=\"pendidikan_jurusan\" class=\"form-control\" id=\"pendidikan_jurusan\" onkeyup=\"this.value = this.value.toUpperCase()\">";

            if (pendidikan_tingkat_value == 1 || pendidikan_tingkat_value == 2) {
                $('.nama_gedung').append('Sekolah');
            } else if (pendidikan_tingkat_value == 3) {
                $('.nama_gedung').append('Sekolah');
                $('.jurusan').append(form_jurusan);
            } else {
                $('.nama_gedung').append('Kampus');
                $('.jurusan').append(form_jurusan);
            }
        });

        $('input[type=radio][name=pekerjaan_radio]').change(function() {
            if (this.value == 'ya') {
                $('#riwayat_pekerjaan').show();
            }
            else if (this.value == 'tidak') {
                $('#riwayat_pekerjaan').hide();
            }
        });

        $('#jml_riwayat_pelatihan').on('change', function() {

            var jml_pelatihan = $('#jml_riwayat_pelatihan').val();
            $('#riwayat_pelatihan').empty();

            for (let index = 1; index <= jml_pelatihan; index++) {
                var pelatihan_value = "" +
                    "<div class=\"row\">" +
                        "<div class=\"col-md-12\">" +
                            "<div class=\"form-group\">" +
                                "<hr class=\"border-secondary\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pelatihan_nama\">Nama Pelatihan " + index + "</label>" +
                                "<input type=\"text\" name=\"pelatihan_nama[]\" class=\"form-control\" id=\"pelatihan_nama\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pelatihan_tahun\">Tahun</label>" +
                                "<input type=\"text\" name=\"pelatihan_tahun[]\" class=\"form-control\" id=\"pelatihan_tahun\" maxlength=\"4\" placeholder=\"ex 2020\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                    "</div>";

                $('#riwayat_pelatihan').append(pelatihan_value);
            }

        });

        $('#jml_riwayat_penghargaan').on('change', function() {

            var jml_penghargaan = $('#jml_riwayat_penghargaan').val();
            $('#riwayat_penghargaan').empty();

            for (let index = 1; index <= jml_penghargaan; index++) {
                var penghargaan_value = "" +
                    "<div class=\"row\">" +
                        "<div class=\"col-md-12\">" +
                            "<div class=\"form-group\">" +
                                "<hr class=\"border-secondary\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"penghargaan_nama\">Nama penghargaan " + index + "</label>" +
                                "<input type=\"text\" name=\"penghargaan_nama[]\" class=\"form-control\" id=\"penghargaan_nama\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"penghargaan_tahun\">Tahun</label>" +
                                "<input type=\"text\" name=\"penghargaan_tahun[]\" class=\"form-control\" id=\"penghargaan_tahun\" maxlength=\"4\" placeholder=\"ex 2020\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +
                        "</div>" +
                    "</div>";

                $('#riwayat_penghargaan').append(penghargaan_value);
            }

        });

        $('#jml_riwayat_organisasi').on('change', function() {

            var jml_organisasi = $('#jml_riwayat_organisasi').val();
            $('#riwayat_organisasi').empty();

            for (let index = 1; index <= jml_organisasi; index++) {
                var organisasi_value = "" +
                    "<div class=\"row\">" +
                        "<div class=\"col-md-12\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"organisasi_nama\">Nama Organisasi " + index + "</label>" +
                                "<input type=\"text\" name=\"organisasi_nama[]\" class=\"form-control id=\"organisasi_nama\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"organisasi_jabatan\">Jabatan</label>" +
                                "<input type=\"text\" name=\"organisasi_jabatan[]\" class=\"form-control\" id=\"organisasi_jabatan\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"organisasi_masa_kerja\">Masa Kerja</label>" +
                                "<input type=\"text\" name=\"organisasi_masa_kerja[]\" class=\"form-control\" id=\"organisasi_masa_kerja\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" +
                    "</div>";

                $('#riwayat_organisasi').append(organisasi_value);
            }

        });

        $('#jml_riwayat_pekerjaan').on('change', function() {
            var jml_pekerjaan = $('#jml_riwayat_pekerjaan').val();
            $('#riwayat_pekerjaan').empty();

            for (let index = 1; index <= jml_pekerjaan; index++) {
                var pekerjaan_value = "" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_nama\">Nama Perusahaan " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_nama[]\" class=\"form-control\" id=\"pekerjaan_nama\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jenis_industri\">Jenis Industri " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jenis_industri[]\" class=\"form-control\" id=\"pekerjaan_jenis_industri\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jabatan_awal\">Jabatan Awal " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jabatan_awal[]\" class=\"form-control\" id=\"pekerjaan_jabatan_awal\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jabatan_akhir\">Jabatan Akhir " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jabatan_akhir[]\" class=\"form-control\" id=\"pekerjaan_jabatan_akhir\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_awal_bekerja\">Awal Bekerja " + index + "</label>" +
                                "<input type=\"text\" class=\"form-control pl-3 pekerjaan_awal_bekerja_"+index+"\" name=\"pekerjaan_awal_bekerja[]\" autocomplete=\"off\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_akhir_bekerja\">Akhir Bekerja " + index + "</label>" +
                                "<input type=\"text\" class=\"form-control pl-3 pekerjaan_akhir_bekerja_"+index+"\" name=\"pekerjaan_akhir_bekerja[]\" autocomplete=\"off\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_gaji_awal\">Gaji Awal " + index + "</label>" +
                                "<input type=\"number\" name=\"pekerjaan_gaji_awal[]\" class=\"form-control\" id=\"pekerjaan_gaji_awal\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_gaji_akhir\">Gaji Akhir " + index + "</label>" +
                                "<input type=\"number\" name=\"pekerjaan_gaji_akhir[]\" class=\"form-control\" id=\"pekerjaan_gaji_akhir\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_nama_atasan\">Nama Atasan Langsung " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_nama_atasan[]\" class=\"form-control\" id=\"pekerjaan_nama_atasan\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_alasan_berhenti\">Alasan Berhenti " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_alasan_berhenti[]\" class=\"form-control\" id=\"pekerjaan_alasan_berhenti\" onkeyup=\"this.value = this.value.toUpperCase()\">" +
                            "</div>" +  
                        "</div>" +
                        "<div class=\"col-md-12\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tugas_pokok\">Uraikan Tugas Pokok Anda Di Perusahaan Terakhir " + index + "</label>" +
                                "<textarea name=\"tugas_pokok\" id=\"tugas_pokok[]\" class=\"form-control\" cols=\"30\" rows=\"3\" onkeyup=\"this.value = this.value.toUpperCase()\"></textarea>" +
                            "</div>" +  
                        "</div>" +
                    "</div>";

                

                $('#riwayat_pekerjaan').append(pekerjaan_value);

                $(function() {
                    $(".pekerjaan_awal_bekerja_"+index).datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                    $(".pekerjaan_akhir_bekerja_"+index).datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                });
            }
        });

        $(function(){
            $(".tanggal_lahir").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
            });

            $(".tanggal_lahir_istri").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
            });

            $(".tanggal_lahir_suami").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
            });

            $(".tanggal_lahir_anak").datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true,
            });
		});
    });
</script>
@endsection
