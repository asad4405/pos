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
                    <h4 class="text-blue h4">Counter Section</h4>
                </div>
                <div class="pull-right">
                    <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm scroll-click"><i
                            class="fa fa-plus"></i> Create</a>
                </div>
            </div>
            <div class="pb-20">
                <table class="table data-table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">SL</th>
                            <th>Category Name</th>
                            <th>Code </th>
                            <th>Status</th>
                            <th class="datatable-nosort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $value)
                            <tr>
                                <td class="table-plus">{{ $loop->index + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->code }}</td>
                                <td>
                                    @if ($value->status == 1)
                                        <span class="p-1 text-white rounded span bg-success">Active</span>
                                    @else
                                        <span class="p-1 text-white rounded span bg-danger">Deative</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="p-0 btn btn-link font-24 line-height-1 no-arrow dropdown-toggle" href="#"
                                            role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="{{ route('category.edit', $value->id) }}"><i
                                                    class="dw dw-edit2"></i> Edit</a>
                                            <form action="{{ route('category.destroy',$value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="dropdown-item"
                                                    type="submit"><i class="dw dw-delete-3"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
