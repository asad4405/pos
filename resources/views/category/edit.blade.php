@extends('layouts.master')
@section('content')
    <div class="main-container">
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="my-2 pull-left">
                    <h4 class="text-blue h4">Edit Category Section</h4>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"> Category Name</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="name" type="text" value="{{$category->name }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label"> Category Code</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" name="code" type="text" value="{{ $category->code }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="status">
                            <option value="1" @if($category->status == 1) selected @endif>Active</option>
                            <option value="0" @if($category->status == 0) selected @endif>Detactive</option>
                        </select>
                    </div>
                </div>

                <div class=" btn-list">
                    <button type="submit" class="btn btn-primary active focus">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
