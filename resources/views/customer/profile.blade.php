@extends('customer.layouts.index')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">My Profile</h3>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
    @elseif($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('customer.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Basic Info -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="{{ old('first_name', $customer->first_name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ old('last_name', $customer->last_name) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male" {{ $customer->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $customer->gender == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $customer->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control"
                            value="{{ old('date_of_birth', $customer->date_of_birth) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $customer->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $customer->phone) }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Profile Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-6 text-center">
                        @if($customer->image && file_exists(public_path($customer->image)))
                        <img src="{{ asset($customer->image) }}" alt="Profile Image"
                            class="rounded-circle mt-3" style="width:100px;height:100px;object-fit:cover;">
                        @else
                        <p class="mt-4 text-muted">No image uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Update -->
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Change Password</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary px-4">Update Profile</button>
    </form>
</div>
@endsection