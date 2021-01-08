<x-dashboard-layout title="Input Kategori">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Daftar Kategori</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.categories') }}">Daftar Kategori</a></li>
                <li class="active">Input Kategori</li>
            </ol>
            <x-page-header-action></x-page-header-action>
        </div>

        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ route('dashboard.categories') }}" class="btn btn-outline btn-primary" aria-hidden="true">Daftar Kategori</a>
                    </div>
                    <h3 class="panel-title">Input Data Kategori</h3>
                </div>
                <div class="panel-body container-fluid">
                    <!-- FORM START -->
                    <form action="{{ isset($data) ? route('dashboard.categories.update') : route('dashboard.categories.create') }}" method="POST" class="container">
                        <div class="row">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ isset($data) ? $data->id : '' }}">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <label for="name">Nama</label>
                                    <input value="{{ old('name') ?? (isset($data) ? $data->name : '') }}" placeholder="Nama Kategori" name="name" id="name" class="form-control text-left " type="text">
                                    @error('name')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                            </div>

                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script type="text/javascript">
            $(document).ready(function() {});
        </script>
    </x-slot>
    <x-slot name="css">
    </x-slot>
</x-dashboard-layout>