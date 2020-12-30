<x-dashboard-layout title="Input Barang">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Daftar Barang</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.items') }}">Daftar Barang</a></li>
                <li class="active">Input Barang</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ App\Constants\Andrias::LINK_GITHUB }}" target="_blank">
                    <i class="icon wb-link" aria-hidden="true"></i>
                    <span class="hidden-xs">See me on Github</span>
                </a>
            </div>
        </div>

        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ route('dashboard.items') }}" class="btn btn-outline btn-primary" aria-hidden="true">Daftar Barang</a>
                    </div>
                    <h3 class="panel-title">Input Data Barang</h3>
                </div>
                <div class="panel-body container-fluid">
                    <form action="#" method="POST" class="container">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-error @enderror">
                                <label for="name">Nama</label>
                                <input value="{{ old('name') ?? (isset($data) ? $data->name : '') }}" placeholder="Nama Barang" name="name" id="name" class="form-control text-left " type="text">
                                @error('name')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group @error('name_for_vendor') has-error @enderror">
                                <label for="name_for_vendor">Penamaan Barang dari Vendor</label>
                                <input value="{{ old('name_for_vendor') ?? (isset($data) ? $data->name_for_vendor : '') }}" placeholder="Nama Barang" name="name_for_vendor" id="name_for_vendor" class="form-control text-left " type="text">
                                @error('name_for_vendor')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group @error('unit_id') has-error @enderror">
                                <label for="unit_id">Satuan Barang</label>
                                <select name="unit_id" id="unit_id" class="form-control selectpicker ">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach($units AS $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group @error('brand_id') has-error @enderror">
                                <label for="brand_id">Merk Barang</label>
                                <select name="brand_id" id="brand_id" class="form-control selectpicker ">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach($brands AS $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group @error('category_id') has-error @enderror">
                                <label for="category_id">Kategori Barang</label>
                                <select name="category_id" id="category_id" class="form-control selectpicker ">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach($categories AS $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group @error('description') has-error @enderror">
                                <label for="description">Deskripsi Barang</label>
                                <textarea name="description" id="description" rows="10" class="form-control">{{ isset($data) ? $data->description : '' }}</textarea>
                                @error('description')
                                <span class="help-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- Scripts For This Page -->
        <script src="{{ asset('public') }}/assets/js/components/jquery-placeholder.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/bootstrap-select/bootstrap-select.js"></script>
    </x-slot>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/bootstrap-select/bootstrap-select.css">
    </x-slot>
</x-dashboard-layout>