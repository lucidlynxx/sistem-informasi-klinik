<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-diamond-fill"></i></div>
                    Dashboard
                </a>
                @can('isAdmin')
                <div class="sb-sidenav-menu-heading">Data</div>
                <a class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                    User
                </a>
                <a class="nav-link {{ Request::is('dashboard/employees') ? 'active' : '' }}"
                    href="{{ route('employees.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-vcard-fill"></i></div>
                    Pegawai
                </a>
                <a class="nav-link {{ Request::is('dashboard/regions') ? 'active' : '' }}"
                    href="{{ route('regions.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-geo-alt-fill"></i></div>
                    Wilayah
                </a>
                @endcan
                @can('isDokter')
                <a class="nav-link {{ Request::is('dashboard/actions') ? 'active' : '' }}"
                    href="{{ route('actions.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-activity"></i></div>
                    Tindakan
                </a>
                <a class="nav-link {{ Request::is('dashboard/medicines') ? 'active' : '' }}"
                    href="{{ route('medicines.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-capsule"></i></div>
                    Obat
                </a>
                @endcan
                @can('isPetugasPendaftaran')
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link {{ Request::is('dashboard/patients') ? 'active' : '' }}"
                    href="{{ route('patients.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-lines-fill"></i></div>
                    Pasien
                </a>
                <a class="nav-link {{ Request::is('dashboard/registrations') ? 'active' : '' }}"
                    href="{{ route('registrations.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-lines-fill"></i></div>
                    Pendaftaran Pasien
                </a>
                @endcan
                @can('isDokter')
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link {{ Request::is('dashboard/medicalrecords') ? 'active' : '' }}"
                    href="{{ route('medicalrecords.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-prescription2"></i></div>
                    Layanan Medis
                </a>
                @endcan
                @can('isKasir')
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link {{ Request::is('dashboard/payments') ? 'active' : '' }}"
                    href="{{ route('payments.index') }}">
                    <div class="sb-nav-link-icon"><i class="bi bi-receipt-cutoff"></i></div>
                    Pembayaran
                </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }} | {{ Auth::user()->role }}
        </div>
    </nav>
</div>