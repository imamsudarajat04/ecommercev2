@extends('admin.layouts.master')

@section('title', 'Show Page')
@section('users','active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail : {{ $data->name }}</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('users.index') }}"><i class="fas fa-caret-left"></i> Kembali</a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row details-pendaftaran">
                        {{-- <div class="col-12 col-md-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title mb-2">Foto</div>
                                </div>
                                <div class="col-12 image-wrapper mb-3">
                                    <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->foto) && $data->foto ? Storage::url($data->foto) : asset('images/user.png') }}')"></div>
                                </div>
                                <div class="col-12">
                                    <div class="title mb-2">Swafoto</div>
                                </div>
                                <div class="col-12 image-wrapper">
                                    <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->swafoto) && $data->swafoto ? Storage::url($data->swafoto) : asset('images/user.png') }}')"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="title">Nama Lengkap</div>
                                    <div class="subtitle">{{ $data->name }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="title">Tanggal Lahir</div>
                                    <div class="subtitle">{{ \Carbon\Carbon::parse($data->dateBirth)->format('d/m/Y') }}</div>
                                </div>
                            </div></br>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="title">Jenis Kelamin</div>
                                    <div class="subtitle">{{ $data->gender }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="title">No. HP / WA</div>
                                    <div class="subtitle">{{ $data->phone }}</div>
                                </div>
                            </div></br>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="title">Alamat</div>
                                    <div class="subtitle">{{ $data->address }}</div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="title">Role</div>
                                    <div class="subtitle">{{ $data->role }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection