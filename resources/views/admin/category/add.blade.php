@extends('admin.layouts.index')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="/category" class="btn btn-sm btn-info">
                            Category Lists
                        </a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <form
            action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @if(isset($category))
            @method('POST')
            @endif

            <div class="row">
                <div class="col-sm-4">
                    <!-- Category Name -->
                    <div class="form-group">
                        <label>Category Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter category name"
                            value="{{ old('name', $category->name ?? '') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- Position -->
                    <div class="form-group">
                        <label>Position: <span class="text-danger">*</span></label>
                        <input type="text" name="position" class="form-control" placeholder="Enter position"
                            value="{{ old('position', $category->position ?? '') }}">
                        @error('position')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Logo:</label>
                        <input type="file" name="logo" class="form-control" onchange="previewLogo()" id="logoInput" accept="image/*">

                        <!-- Existing Logo (edit mode) -->
                        @if(isset($category->logo) && $category->logo != null)
                        <img id="logoPreview" src="{{ asset('frontend/assets/category/' . $category->logo) }}" alt="Logo Preview" class="mt-2" height="80">


                        @else
                        <img id="logoPreview" src="#" alt="Logo Preview" class="mt-2" height="80" style="display: none;">
                        @endif

                        @if(isset($category->logo) && $category->logo != null)
                        <input type="hidden" name="previous_logo" value="{{ $category->logo }}">
                        @endif

                        @error('logo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Description -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Description</h3>
                        </div>
                        <div class="card-body">
                            <textarea id="summernote" name="description">{{ old('description', $category->description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <!-- Visible Switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_visible" class="custom-control-input" id="customSwitch1"
                                {{ old('is_visible', $category->is_visible ?? false) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch1">Visible in menu</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <!-- Visible Switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_trending" class="custom-control-input" id="customSwitch2"
                                {{ old('is_trending', $category->is_trending ?? false) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch2">Trending Category</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status: <span class="text-danger">*</span></label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="0"
                                    {{ old('status', $category->status ?? '0') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="1"
                                    {{ old('status', $category->status ?? '0') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                        @error('status')
                        <div class="text-danger col-sm-12">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <!-- Submit -->
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success" {{ Route::currentRouteName() === 'category.view' ? 'disabled' : '' }}>
                        Submit
                    </button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('category') }}'">
                    Cancel
                </button>
                </div>
                
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('/admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function() {
        $('#summernote').summernote();
    });
    // Logo preview function
    function previewLogo() {
        const input = document.getElementById('logoInput');
        const preview = document.getElementById('logoPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection