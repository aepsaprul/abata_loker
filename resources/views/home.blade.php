@extends('layouts.app')

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
                                    <label for="surat_lamaran">Scan Surat Lamaran (Format .jpg)</label>
                                    <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" autofocus value="{{ old('surat_lamaran') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="curriculum_vitae">Scan Curriculum Vitae (Format .jpg)</label>
                                    <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" autofocus value="{{ old('curriculum_vitae') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ijazah">Scan Ijazah (Format .jpg)</label>
                                    <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" autofocus value="{{ old('ijazah') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="transkip_nilai">Scan Transkip Nilai (Format .jpg)</label>
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
                                    <label for="kartu_keluarga">Scan Kartu Keluarga (Format .jpg)</label>
                                    <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" autofocus value="{{ old('kartu_keluarga') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ktp">Scan KTP (Format .jpg)</label>
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
                    @if ($lamaran->status_lamaran == 1)
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
                                        <input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_ktp">Nomor KTP</label>
                                        <input type="text" name="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" id="nomor_ktp" placeholder="">
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
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
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
                                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_ktp">Alamat Sesuai KTP</label>
                                        <input type="text" name="alamat_ktp" class="form-control @error('alamat_ktp') is-invalid @enderror" id="alamat_ktp" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_sekarang">Alamat Sekarang</label>
                                        <input type="text" name="alamat_sekarang" class="form-control @error('alamat_sekarang') is-invalid @enderror" id="alamat_sekarang" placeholder="">
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

                                <input type="hidden" name="keluarga_sebelum_menikah_hubungan[]" class="form-control @error('keluarga_sebelum_menikah_hubungan[]') is-invalid @enderror" id="keluarga_sebelum_menikah_hubungan[]" value="ayah">
                                <input type="hidden" name="keluarga_sebelum_menikah_hubungan[]" class="form-control @error('keluarga_sebelum_menikah_hubungan[]') is-invalid @enderror" id="keluarga_sebelum_menikah_hubungan[]" value="ibu">

                                <input type="hidden" name="keluarga_sebelum_menikah_jenis_kelamin[]" class="form-control @error('jenis_kelamin_ayah') is-invalid @enderror" id="jenis_kelamin_ayah" value="L">
                                <input type="hidden" name="keluarga_sebelum_menikah_jenis_kelamin[]" class="form-control @error('jenis_kelamin_ibu') is-invalid @enderror" id="jenis_kelamin_ibu" value="P">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_nama[]" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usia_ayah">Usia Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_usia[]" class="form-control @error('usia_ayah') is-invalid @enderror" id="usia_ayah" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pendidikan_terakhir[]" class="form-control @error('pendidikan_terakhir_ayah') is-invalid @enderror" id="pendidikan_terakhir_ayah" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_terkahir_ayah">Pekerjaan Terakhir Ayah</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pekerjaan_terakhir[]" class="form-control @error('pekerjaan_terkahir_ayah') is-invalid @enderror" id="pekerjaan_terkahir_ayah" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_nama[]" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="usia_ibu">Usia Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_usia[]" class="form-control @error('usia_ibu') is-invalid @enderror" id="usia_ibu" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pendidikan_terakhir[]" class="form-control @error('pendidikan_terakhir_ibu') is-invalid @enderror" id="pendidikan_terakhir_ibu" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_terakhir_ibu">Pekerjaan Terakhir Ibu</label>
                                        <input type="text" name="keluarga_sebelum_menikah_pekerjaan_terakhir[]" class="form-control @error('pekerjaan_terakhir_ibu') is-invalid @enderror" id="pekerjaan_terakhir_ibu" placeholder="">
                                    </div>  
                                </div>                                 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jml_saudara">Jumlah Saudara</label>
                                        <select name="jml_saudara" id="jml_saudara" class="form-control @error('jml_saudara') is-invalid @enderror">
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
                                        <input type="text" name="kerabat_hubungan" class="form-control @error('kerabat_hubungan') is-invalid @enderror" id="kerabat_hubungan" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_nama">Nama Kerabat</label>
                                        <input type="text" name="kerabat_nama" class="form-control @error('kerabat_nama') is-invalid @enderror" id="kerabat_nama" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" name="kerabat_jenis_kelamin" class="form-control @error('kerabat_jenis_kelamin') is-invalid @enderror" id="kerabat_jenis_kelamin" placeholder="L/P">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="kerabat_telepon">Telepon Kerabat</label>
                                        <input type="text" name="kerabat_telepon" class="form-control @error('kerabat_telepon') is-invalid @enderror" id="kerabat_telepon" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kerabat_alamat">Alamat Kerabat</label>
                                        <input type="text" name="kerabat_alamat" class="form-control @error('kerabat_alamat') is-invalid @enderror" id="kerabat_alamat" placeholder="">
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
                                        <select name="pendidikan_tingkat" id="pendidikan_tingkat" class="form-control @error('pendidikan_tingkat') is-invalid @enderror">
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
                                        <input type="text" name="pendidikan_nama_gedung" class="form-control @error('pendidikan_nama_gedung') is-invalid @enderror" id="pendidikan_nama_gedung" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_kota">Kota</label>
                                        <input type="text" name="pendidikan_kota" class="form-control @error('pendidikan_kota') is-invalid @enderror" id="pendidikan_kota" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group jurusan">
                                        
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_tahun_masuk">Tahun Masuk</label>
                                        <input type="text" name="pendidikan_tahun_masuk" class="form-control @error('pendidikan_tahun_masuk') is-invalid @enderror" id="pendidikan_tahun_masuk" placeholder="">
                                    </div>  
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label for="pendidikan_tahun_lulus">Tahun Lulus</label>
                                        <input type="text" name="pendidikan_tahun_lulus" class="form-control @error('pendidikan_tahun_lulus') is-invalid @enderror" id="pendidikan_tahun_lulus" placeholder="">
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
                                        <select name="jml_riwayat_pelatihan" id="jml_riwayat_pelatihan" class="form-control @error('jml_riwayat_pelatihan') is-invalid @enderror">
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
                                        <select name="jml_riwayat_penghargaan" id="jml_riwayat_penghargaan" class="form-control @error('jml_riwayat_penghargaan') is-invalid @enderror">
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
                                        <select name="jml_riwayat_organisasi" id="jml_riwayat_organisasi" class="form-control @error('jml_riwayat_organisasi') is-invalid @enderror">
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
                                        <select name="jml_riwayat_pekerjaan" id="jml_riwayat_pekerjaan" class="form-control @error('jml_riwayat_pekerjaan') is-invalid @enderror">
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_1" class="form-control @error('jawaban_uraian_1') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_2" class="form-control @error('jawaban_uraian_2') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_3" class="form-control @error('jawaban_uraian_3') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_4" class="form-control @error('jawaban_uraian_4') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_5" class="form-control @error('jawaban_uraian_5') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <textarea name="jawaban_uraian[]" id="jawaban_uraian_6" class="form-control @error('jawaban_uraian_6') is-invalid @enderror" cols="30" rows="3"></textarea>
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
                                        <input class="form-check-input" type="checkbox" id="pernyataan" value="yes">
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
                    @else
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
                                        <label for="surat_lamaran">Scan Surat Lamaran (Format .jpg)</label>
                                        <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" autofocus value="{{ old('surat_lamaran') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="curriculum_vitae">Scan Curriculum Vitae (Format .jpg)</label>
                                        <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" autofocus value="{{ old('curriculum_vitae') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ijazah">Scan Ijazah (Format .jpg)</label>
                                        <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" autofocus value="{{ old('ijazah') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="transkip_nilai">Scan Transkip Nilai (Format .jpg)</label>
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
                                        <label for="kartu_keluarga">Scan Kartu Keluarga (Format .jpg)</label>
                                        <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" autofocus value="{{ old('kartu_keluarga') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ktp">Scan KTP (Format .jpg)</label>
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
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
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
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control @error('nama_istri') is-invalid @enderror\" id=\"nama_istri\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_istri\">Tempat Lahir Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control @error('tempat_lahir_istri') is-invalid @enderror\" id=\"tempat_lahir_istri\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_istri\">Tanggal Lahir Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\" class=\"form-control @error('tanggal_lahir_istri') is-invalid @enderror\" id=\"tanggal_lahir_istri\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_istri\">Pekerjaan Terakhir Istri</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control @error('pekerjaan_terakhir_istri') is-invalid @enderror\" id=\"pekerjaan_terakhir_istri\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                    "</div>";

                var hubungan_suami = "" +
                    "<input type=\"hidden\" name=\"keluarga_setelah_menikah_hubungan[]\" class=\"form-control\" value=\"suami\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_suami\">Nama Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control @error('nama_suami') is-invalid @enderror\" id=\"nama_suami\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_suami\">Tempat Lahir Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control @error('tempat_lahir_suami') is-invalid @enderror\" id=\"tempat_lahir_suami\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_suami\">Tanggal Lahir Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\" class=\"form-control @error('tanggal_lahir_suami') is-invalid @enderror\" id=\"tanggal_lahir_suami\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_suami\">Pekerjaan Terakhir Suami</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control @error('pekerjaan_terakhir_suami') is-invalid @enderror\" id=\"pekerjaan_terakhir_suami\" placeholder=\"\">" +
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
                    "<input type=\"hidden\" name=\"keluarga_sebelum_menikah_hubungan[]\" class=\"form-control @error('keluarga_sebelum_menikah_hubungan[]') is-invalid @enderror\" id=\"keluarga_sebelum_menikah_hubungan[]\" value=\"saudara\">" +
                    "<div class=\"row\">" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"nama_saudara\">Nama Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_nama[]\" class=\"form-control @error('nama_saudara') is-invalid @enderror\" id=\"nama_saudara\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"usia_saudara\">Usia Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_usia[]\" class=\"form-control @error('usia_saudara') is-invalid @enderror\" id=\"usia_saudara\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"jenis_kelamin_saudara\">Jenis Kelamin Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_jenis_kelamin[]\" class=\"form-control @error('jenis_kelamin_saudara') is-invalid @enderror\" id=\"jenis_kelamin_saudara\" placeholder=\"L/P\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pendidikan_terakhir_saudara\">Pendidikan Terakhir Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_pendidikan_terakhir[]\" class=\"form-control @error('pendidikan_terakhir_saudara') is-invalid @enderror\" id=\"pendidikan_terakhir_saudara\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_saudara\">Pekerjaan Terakhir Saudara " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_sebelum_menikah_pekerjaan_terakhir[]\" class=\"form-control @error('pekerjaan_terakhir_saudara') is-invalid @enderror\" id=\"pekerjaan_terakhir_saudara\" placeholder=\"\">" +
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
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_nama[]\" class=\"form-control @error('nama_anak') is-invalid @enderror\" id=\"nama_anak\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tempat_lahir_anak\">Tempat Lahir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tempat_lahir[]\" class=\"form-control @error('tempat_lahir_anak') is-invalid @enderror\" id=\"tempat_lahir_anak\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tanggal_lahir_anak\">Tanggal Lahir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_tanggal_lahir[]\" class=\"form-control @error('tanggal_lahir_anak') is-invalid @enderror\" id=\"tanggal_lahir_anak\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_terakhir_anak\">Pekerjaan Terakhir Anak " + index + "</label>" +
                                "<input type=\"text\" name=\"keluarga_setelah_menikah_pekerjaan_terakhir[]\" class=\"form-control @error('pekerjaan_terakhir_anak') is-invalid @enderror\" id=\"pekerjaan_terakhir_anak\" placeholder=\"\">" +
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
                "<input type=\"text\" name=\"pendidikan_jurusan\" class=\"form-control @error('pendidikan_jurusan') is-invalid @enderror\" id=\"pendidikan_jurusan\" placeholder=\"\">";

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
                                "<input type=\"text\" name=\"pelatihan_nama[]\" class=\"form-control @error('pelatihan_nama') is-invalid @enderror\" id=\"pelatihan_nama\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pelatihan_tahun\">Tahun</label>" +
                                "<input type=\"text\" name=\"pelatihan_tahun[]\" class=\"form-control @error('pelatihan_tahun') is-invalid @enderror\" id=\"pelatihan_tahun\" placeholder=\"\">" +
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
                                "<input type=\"text\" name=\"penghargaan_nama[]\" class=\"form-control @error('penghargaan_nama') is-invalid @enderror\" id=\"penghargaan_nama\" placeholder=\"\">" +
                            "</div>" +
                        "</div>" +
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"penghargaan_tahun\">Tahun</label>" +
                                "<input type=\"text\" name=\"penghargaan_tahun[]\" class=\"form-control @error('penghargaan_tahun') is-invalid @enderror\" id=\"penghargaan_tahun\" placeholder=\"\">" +
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
                                "<input type=\"text\" name=\"organisasi_nama[]\" class=\"form-control @error('organisasi_nama') is-invalid @enderror\" id=\"organisasi_nama\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"organisasi_jabatan\">Jabatan</label>" +
                                "<input type=\"text\" name=\"organisasi_jabatan[]\" class=\"form-control @error('organisasi_jabatan') is-invalid @enderror\" id=\"organisasi_jabatan\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"organisasi_masa_kerja\">Masa Kerja</label>" +
                                "<input type=\"text\" name=\"organisasi_masa_kerja[]\" class=\"form-control @error('organisasi_masa_kerja') is-invalid @enderror\" id=\"organisasi_masa_kerja\" placeholder=\"\">" +
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
                                "<input type=\"text\" name=\"pekerjaan_nama[]\" class=\"form-control @error('pekerjaan_nama') is-invalid @enderror\" id=\"pekerjaan_nama\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jenis_industri\">Jenis Industri " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jenis_industri[]\" class=\"form-control @error('pekerjaan_jenis_industri') is-invalid @enderror\" id=\"pekerjaan_jenis_industri\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jabatan_awal\">Jabatan Awal " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jabatan_awal[]\" class=\"form-control @error('pekerjaan_jabatan_awal') is-invalid @enderror\" id=\"pekerjaan_jabatan_awal\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_jabatan_akhir\">Jabatan Akhir " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_jabatan_akhir[]\" class=\"form-control @error('pekerjaan_jabatan_akhir') is-invalid @enderror\" id=\"pekerjaan_jabatan_akhir\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_awal_bekerja\">Awal Bekerja " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_awal_bekerja[]\" class=\"form-control @error('pekerjaan_awal_bekerja') is-invalid @enderror\" id=\"pekerjaan_awal_bekerja\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_akhir_bekerja\">Akhir Bekerja " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_akhir_bekerja[]\" class=\"form-control @error('pekerjaan_akhir_bekerja') is-invalid @enderror\" id=\"pekerjaan_akhir_bekerja\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_gaji_awal\">Gaji Awal " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_gaji_awal[]\" class=\"form-control @error('pekerjaan_gaji_awal') is-invalid @enderror\" id=\"pekerjaan_gaji_awal\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_gaji_akhir\">Gaji Akhir " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_gaji_akhir[]\" class=\"form-control @error('pekerjaan_gaji_akhir') is-invalid @enderror\" id=\"pekerjaan_gaji_akhir\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_nama_atasan\">Nama Atasan Langsung " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_nama_atasan[]\" class=\"form-control @error('pekerjaan_nama_atasan') is-invalid @enderror\" id=\"pekerjaan_nama_atasan\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" + 
                        "<div class=\"col-lg-6 col-md-6 col-sm-6 col-6\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"pekerjaan_alasan_berhenti\">Alasan Berhenti " + index + "</label>" +
                                "<input type=\"text\" name=\"pekerjaan_alasan_berhenti[]\" class=\"form-control @error('pekerjaan_alasan_berhenti') is-invalid @enderror\" id=\"pekerjaan_alasan_berhenti\" placeholder=\"\">" +
                            "</div>" +  
                        "</div>" +
                        "<div class=\"col-md-12\">" +
                            "<div class=\"form-group\">" +
                                "<label for=\"tugas_pokok\">Uraikan Tugas Pokok Anda Di Perusahaan Terakhir " + index + "</label>" +
                                "<textarea name=\"tugas_pokok\" id=\"tugas_pokok[]\" class=\"form-control @error('tugas_pokok') is-invalid @enderror\" cols=\"30\" rows=\"3\"></textarea>" +
                            "</div>" +  
                        "</div>" +
                    "</div>";

                $('#riwayat_pekerjaan').append(pekerjaan_value);
            }
        });
    });
</script>
@endsection
