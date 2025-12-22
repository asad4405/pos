@extends('layouts.master')
@section('content')
    <div class="main-container">
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="my-2 pull-left">
                    <h4 class="text-blue h4">Create Product Section</h4>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Product Name *</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Code *</label>
                        <input class="form-control" name="code" type="text" value="{{ old('code') }}" />
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Category *</label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Bar Code *</label>
                        <input class="form-control" name="barcode" type="text" value="{{ old('barcode') }}" />
                        @error('barcode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Cost *</label>
                        <input class="form-control" name="cost" type="number" value="{{ old('cost') }}" />
                        @error('cost')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Price *</label>
                        <input class="form-control" name="price" type="number" value="{{ old('price') }}" />
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> quantity *</label>
                        <input class="form-control" name="quantity" type="number" value="{{ old('quantity') }}" />
                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-12">
                        <label class="col-form-label"> Alert Quantity *</label>
                        <input class="form-control" name="quantity_alert" type="number"
                            value="{{ old('quantity_alert') }}" />
                        @error('quantity_alert')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-12">
                        <label class="col-form-label"> Tax *</label>
                        <input class="form-control" name="tax" type="number" value="{{ old('tax') }}" />
                        @error('tax')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-12">
                        <label class="col-form-label"> Tax Type *</label>
                        <select name="tax_type" class="form-control">
                            <option value="1">Exclusive</option>
                            <option value="2">Inclusive</option>
                        </select>
                        @error('tax_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-12">
                        <label class="col-form-label"> Unit *</label>
                        <select name="unit" class="form-control">
                            <option value="pc">Piece | PC</option>
                        </select>
                        @error('unit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-12">
                        <label class="col-form-label"> Note </label>
                        <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="my-3">
                            <label class="form-label fw-bold">
                                Product Images *
                            </label>

                            <div id="drop-area" class="drop-area">
                                <input type="file" id="imageInput" name="images[]" multiple accept="image/*" hidden>
                                <div class="text-center">
                                    <i class="mb-2 fa fa-cloud-upload fa-3x text-primary"></i>
                                    <p class="mb-0">Drag & Drop images here or click to upload</p>
                                </div>
                            </div>

                            <div id="preview" class="mt-3 row"></div>
                        </div>

                    </div>
                </div>

                <div class=" btn-list">
                    <button type="submit" class="btn btn-primary active focus">
                        Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .drop-area {
            border: 2px dashed #4f8cff;
            border-radius: 10px;
            background: #eaf2ff;
            padding: 50px;
            cursor: pointer;
            transition: 0.3s;
        }

        .drop-area:hover {
            background: #ddeaff;
        }

        .drop-area.dragover {
            background: #d0e2ff;
            border-color: #1e6bff;
        }

        .preview-img {
            position: relative;
        }

        .preview-img img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
        }

        .remove-btn {
            position: absolute;
            top: 5px;
            right: 8px;
            background: red;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 12px;
            cursor: pointer;
        }
    </style>


    <script>
        const dropArea = document.getElementById('drop-area');
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('preview');
        let filesArray = [];

        dropArea.addEventListener('click', () => input.click());

        input.addEventListener('change', () => {
            handleFiles(input.files);
        });

        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('dragover');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('dragover');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        function handleFiles(files) {
            for (let file of files) {
                if (!file.type.startsWith('image/')) continue;

                filesArray.push(file);

                const col = document.createElement('div');
                col.className = 'col-md-3 mb-3 preview-img';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);

                const btn = document.createElement('button');
                btn.innerHTML = '×';
                btn.className = 'remove-btn';
                btn.onclick = () => {
                    filesArray = filesArray.filter(f => f !== file);
                    col.remove();
                };

                col.appendChild(img);
                col.appendChild(btn);
                preview.appendChild(col);
            }

            updateInputFiles();
        }

        function updateInputFiles() {
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
        }
    </script>

@endsection
