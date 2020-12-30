<x-dashboard-layout title="Dashboard">
    <div class="page animsition">
        <div class="page-content padding-30 container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xlg-3 col-md-6">
                    <!-- Panel Watchlist -->
                    <div class="widget widget-shadow" id="widgetTable">
                        <div class="widget-body padding-30">
                            <h3 class="widget-title">
                                <span class="text-truncate">Penggunaan</span>
                                &nbsp;
                                <span class="pull-right red-600 font-size-24">{{ 264 }}</span>
                            </h3>
                        </div>
                        <table class="table margin-bottom-0">
                            <tbody>
                                <!-- <tr>
                                    <td>GMY</td>
                                    <td>$ 9,500</td>
                                    <td class="green-600">+ 458</td>
                                </tr> -->

                                @if(!isset($usageData))
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- End Panel Watchlist -->
                </div>

                <div class="col-xlg-3 col-md-6">
                    <!-- Panel Watchlist -->
                    <div class="widget widget-shadow" id="widgetTable">
                        <div class="widget-body padding-30">
                            <h3 class="widget-title">
                                <span class="text-truncate">Permintaan</span>
                                <span class="pull-right blue-600 font-size-24">{{ 264 }}</span>
                            </h3>
                        </div>
                        <table class="table margin-bottom-0">
                            <tbody>
                                <!-- <tr>
                                    <td>GMY</td>
                                    <td>$ 9,500</td>
                                    <td class="green-600">+ 458</td>
                                </tr> -->

                                @if(!isset($requestData))
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- End Panel Watchlist -->
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- Inline -->
        <link rel="stylesheet" href="{{ asset('public') }}/assets/examples/css/dashboard/v1.css">
    </x-slot>
</x-dashboard-layout>