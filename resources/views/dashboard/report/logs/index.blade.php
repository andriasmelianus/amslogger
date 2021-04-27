<x-dashboard-layout title="Running Logs">
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Running Logs</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="active">Running Logs</li>
            </ol>
            <x-page-header-action></x-page-header-action>
        </div>

        <div class="page-content">
            <!-- Panel Basic -->
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <div class="btn-group " aria-label="Basic example" role="group">
                            <i>Welcome</i>
                        </div>
                    </div>
                    <h3 class="panel-title">Running Logs</h3>
                </header>
                <div class="panel-body">
                    <x-alert></x-alert>

                    <table id="table1" class="table table-hover dataTable table-striped width-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Disubmit</th>
                                <th>Jenis</th>
                                <th>Pengguna</th>
                                <th>Barang</th>
                                <th>Qty</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Basic -->
        </div>
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
                ajax: '{{ route("dashboard.report.logs.datatables") }}',
                order: [
                    [1, 'desc']
                ],

                columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'submitted_at',
                    name: 'submitted_at',
                }, {
                    data: 'type',
                    name: 'type',
                }, {
                    data: 'PENGGUNA',
                    name: 'PENGGUNA'
                }, {
                    data: 'BARANG',
                    name: 'BARANG'
                }, {
                    data: 'JUMLAH',
                    name: 'JUMLAH',
                }, {
                    data: 'CATATAN',
                    name: 'CATATAN',
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