<x-dashboard-layout title="Input Barang">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Daftar Barang</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.items') }}">Daftar Barang</a></li>
                <li class="active">Input Barang</li>
            </ol>
            <x-page-header-action></x-page-header-action>
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
                    <x-alert></x-alert>

                    <!-- FORM START -->
                    <form action="{{ isset($data) ? route('dashboard.items.update') : route('dashboard.items.create') }}" method="POST" class="container">
                        <div class="row">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ isset($data) ? $data->id : '' }}">
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
                                    <input value="{{ old('name_for_vendor') ?? (isset($data) ? $data->name_for_vendor : '') }}" placeholder="Penamaan Barang oleh Vendor" name="name_for_vendor" id="name_for_vendor" class="form-control text-left " type="text">
                                    @error('name_for_vendor')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('unit_id') has-error @enderror">
                                    <label for="unit_id">Satuan Barang</label>
                                    <select name="unit_id" id="unit_id" class="form-control " data-plugin="select2">
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
                                    <select name="brand_id" id="brand_id" class="form-control " data-plugin="select2">
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
                                    <select name="category_id" id="category_id" class="form-control" data-plugin="select2">
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
        <!-- Scripts For This Page -->
        <script src="{{ asset('public') }}/assets/js/components/jquery-placeholder.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/bootstrap-select/bootstrap-select.js"></script>
        <!-- Select2 script -->
        <script src="{{ asset('public') }}/assets/vendor/select2/select2.min.js"></script>
        <script src="{{ asset('public') }}/assets/js/components/select2.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                <?php $unitIdValue = App\Andrias\SelectHelper::initValue(old('unit_id'), (isset($data) ? $data->unit_id : '')); ?>
                $('#unit_id').val('{{ $unitIdValue }}');
                $('#unit_id').change();

                <?php $brandIdValue = App\Andrias\SelectHelper::initValue(old('brand_id'), (isset($data) ? $data->brand_id : '')); ?>
                $('#brand_id').val('{{ $brandIdValue }}');
                $('#brand_id').change();

                <?php $categoryIdValue = App\Andrias\SelectHelper::initValue(old('category_id'), (isset($data) ? $data->category_id : '')); ?>
                $('#category_id').val('{{ $categoryIdValue }}');
                $('#category_id').change();

                $('#name').focus();
            });
        </script>
    </x-slot>
    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/bootstrap-select/bootstrap-select.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/select2/select2.css">
    </x-slot>
</x-dashboard-layout>