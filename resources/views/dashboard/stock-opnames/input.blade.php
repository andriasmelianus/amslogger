<x-dashboard-layout title="Daftar Merk">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Stock Opname</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.stock-opnames') }}">Stock Opname</a></li>
                <li class="active">Input Stock Opname</li>
            </ol>
            <x-page-header-action></x-page-header-action>
        </div>

        <div class="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-actions">
                        <a href="{{ route('dashboard.stock-opnames.print-form') }}" class="btn btn-outline btn-info" target="_blank"><i class="icon wb-print" aria-hidden="true"></i> Cetak Form</a>
                        <a href="{{ route('dashboard.stock-opnames') }}" class="btn btn-outline btn-primary" aria-hidden="true">Stock Opname</a>
                    </div>
                    <h3 class="panel-title">Input Stock Opname</h3>
                </div>
                <div class="panel-body container-fluid">
                    <x-alert></x-alert>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- FORM START -->
                            <form action="{{ route('dashboard.stock-opnames.add-item') }}" method="POST" class="container" autocomplete="off">
                                @csrf
                                <input type="hidden" id="transaction_id" name="transaction_id" value="{{ isset($transaction) ? $transaction->id : '' }}">
                                <div class="form-group @error('name') has-erorr @enderror">
                                    <label for="">Kategori</label>

                                    @foreach($categories AS $category)
                                    <div class="radio-custom radio-primary">
                                        <input type="radio" id="category-{{ $category->id }}" name="category_id" value="{{ $category->id }}" {{ $loop->first ? 'checked' : '' }}>
                                        <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="form-group @error('name') has-error @enderror">
                                    <label for="name">Nama</label>
                                    <input type="hidden" id="item_id" name="item_id" value="">
                                    <input value="{{ old('name') ?? (isset($data) ? $data->name : '') }}" placeholder="Nama Barang" name="name" id="name" class="form-control text-left autocomplete" type="text">
                                    @error('name')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('quantity') has-error @enderror">
                                    <label for="quantity">Selisih dengan fisik</label>
                                    <div class="input-group">
                                        <input value="{{ old('quantity') ?? (isset($data) ? $data->quantity : -1) }}" placeholder="Selisih dengan fisik" name="quantity" id="quantity" class="form-control text-left " type="number">
                                        <span class="input-group-addon" id="unit_name">pcs</span>
                                    </div>

                                    @error('quantity')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group @error('description') has-error @enderror">
                                    <label for="description">Keterangan</label>
                                    <textarea name="description" id="description" rows="2" class="form-control"></textarea>
                                    @error('description')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Barang</th>
                                        <th>Selisih</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if($transaction->logs()->count() == 0)
                                    <tr>
                                        <td colspan="5">Belum ada barang</td>
                                    </tr>
                                    @endif

                                    @foreach($transaction->logs AS $log)
                                    <tr>
                                        <td><a href="javascript:deleteData({{ $log->id }})" class="btn btn-xs btn-icon btn-danger"><i class="icon wb-trash"></i></a></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $log->item->name }}</td>
                                        <td>{{ ($log->quantity ) }} {{ $log->item->unit->name }}</td>
                                        <td>{{ $log->description ?? '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form id="frmDelete" action="{{ route('dashboard.stock-opnames.remove-item') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" id="log_id_to_delete" name="log_id_to_delete" value="">
                            </form>

                            <form action="{{ route('dashboard.stock-opnames.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                <button type="submit" class="btn btn-success">Ajukan</button>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- jQuery Autocomplete -->
        <script src="{{ asset('public') }}/assets/vendor/autocomplete/jquery.autocomplete.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/autocomplete/jquery.mockjax.js"></script>

        <script src="{{ asset('public') }}/assets/vendor/typeahead-js/bloodhound.min.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/typeahead-js/typeahead.jquery.min.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
        <script>
            $(function() {
                $('#name').focus();

                $('input[type=radio][name=category_id]').change(function() {
                    let v_category_id = this.value;
                    $('.autocomplete').autocomplete().setOptions({
                        params: {
                            category_id: v_category_id
                        }
                    });

                    $('#item_id').val('');
                    $('#name').val('');
                });
                $('.autocomplete').devbridgeAutocomplete({
                    serviceUrl: "{{ route('dashboard.items.search-autocomplete') }}",
                    deferRequestBy: 300,
                    minChars: 2,
                    autoSelectFirst: true,
                    transformResult: function(response) {
                        let result = JSON.parse(response);
                        return {
                            suggestions: result.suggestions.map(function(row) {
                                return {
                                    value: row.name,
                                    data: row.id.toString(),
                                    // Custom
                                    on_hand: (row.on_hand < 0 ? 0 : row.on_hand),
                                    unit_name: row.unit_name
                                }
                            })
                        }
                    },
                    formatResult: function(suggestion, currentValue) {
                        let formattedResult = '<div>' + suggestion.value + '</div>';
                        formattedResult += '<div style="font-size: 8pt;">Stok: <strong>' + suggestion.on_hand + ' ' + suggestion.unit_name + '</strong></div>';

                        return formattedResult;
                    },
                    onSelect: function(suggestion) {
                        $('#item_id').val(suggestion.data);
                        $('#unit_name').html(suggestion.unit_name);
                    }
                });
            });

            function deleteData(id) {
                $('#log_id_to_delete').val(id);
                $('#frmDelete').submit();
            }
        </script>
    </x-slot>
    <x-slot name="css">
        <!-- jQuery Autocomplete -->
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/autocomplete/autocomplete.css">

        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/typeahead-js/typeahead.css">
    </x-slot>
</x-dashboard-layout>