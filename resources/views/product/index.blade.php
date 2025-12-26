@extends('layouts.master')
@section('content')
    <div class="main-container">
        <!-- Simple Datatable start -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="my-2 pull-left">
                    <h4 class="text-blue h4">Product Section</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm scroll-click"><i
                            class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="pb-20">
                <table class="table" id="productTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('product-getdata') }}",
                order: [[0, 'asc']],
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name' },
                    { data: 'category' },
                    { data: 'image', orderable: false, searchable: false },
                    { data: 'price' },
                    { data: 'stock' },
                    { data: 'status', orderable: false, searchable: false },
                    { data: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>



@endsection