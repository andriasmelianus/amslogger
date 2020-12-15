<x-auth-layout title="Login" html-body-class="page-login-v2">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/pages/login-v2.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/formvalidation/formValidation.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/forms/validation.css">
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('public') }}/assets/vendor/formvalidation/formValidation.min.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/formvalidation/framework/bootstrap.min.js"></script>
        <script src="{{ asset('public') }}/assets/examples/js/forms/validation.js"></script>
        <script src="{{ asset('public') }}/assets/js/components/jquery-placeholder.js"></script>
    </x-slot>


    <div class="page-login-main">
        <div class="brand visible-xs">
            <img class="brand-img" src="{{ asset('public') }}/assets/images/logo-blue@2x.png" alt="...">
            <h3 class="brand-text font-size-40">{{ config('app.name') }}</h3>
        </div>
        <h3 class="font-size-24">Login</h3>
        <p>Silahkan login menggunakan user Anda.</p>

        <form method="post" action="{{ route('login') }}">
            @csrf
            <x-validation-errors :values="$errors" class="alert alert-danger"></x-validation-errors>

            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
            </div>

            <div class="form-group clearfix">
                <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
                    <input type="checkbox" id="remember_me" name="remember_me">
                    <label for="remember_me">Ingat Saya</label>
                </div>
                @if(Route::has('password.request'))
                <!-- <a class="pull-right" href="{{ route('password.request') }}">Lupa Password?</a> -->
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>

        @include('_layouts.auth.footer')
    </div>

</x-auth-layout>