@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-6 mx-auto">
                    <h1 class="text-uppercase font-weight-bold p-2 selamatdatang">selamat datang</h1>
                    <p class="text-capitalize font-italic font-weight-bold">silahkan pilih posisi yang akan dilamar</p>
                    <div class="row">
                        @foreach ($lokers as $loker)                                                
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">{{ $loker->masterJabatan->nama_jabatan }}</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
