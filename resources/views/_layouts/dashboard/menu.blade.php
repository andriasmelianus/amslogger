<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">Umum</li>
                    <li class="site-menu-item">
                        <a href="{{ route('dashboard') }}" data-slug="dashboard">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                            <!-- <div class="site-menu-badge">
                                <span class="badge badge-success">2</span>
                            </div> -->
                        </a>
                    </li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                            <span class="site-menu-title">Profil</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.profile.change-password-form') }}" data-slug="layout-menu-collapsed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Ganti Password</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.profile.update-form') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Ubah Data Pribadi</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="site-menu-category">Barang</li>
                    @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                    <!-- Data Induk -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                            <span class="site-menu-title">Data induk</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.items') }}" data-slug="layout-menu-collapsed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Barang</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.units') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Satuan</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.brands') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Merk</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.categories') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- Daftar Transaksi Saya -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-order" aria-hidden="true"></i>
                            <span class="site-menu-title">Transaksi Saya</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.stock-opnames') }}" data-slug="layout-menu-collapsed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Stok Opname</span>
                                </a>
                            </li>
                            @endif
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.usages') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penggunaan</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.returns') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Pengembalian</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.requests') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Permintaan</span>
                                </a>
                            </li>
                            @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.purchases') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Pembelian</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    <!-- Transaksi -->
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-add-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Transaksi</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.stock-opnames.create-form') }}" data-slug="layout-menu-collapsed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Stok Opname</span>
                                </a>
                            </li>
                            @endif
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.usages.create-form') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penggunaan</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.returns.create-form') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Pengembalian</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.requests.create-form') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Permintaan</span>
                                </a>
                            </li>
                            @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                            <li class="site-menu-item">
                                <a class="animsition-link" href="{{ route('dashboard.purchases.create-form') }}" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Pembelian</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    <li class="site-menu-item">
                        <a href="{{ route('dashboard.usages.create-form') }}">
                            <i class="site-menu-icon wb-shopping-cart" aria-hidden="true"></i>
                            <span class="site-menu-title">Penggunaan</span>
                            <!-- <div class="site-menu-badge">
                                <span class="badge badge-success">2</span>
                            </div> -->
                        </a>
                    </li>

                    @if(Auth::user()->role == App\Constants\User::TYPE_APPROVER)
                    <li class="site-menu-item">
                        <a href="{{ route('dashboard.approvals') }}">
                            <i class="site-menu-icon wb-check" aria-hidden="true"></i>
                            <span class="site-menu-title">Persetujuan</span>
                            <!-- <div class="site-menu-badge">
                                <span class="badge badge-success">2</span>
                            </div> -->
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->role == App\Constants\User::TYPE_GOD)
                    <li class="site-menu-category">Rekapitulasi</li>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)" data-slug="layout">
                            <i class="site-menu-icon wb-add-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Laporan</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="layouts/menu-collapsed.html" data-slug="layout-menu-collapsed">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Stok Opname</span>
                                </a>
                            </li>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="layouts/menu-expended.html" data-slug="layout-menu-expended">
                                    <i class="site-menu-icon " aria-hidden="true"></i>
                                    <span class="site-menu-title">Penggunaan</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>

                <div class="site-menubar-section">
                    <h5>
                        Milestone
                        <span class="pull-right">30%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 30%;" role="progressbar"></div>
                    </div>
                    <h5>
                        Release
                        <span class="pull-right">60%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 60%;" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="javascript:logout();" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>