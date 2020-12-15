<x-auth-layout title="Daftar" html-body-class="page-register-v2">
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/pages/register-v2.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/formvalidation/formValidation.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/forms/validation.css">
    </x-slot>
    <x-slot name="js">
        <script src="{{ asset('public') }}/assets/js/components/jquery-placeholder.js"></script>
        <script src="{{ asset('public') }}/assets/js/components/animate-list.js"></script>
    </x-slot>

    <div class="page-register-main">
        <div class="brand visible-xs">
            <img class="brand-img" src="{{ asset('public') }}/assets/images/logo-blue@2x.png" alt="...">
            <h3 class="brand-text font-size-40">{{ config('app.name') }}</h3>
        </div>
        <h3 class="font-size-24">Daftar</h3>
        <p>Silahkan mendaftarkan diri Anda apabila belum memiliki akun.</p>

        <form method="post" role="form" action="{{ route('register') }}">
            @csrf
            <x-validation-errors :values="$errors" class="alert alert-danger"></x-validation-errors>

            <div class="form-group">
                <label class="sr-only" for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama">
            </div>
            <div class="form-group">
                <label class="sr-only" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password_confirmation">Retype Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
        </form>

        <p>Sudah mendaftar sebelumnya? Silahkan <a href="{{ route('login') }}">Login</a></p>

        @include('_layouts.auth.footer')
    </div>
</x-auth-layout>