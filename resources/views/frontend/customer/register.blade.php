@extends('frontend.layouts.index')

@section('content')
<section class="contact-layout2 space">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <form class="form-style1 wow animate__fadeInUp"
                      data-wow-delay="0.35s"
                      action="{{ route('customer.register.submit') }}"
                      method="POST">
                    @csrf

                    <div class="title-area animation-style1 title-anime">
                        <h2 class="sec-title text-title title-anime__title">Registration</h2>
                    </div>

                    <div class="row gx-20">
                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="col-md-6 form-group">
                            <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="col-md-6 form-group">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="col-md-6 form-group">
                            <select name="gender" class="form-control" required>
                                <option value="" selected disabled>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <i class="fas fa-lock"></i>
                        </div>

                        <div class="col-md-6 form-group">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            <i class="fas fa-lock"></i>
                        </div>

                        <div class="col-md-12 form-group">
                            <button class="vs-btn justify-content-center" type="submit">Register</button>
                        </div>
                    </div>
                </form>

                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
