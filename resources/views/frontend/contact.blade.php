@extends('frontend.layouts.index')

@section('content')
<section class="contact-layout2 space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                {{-- Success / Error messages --}}
                @if (session('success'))
                    <div class="alert alert-success mb-3 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mb-3 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 text-start ps-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-style1 wow animate__fadeInUp"
                      data-wow-delay="0.35s"
                      action="{{ route('contact.submit') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="title-area animation-style1 title-anime mb-4 text-center">
                        <h2 class="sec-title text-title title-anime__title">Contact Us</h2>
                    </div>

                    {{-- First + Last name (side by side) --}}
                    <div class="row gx-2">
                        <div class="col-md-6 form-group mb-3">
                            <input class="form-control" type="text" name="first_name" id="first_name"
                                   value="{{ old('first_name') }}" placeholder="First Name" required>
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <input class="form-control" type="text" name="last_name" id="last_name"
                                   value="{{ old('last_name') }}" placeholder="Last Name">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>

                    {{-- Email + Subject (side by side) --}}
                    <div class="row gx-2">
                        <div class="col-md-6 form-group mb-3">
                            <input class="form-control" type="email" name="email" id="email"
                                   value="{{ old('email') }}" placeholder="Email Address" required>
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <select name="subject" class="form-control" required>
                                <option value="">Select Subject</option>
                                <option value="0" {{ old('subject') == '0' ? 'selected' : '' }}>Normal Issue</option>
                                <option value="1" {{ old('subject') == '1' ? 'selected' : '' }}>Technical Problem</option>
                                <option value="2" {{ old('subject') == '2' ? 'selected' : '' }}>Payment Unsuccessful</option>
                                <option value="3" {{ old('subject') == '3' ? 'selected' : '' }}>Payment Successful but PDF Download Issue</option>
                            </select>
                        </div>
                    </div>

                    {{-- Message --}}
                    <div class="form-group mb-3">
                        <textarea name="message" class="form-control" placeholder="Message Here..." rows="5" required>{{ old('message') }}</textarea>
                    </div>

                    {{-- File upload (optional) --}}
                    <div class="form-group mb-3">
                        <label for="file" class="form-label small text-muted">Attach File (optional)</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>

                    {{-- Captcha inline (styled like your login form inputs) --}}
                    <div class="form-group mb-4">
                        <div class="d-flex securit__box align-items-center  rounded" style="border:1px solid rgba(0,0,0,0.06);">
                        <input type="text" name="num1" class="form-control fw-normal bg-transparent border-0" value="{{ $num1 }}" readonly>
                                <span>{{ $operator }}</span>
                                <input type="text" name="num2" class="form-control fw-normal bg-transparent border-0" value="{{ $num2 }}" readonly>
                                <span>=</span>
                                <input type="text" name="user_result" class="form-control fw-normal bg-transparent border-0" placeholder="?">
                        </div>
                    </div>

                    {{-- Buttons (Submit + optional clear) --}}
                    <div class="form-group d-flex justify-content-center gap-3 flex-wrap">
                        <button class="vs-btn justify-content-center" type="submit">Send Message</button>
                    </div>

                </form>

                <p class="form-messages mb-0 mt-3 text-center"></p>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
document.getElementById('file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const allowedTypes = [
        'image/png',
        'image/jpeg',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx
        'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
        'text/csv'
    ];
    const maxSize = 5 * 1024 * 1024; // 5MB

    // Create or reuse file name + error display
    let fileNameDisplay = document.getElementById('fileNameDisplay');
    let fileError = document.getElementById('file_error');

    if (!fileNameDisplay) {
        fileNameDisplay = document.createElement('div');
        fileNameDisplay.id = 'fileNameDisplay';
        fileNameDisplay.className = 'small mt-2 text-success';
        this.insertAdjacentElement('afterend', fileNameDisplay);
    }

    if (!fileError) {
        fileError = document.createElement('div');
        fileError.id = 'file_error';
        fileError.className = 'small mt-1 text-danger';
        this.insertAdjacentElement('afterend', fileError);
    }

    // Reset previous messages
    fileNameDisplay.textContent = '';
    fileError.textContent = '';

    if (file) {
        // Check type
        if (!allowedTypes.includes(file.type)) {
            fileError.textContent =
                "❌ Invalid file type. Allowed: PNG, JPG, DOCX, PPTX, PDF, CSV, XLSX.";
            this.value = ''; // Reset input
            return;
        }

        // Check extension to block mobi, epub, etc.
        const fileName = file.name.toLowerCase();
        const disallowedExts = ['.mobi', '.epub', '.txt', '.rtf'];
        if (disallowedExts.some(ext => fileName.endsWith(ext))) {
            fileError.textContent =
                "❌ File format not allowed (e.g., MOBI, EPUB, TXT, RTF).";
            this.value = '';
            return;
        }

        // Check size
        if (file.size > maxSize) {
            fileError.textContent = "❌ File size must not exceed 5MB.";
            this.value = '';
            return;
        }

        // If valid
        fileNameDisplay.textContent = `✅ Selected file: ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)`;
    }
});
</script>
@endsection

