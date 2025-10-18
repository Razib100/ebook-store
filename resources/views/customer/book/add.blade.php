@extends('customer.layouts.index')

<!-- Select2 & Summernote & Custom -->
@section('head')
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin/assets/plugins/summernote/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
@endsection

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ isset($product) ? 'Edit Book' : 'Add Book' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('customer.book') }}" class="btn btn-sm btn-info">Book Lists</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ isset($product) ? 'Edit Book' : 'Add Book' }}</h3>
    </div>

    <div class="card-body">
        <form action="{{ isset($product) ? route('customer.book.update', $product->id) : route('customer.book.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
            @method('POST')
            @endif

            <!-- Title & Category -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Title: <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control"
                            placeholder="Enter title name"
                            value="{{ old('title', $product->title ?? '') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Author: <span class="text-danger">*</span></label>
                        <input type="text" name="author_id" class="form-control"
                            placeholder="Enter Author name"
                            value="{{ $author->first_name . ' ' . $author->last_name }}" disabled>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Category: <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="category_id" style="width: 100%;">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Price & Cover -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Price: <span class="text-danger">*</span></label>
                        <input type="text" name="price" class="form-control" placeholder="Enter price"
                            value="{{ old('price', $product->price ?? '') }}">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Discount:</label>
                        <input type="text" name="percentage" class="form-control" placeholder="Enter discount"
                            value="{{ old('percentage', $product->percentage ?? '') }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Cover Image: <span class="text-danger">*</span></label>
                        <input type="file" name="cover_image" class="form-control"
                            onchange="previewCoverImage()" id="coverImageInput" accept="image/*">

                        @if(isset($product->cover_image) && $product->cover_image != null)
                        <img id="coverImagePreview" src="{{ asset($product->cover_image) }}"
                            alt="Cover Image Preview" class="mt-2" height="80">
                        <input type="hidden" name="previous_cover_image" value="{{ $product->cover_image }}">
                        @else
                        <img id="coverImagePreview" src="#" alt="Cover Image Preview" class="mt-2" height="80" style="display: none;">
                        @endif

                        @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Short Description: <span class="text-danger">*</span></label>
                        <textarea name="short_description" class="form-control">{{ old('short_description', $product->short_description ?? '') }}</textarea>
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
                            <h3 class="card-title">Description: <span class="text-danger">*</span></h3>
                        </div>
                        <div class="card-body">
                            <textarea id="summernote" name="description">{{ old('description', $product->description ?? '') }}</textarea>
                        </div>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Gallery Upload -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <label>Product Gallery (Multiple Images)</label>
                    <div id="galleryUpload" class="border border-secondary rounded p-3 text-center"
                        style="cursor: pointer; background: #f9f9f9;">
                        <p class="mb-2">Drag & Drop images here or click to select</p>
                        <input type="file" name="gallery_images[]" id="galleryInput" multiple accept="image/*" hidden>
                    </div>

                    <!-- Preview Container -->
                    <div id="galleryPreview" class="d-flex flex-wrap mt-3">
                        @if(isset($galleryImages) && is_array($galleryImages))
                        @foreach($galleryImages as $image)
                        <div style="position: relative; display: inline-block; margin: 5px;">
                            <img src="{{ asset($image) }}" style="height: 100px; width: 100px; object-fit: cover;" class="border rounded">
                            <span style="position: absolute; top: 0; right: 0; background: rgba(0,0,0,0.5); color: white; font-weight: bold; padding: 2px 5px; cursor: pointer; border-radius: 0 5px 0 5px;" onclick="this.parentElement.remove()">×</span>
                            <input type="hidden" name="existing_gallery[]" value="{{ $image }}">
                        </div>
                        @endforeach
                        @endif
                    </div>


                    @error('gallery_images')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Tags:</label>
                <input type="text" name="tags" id="tags" class="form-control"
                    placeholder="Add tags (separate with comma)"
                    value="{{ old('tags', isset($product) ? implode(',', $product->tags ?? []) : '') }}">
                @error('tags')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- File Uploads -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <label>Upload Product Files</label>
                    <div class="d-flex flex-wrap gap-2">
                        <div class="mr-3">
                            <input type="file" name="pdf_file" class="form-control-file">
                            @if(isset($product->pdf_file))
                            <p class="mt-1"><a href="{{ asset($product->pdf_file) }}" target="_blank">Current PDF</a></p>
                            @endif
                            <small class="text-muted">Upload PDF</small>

                        </div>
                        <div class="mr-3">
                            <input type="file" name="epub_file" class="form-control-file">
                            @if(isset($product->epub_file))
                            <p class="mt-1"><a href="{{ asset($product->epub_file) }}" target="_blank">Current EPUB</a></p>
                            @endif
                            <small class="text-muted">Upload EPUB</small>

                        </div>
                        <div class="mr-3">
                            <input type="file" name="mobi_file" class="form-control-file">
                            @if(isset($product->mobi_file))
                            <p class="mt-1"><a href="{{ asset($product->mobi_file) }}" target="_blank">Current MOBI</a></p>
                            @endif
                            <small class="text-muted">Upload MOBI</small>

                        </div>
                        @if($errors->has('pdf_file') || $errors->has('epub_file') || $errors->has('mobi_file'))
                        <div class="text-danger mt-1">
                            At least one file (PDF, EPUB, or MOBI) must be uploaded.
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Switches & Status -->
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_trending" class="custom-control-input" id="customSwitch2"
                                {{ old('is_trending', isset($product) ? $product->is_trending : true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch2">Trending</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="home_visible" class="custom-control-input" id="customSwitch3"
                                {{ old('home_visible', isset($product) ? $product->home_visible : true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customSwitch3">Visible In Home</label>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status: <span class="text-danger">*</span></label>
                        <div class="col-sm-10 d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="0"
                                    {{ old('status', $product->status ?? '1') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="1"
                                    {{ old('status', $product->status ?? '1') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                        </div>
                        @error('status')
                        <div class="text-danger col-sm-12">{{ $message }}</div>
                        @enderror
                    </div>
                </div> -->
            </div>
            <input type="hidden" name="gender" value="{{ $author->gender ?? '' }}">
            <input type="hidden" name="dob" value="{{ $author->date_of_birth ?? '' }}">
            <input type="hidden" name="email" value="{{ $author->email ?? '' }}">
            <input type="hidden" name="phone" value="{{ $author->phone ?? '' }}">
            <input type="hidden" name="status" value="0">
            <!-- Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success" {{ Route::currentRouteName() === 'customer.book.view' ? 'disabled' : '' }}>Submit</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('customer.book') }}'">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('/admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    $(function() {
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
        $('#summernote').summernote();
    });

    function previewCoverImage() {
        const input = document.getElementById('coverImageInput');
        const preview = document.getElementById('coverImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Multiple Gallery Upload Preview
    document.addEventListener("DOMContentLoaded", function() {
        const dropArea = document.getElementById("galleryUpload");
        const fileInput = document.getElementById("galleryInput");
        const previewContainer = document.getElementById("galleryPreview");

        let galleryFiles = [];

        dropArea.addEventListener("click", () => fileInput.click());

        fileInput.addEventListener("change", () => addFiles(fileInput.files));

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("bg-light");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("bg-light");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("bg-light");
            addFiles(e.dataTransfer.files);
        });

        function addFiles(files) {
            Array.from(files).forEach(file => {
                if (!file.type.startsWith("image/")) return;

                galleryFiles.push(file);

                const reader = new FileReader();
                reader.onload = e => {
                    const wrapper = document.createElement("div");
                    wrapper.style.position = "relative";
                    wrapper.style.display = "inline-block";
                    wrapper.style.margin = "5px";

                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.height = "100px";
                    img.style.width = "100px";
                    img.style.objectFit = "cover";
                    img.classList.add("border", "rounded");

                    const closeBtn = document.createElement("span");
                    closeBtn.innerHTML = "&times;";
                    closeBtn.style.position = "absolute";
                    closeBtn.style.top = "0";
                    closeBtn.style.right = "0";
                    closeBtn.style.background = "rgba(0,0,0,0.5)";
                    closeBtn.style.color = "white";
                    closeBtn.style.fontWeight = "bold";
                    closeBtn.style.padding = "2px 5px";
                    closeBtn.style.cursor = "pointer";
                    closeBtn.style.borderRadius = "0 5px 0 5px";

                    closeBtn.addEventListener("click", () => {
                        galleryFiles = galleryFiles.filter(f => f !== file);
                        wrapper.remove();
                        updateFileInput();
                    });

                    wrapper.appendChild(img);
                    wrapper.appendChild(closeBtn);
                    previewContainer.appendChild(wrapper);

                    updateFileInput();
                };
                reader.readAsDataURL(file);
            });
        }

        function updateFileInput() {
            const dataTransfer = new DataTransfer();
            galleryFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const tagsInput = document.getElementById('tags');
        new Choices(tagsInput, {
            removeItemButton: true,
            delimiter: ',',
            editItems: true,
            duplicateItemsAllowed: false
        });
    });
</script>
@endsection