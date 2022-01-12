@extends('admin.layouts.master')

@section('title', 'Products Page')
@section('products', 'active')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Produk</h1>
        <div class="pull-right">
            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('products.index') }}"><i class="fas fa-caret-left"></i> Back</a>
        </div>
    </div>

    <!-- Alert -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Kategori Produk</label>
                                <div class="col-12">
                                    <select name="category_id" class="form-control" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Nama Produk</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name" placeholder="Masukan Nama Produk" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Harga Produk</label>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="price" placeholder="Masukan Harga Produk" value="{{ old('price') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Deskripsi Produk</label>
                                <div class="col-12">
                                    <textarea class="form-control" name="desc" placeholder="Masukan Deskripsi Produk">{{ old('desc') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-12 control-label">Foto Barang</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFile"/>
                                        <label class="custom-file-label" for="customFile">Pilih Foto Barang</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        $('#customFile').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //clean fake path
            var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(cleanFileName);
        });
    </script>
@endpush