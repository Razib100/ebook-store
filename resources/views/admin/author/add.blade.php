@extends('admin.layouts.index')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ isset($author) ? 'Edit Author' : 'Add Author' }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('author') }}" class="btn btn-sm btn-info">
                            Author Lists
                        </a>
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ isset($author) ? 'Edit Author' : 'Add Author' }}</h3>
    </div>

    <div class="card-body">
        <form
            action="{{ isset($author) ? route('author.update', $author->id) : route('author.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @if(isset($author))
            @method('POST')
            @endif

            <div class="row">
                <div class="col-sm-4">
                    <!-- Name -->
                    <div class="form-group">
                        <label>Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter author name"
                            value="{{ old('name', $author->name ?? '') }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-4">
                    <!-- Gender -->
                    <div class="form-group">
                        <label>Gender:</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender', $author->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender', $author->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender', $author->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- DOB -->
                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" class="form-control"
                            value="{{ old('dob', isset($author->dob) ? $author->dob->format('Y-m-d') : '') }}">
                        @error('dob')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <!-- Phone -->
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $author->phone ?? '') }}">
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Image -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control" onchange="previewImage()" id="imageInput" accept="image/*">

                        @if(isset($author->image) && $author->image != null)
                        <img id="imagePreview" src="{{ asset('admin/assets/author/' . $author->image) }}" alt="Author Image" class="mt-2" height="80">
                        <input type="hidden" name="previous_image" value="{{ $author->image }}">
                        @else
                        <img id="imagePreview" src="#" alt="Image Preview" class="mt-2" height="80" style="display: none;">
                        @endif

                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Short Description -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Short Description:</label>
                        <textarea name="short_description" class="form-control">{{ old('short_description', $author->short_description ?? '') }}</textarea>
                        @error('short_description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Description</h3>
                        </div>
                        <div class="card-body">
                            <textarea id="summernote" name="description">{{ old('description', $author->description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="home_visible" class="custom-control-input" id="customSwitch3"
                                {{ old('home_visible', $author->home_visible ?? false) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch3">Visible In Home</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- Status -->
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status: <span class="text-danger">*</span></label>
                        <div class="col-sm-9 d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="1"
                                    {{ old('status', $author->status ?? '1') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="0"
                                    {{ old('status', $author->status ?? '1') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>
                        @error('status')
                        <div class="text-danger col-sm-12">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>



            <!-- Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success" {{ Route::currentRouteName() === 'author.view' ? 'disabled' : '' }}>
                    Submit
                </button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('author') }}'">
                    Cancel
                </button>
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

    // Image preview function
    function previewImage() {
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');

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