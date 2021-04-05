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
                                    <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" required autofocus value="{{ old('surat_lamaran') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="curriculum_vitae">Scan Curriculum Vitae (Format .jpg)</label>
                                    <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" required autofocus value="{{ old('curriculum_vitae') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ijazah">Scan Ijazah (Format .jpg)</label>
                                    <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" required autofocus value="{{ old('ijazah') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="transkip_nilai">Scan Transkip Nilai (Format .jpg)</label>
                                    <input type="file" name="transkip_nilai" class="form-control @error('transkip_nilai') is-invalid @enderror" id="transkip_nilai" required autofocus value="{{ old('transkip_nilai') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto">Foto 3x4</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" required autofocus value="{{ old('foto') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kartu_keluarga">Scan Kartu Keluarga (Format .jpg)</label>
                                    <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" required autofocus value="{{ old('kartu_keluarga') }}">
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ktp">Scan KTP (Format .jpg)</label>
                                    <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp" required autofocus value="{{ old('ktp') }}">
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
                        {{-- form persyaratan  --}}
                        <h3 class="text-uppercase font-weight-bold p-2 text-center selamatdatang">selamat datang</h3>
                        <p class="text-center text-capitalize font-weight-bold">silahkan isi formulir dengan lengkap dan benar</p>
                        <form action="{{ route('home.persyaratan.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_panggilan">Nama Panggilan</label>
                                        <input type="text" name="nama_panggilan" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_ktp">Nomor KTP</label>
                                        <input type="text" name="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" id="nomor_ktp" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nomor_sim">Nomor SIM</label>
                                        <input type="text" name="nomor_sim" class="form-control @error('nomor_sim') is-invalid @enderror" id="nomor_sim" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" id="agama" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_ktp">Alamat Sesuai KTP</label>
                                        <input type="text" name="alamat_ktp" class="form-control @error('alamat_ktp') is-invalid @enderror" id="alamat_ktp" placeholder="" required>
                                    </div>  
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat_sekarang">Alamat Sekarang</label>
                                        <input type="text" name="alamat_sekarang" class="form-control @error('alamat_sekarang') is-invalid @enderror" id="alamat_sekarang" placeholder="" required>
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
                                        <input type="file" name="surat_lamaran" class="form-control @error('surat_lamaran') is-invalid @enderror" id="surat_lamaran" required autofocus value="{{ old('surat_lamaran') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="curriculum_vitae">Scan Curriculum Vitae (Format .jpg)</label>
                                        <input type="file" name="curriculum_vitae" class="form-control @error('curriculum_vitae') is-invalid @enderror" id="curriculum_vitae" required autofocus value="{{ old('curriculum_vitae') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ijazah">Scan Ijazah (Format .jpg)</label>
                                        <input type="file" name="ijazah" class="form-control @error('ijazah') is-invalid @enderror" id="ijazah" required autofocus value="{{ old('ijazah') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="transkip_nilai">Scan Transkip Nilai (Format .jpg)</label>
                                        <input type="file" name="transkip_nilai" class="form-control @error('transkip_nilai') is-invalid @enderror" id="transkip_nilai" required autofocus value="{{ old('transkip_nilai') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="foto">Foto 3x4</label>
                                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" required autofocus value="{{ old('foto') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kartu_keluarga">Scan Kartu Keluarga (Format .jpg)</label>
                                        <input type="file" name="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror" id="kartu_keluarga" required autofocus value="{{ old('kartu_keluarga') }}">
                                    </div> 
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="ktp">Scan KTP (Format .jpg)</label>
                                        <input type="file" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp" required autofocus value="{{ old('ktp') }}">
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
