@extends('admin.layouts.master')

@section('title', 'Products Page')
@section('products', 'active')

@push('customcss')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assetdashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
        <a href="{{ route('products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah
        </a>
    </div>

    <!-- Alert -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="delete-response">

    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableProducts">
                            <thead>
                                <tr>
                                    <th width="70px">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th width="200px">Image</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger delete-product" value="">
                        <strong>
                            Hapus
                        </strong>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <!-- Page level custom scripts -->
    <script src="{{ asset('assetdashboard/js/demo/datatables-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assetdashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#tableProducts').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                        url: "{{ route('products.index') }}",
                        type: 'GET'
                },
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        width: '1%',
                        orderable: false,
                        searchable: false
                    },
                    {
                        name: 'NamaKategori',
                        data: 'NamaKategori',
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price',
                    },
                    {
                        data: 'desc',
                        name: 'desc',
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '1%'
                    }
                ],
                sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',

                "fnCreatedRow": function(nRow, data) {
                    $(nRow).attr('id', 'products' + data.id);
            },
            });
        });

        $(document).on("click", ".delete_modal", function() {
            var id = $(this).data('id');
            $(".modal-footer .delete-product").val(id);
        });

        jQuery(document).ready(function($) {
            ////----- DELETE a link and remove from the page -----////
            jQuery('.delete-product').click(function() {
                var products_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: 'products/' + products_id,
                    success: function(data) {
                        $('#exampleModal').modal('hide');
                        $("#products" + products_id).remove();
                        $(".delete-response").append(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Produk Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                        )
                    },
                    error: function(data) {
                        if (data.status === 403) {
                            $('#exampleModal').modal('hide');
                            $(".delete-response").append(
                                '<div class="alert alert-danger alert-dismissible fade show" role="alert">Unauthorized : Anda Tidak Memiliki Akses Untuk Menghapus Data<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
                            )
                        }
                    }
                });
            });
        });
    </script>
@endpush