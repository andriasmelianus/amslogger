<!-- Using jQuery Datatables -->
<x-dashboard-layout title="Daftar Penggunaan">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Daftar Penggunaan</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Daftar Penggunaan</li>
            </ol>
            <x-page-header-action></x-page-header-action>
        </div>

        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <div class="btn-group " aria-label="Basic example" role="group">
                            <a href="{{ route('dashboard.usages.create-form') }}" class="btn btn-outline btn-primary" aria-hidden="true">Buat Baru</a>
                        </div>
                    </div>
                    <h3 class="panel-title">Daftar Barang</h3>
                </header>
                <div class="panel-body">
                    <x-alert></x-alert>

                    <table id="table1" class="table table-hover dataTable table-striped width-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Penggunaan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Basic -->
        </div>
        <form id="frmDelete" action="{{ route('dashboard.usages.delete') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" id="id_to_delete" name="id">
        </form>
    </div>

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
            let options = {
                processing: true,
                serverSide: true,
                ajax: '{{ route("dashboard.usages.datatables") }}',
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
                    data: 'status',
                    name: 'status'
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