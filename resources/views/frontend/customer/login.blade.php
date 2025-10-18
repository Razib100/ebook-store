@extends('frontend.layouts.index')

@section('content')
<section class="contact-layout2 space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                @if (session('error'))
                <div class="alert alert-danger mb-3">
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
                    action="{{ route('customer.login.submit') }}"
                    method="POST">
                    @csrf

                    <div class="title-area animation-style1 title-anime mb-4">
                        <h2 class="sec-title text-title title-anime__title">Customer Login</h2>
                    </div>

                    {{-- Validation Errors --}}
                    @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 text-start ps-4">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Email --}}
                    <div class="form-group mb-3">
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                        <i class="fas fa-envelope"></i>
                    </div>

                    {{-- Password --}}
                    <div class="form-group mb-4">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <i class="fas fa-lock"></i>
                    </div>

                    {{-- Buttons (Login + Register side by side) --}}
                    <div class="form-group d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('customer.register') }}" class="vs-btn justify-content-center" style="background-color: #555; color: #fff;">Register</a>
                        <button class="vs-btn justify-content-center" type="submit">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
@endsection