<!-- Using Remark basic table -->
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

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="width-50"></th>
                                <th>Penggunaan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>

                        @foreach($data AS $transaction)
                        <tbody class="table-section {{ $loop->first ? 'active' : '' }}">
                            <tr>
                                <td class="text-center"><i class="table-section-arrow"></i></td>
                                <td>{{ 'Penggunaan #' . $transaction->id }}</td>
                                <td>{{ view('dashboard.usages.datatables.status-column', ['data' => $transaction]) }}</td>
                                <td>{{ $transaction->updated_at->diffForHumans() }}</td>
                            </tr>
                        </tbody>
                        <tbody style="background-color: #F3F7F9;">
                            @foreach($transaction->logs AS $log)
                            <tr>
                                <td>
                                    <x-approval-status :approved_at="$log->approved_at" :declined_at="$log->declined_at" :canceled_at="$log->canceled_at"></x-approval-status>

                                </td>
                                <td>{{ $log->item->name }}</td>
                                <td>{{ ($log->quantity * -1) . ' ' . $log->item->unit->name }}</td>
                                <td>
                                    {{ $log->description ?? '-' }}
                                    <br>
                                    @if($log->declined_at)
                                    <span style="font-size: 8pt;">Ditolak karena: {{ $log->declined_reason ?? '-' }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            @if($transaction->logs()->count() == 0)
                            <tr>
                                <td colspan="4">Tidak ada barang digunakan.</td>
                            </tr>
                            @endif
                        </tbody>

                        @endforeach

                        @if($data->count() == 0)
                        <tbody>
                            <tr>
                                <td colspan="4">Tidak ada data untuk ditampilkan.</td>
                            </tr>
                        </tbody>
                        @endif
                    </table>

                    {{ $data->links() }}
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
        <script src="{{ asset('public') }}/assets/js/components/table.js"></script>
        <script>
        </script>
    </x-slot>
    <x-slot name="css">
    </x-slot>
</x-dashboard-layout>