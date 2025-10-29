@extends('admin.layouts.index')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Profile Info Update -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Profile Information</h4>
                    <p class="text-muted mb-4">Update your account’s profile information and email address.</p>

                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input id="name" name="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input id="email" name="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2 small text-muted">
                                    Your email address is unverified.
                                    <button form="send-verification" class="btn btn-link btn-sm p-0">Click here to re-send verification email</button>
                                </div>
                                @if (session('status') === 'verification-link-sent')
                                    <p class="text-success small mt-2">Verification link sent to your email.</p>
                                @endif
                            @endif
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            @if (session('status') === 'profile-updated')
                                <span class="text-success small ms-2">Saved.</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Password Update -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="mb-3">Update Password</h4>
                    <p class="text-muted mb-4">Ensure your account is using a long, random password to stay secure.</p>

                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input id="current_password" name="current_password" type="password"
                                   class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password">
                            @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" name="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control" autocomplete="new-password">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-warning">Update Password</button>
                            @if (session('status') === 'password-updated')
                                <span class="text-success small ms-2">Password updated.</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Account -->
            <!-- <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="mb-3 text-danger">Delete Account</h4>
                    <p class="text-muted mb-3">Once your account is deleted, all its resources and data will be permanently removed.</p>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password_delete" class="form-label">Confirm Password</label>
                            <input id="password_delete" name="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Enter password to confirm" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </div>
                    </form>
                </div>
            </div> -->

        </div>
    </div>
</div>
@endsection
