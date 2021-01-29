<x-dashboard-layout title="Status Input Penggunaan">
    <div class="page">
        <div class="page-header">
            <h1 class="page-title">Penggunaan Barang</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('dashboard.usages') }}">Penggunaan Barang</a></li>
                <li><a href="{{ route('dashboard.usages.create') }}">Input Penggunaan Barang</a></li>
                <li class="active">Status</li>
            </ol>
            <x-page-header-action></x-page-header-action>
        </div>

        <div class="page-content">
            <div class="container-fluid mx-auto width-500">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Penggunaan Barang</h3>
                    </div>

                    <div class="alert alert-success" role="alert">
                        <h4>Penggunaan #{{ $data->id }}</h4>
                        Berhasil disubmit pada: {{ $data->submitted_at->format('d F Y H:i') }}
                    </div>

                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Barang</th>
                            <th>Qty</th>
                            <th>Catatan</th>
                        </tr>

                        @foreach($data->logs AS $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->item->name }}</td>
                            <td>{{ ($item->quantity * -1) }} {{ $item->item->unit->name }}</td>
                            <td>{{ $item->description ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <div class="panel-footer">
                        Mohon screenshot bagian ini untuk pengambilan barang pada petugas.
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-dashboard-layout>