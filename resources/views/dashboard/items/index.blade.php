<x-dashboard-layout title="Daftar Barang">
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Daftar Barang</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Daftar Barang</li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="{{ App\Constants\Andrias::LINK_GITHUB }}" target="_blank">
                    <i class="icon wb-link" aria-hidden="true"></i>
                    <span class="hidden-xs">See me on Github</span>
                </a>
            </div>
        </div>

        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <div class="btn-group " aria-label="Basic example" role="group">
                            <a href="{{ route('dashboard.items.create-form') }}" class="btn btn-outline btn-primary" aria-hidden="true">Buat Baru</a>
                        </div>
                    </div>
                    <h3 class="panel-title">Daftar Barang</h3>
                </header>
                <div class="panel-body">
                    <table id="table1" class="table table-hover dataTable table-striped width-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Diupdate</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Basic -->
        </div>
    </div>
    <form id="frmDeleteData" action="{{ route('dashboard.items.delete') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" id="item_id" name="item_id">
    </form>

    <x-slot name="js">
        <!-- Plugins For This Page -->
        <script src="{{ asset('public') }}/assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/datatables-tabletools/dataTables.tableTools.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/asrange/jquery-asRange.min.js"></script>
        <script src="{{ asset('public') }}/assets/vendor/bootbox/bootbox.js"></script>
        <!-- Scripts For This Page -->
        <!-- <script src="{{ asset('public') }}/assets/js/components/datatables.js"></script> -->
        <script src="{{ asset('public') }}/assets/examples/js/tables/datatable.js"></script>
        <script src="{{ asset('public') }}/assets/examples/js/uikit/icon.js"></script>
        <script>
            function deleteData(id) {
                if (confirm('Anda yakin?')) {
                    $('#item_id').val(id);
                    $('#frmDeleteData').submit();
                }
            }
            let options = {
                processing: true,
                serverSide: true,
                ajax: '{{ route("dashboard.items.datatables") }}',
                order: [],

                columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'name',
                    name: 'name'
                }, {
                    data: 'on_hand',
                    name: 'on_hand',
                }, {
                    data: 'price',
                    name: 'price',
                }, {
                    data: 'description',
                    name: 'description'
                }, {
                    data: 'updated_at',
                    name: 'updated_at'
                }]
            };
            $('#table1').dataTable(options);
        </script>
    </x-slot>
    <x-slot name="css">
        <!-- Plugins For This Page -->
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/datatables-bootstrap/dataTables.bootstrap.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
        <link rel="stylesheet" href="{{ asset('public') }}/assets/vendor/datatables-responsive/dataTables.responsive.css">
        <!-- Inline -->
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/tables/datatable.css">
    </x-slot>

</x-dashboard-layout>