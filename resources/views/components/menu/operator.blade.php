<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="#" class="nav-link d-flex align-items-center disabled">
            <span class="sidebar-icon">
                <img
                    src="{{asset('assets/vendor/volt/dist/img/brand/light.svg')}}"
                    height="20"
                    width="20"
                    alt="Volt Logo"
                >
            </span>
            <span class="mt-1 ms-1 sidebar-text">OkSetda Absensi</span>
        </a>
    </li>

    {{-- dibagian operator pe home nanti isi dashboard seadanya --}}
    <li class="nav-item mt-3 {{Route::is('home') ? 'active' : ''}}">
        <a href="{{route('home')}}" class="nav-link">
            <span class="sidebar-icon">
                <span class="fas fa-home"></span>
            </span>
            <span class="sidebar-text">Beranda</span>
        </a>
    </li>

    <li role="separator" class="dropdown-divider mt-3 mb-3 border-black"></li>

    {{-- qrcode {scanner or generator} --}}
    {{-- qrcode scanner akan membuka kamera untuk memindai kode qr dari ponsel pegawai --}}
    {{-- qrcode generator akan menampilkan kode qr yang bisa di scan oleh ponsel pegawai --}}
    <li class="nav-item">
        <span
            class="nav-link  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse"
            data-bs-target="#submenu-qrcode"
        >
            <span>
                <span class="sidebar-icon">
                    <span class="fas fa-qrcode"></span>
                </span>
                <span class="sidebar-text">Qr Code</span>
            </span>
            <span class="link-arrow">
                <span class="fas fa-chevron-right"></span>
            </span>
        </span>
        <div
            class="multi-level collapse {{ Route::is('staff.qrcode.*') ? 'show' : '' }}"
            role="list"
            id="submenu-qrcode"
            aria-expanded="false"
        >
            <ul class="flex-column nav">
                <li class="nav-item {{ Route::is('staff.qrcode.scanner') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.qrcode.scanner')}}"
                    >
                        <span class="sidebar-text">Scanner</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('staff.qrcode.generator') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.qrcode.generator')}}"
                    >
                        <span class="sidebar-text">Generator</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li role="separator" class="dropdown-divider mt-3 mb-3 border-black"></li>

    {{-- attendance --}}
    {{-- dibagian attendance ini ada 3 menu --}}
    {{-- menu pertama Excel file, disini dorang manual isi presensi --}}
    {{-- via file excel sesuai format terus diupload nanti sistem yang proses --}}
    {{-- setiap file yang di uplaod juga akan dicatat dan tidak bisa dihapus --}}
    {{-- -------------------------------------------------------------------- --}}
    {{-- menu kedua manual input, disini dorang boleh isi manual 1/1 --}}
    {{-- berdasarkan input oleh operator berguna kalau mo update cuma 1/2/3 orang --}}
    {{-- -------------------------------------------------------------------- --}}
    {{-- menu ketiga verify submission, disini dorang (operator) boleh mo validasi --}}
    {{-- permintaan pengajuan seperti cuti atau sakit dengan lampiran file tertera --}}
    {{-- disini bisa di accept atau di reject tergantung syarat dan ketentuan --}}
    {{-- dan disini operator bisa juga membuat sebuah pejuan baru --}}
    <li class="nav-item">
        <span
            class="nav-link  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse"
            data-bs-target="#submenu-attendance"
        >
            <span>
                <span class="sidebar-icon">
                    <span class="fas fa-fingerprint"></span>
                </span>
                <span class="sidebar-text">Presensi</span>
            </span>
            <span class="link-arrow">
                <span class="fas fa-chevron-right"></span>
            </span>
        </span>
        <div
            class="multi-level collapse {{ Route::is('staff.attendance.*') ? 'show' : '' }}"
            role="list"
            id="submenu-attendance"
            aria-expanded="false"
        >
            <ul class="flex-column nav">
                <li class="nav-item {{ Route::is('staff.attendance.excel-file') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.attendance.excel-file')}}"
                    >
                        <span class="sidebar-text">Excel file</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('staff.attendance.manual-input') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.attendance.manual-input')}}"
                    >
                        <span class="sidebar-text">Manual input</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('staff.attendance.verify-submission') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.attendance.verify-submission')}}"
                    >
                        <span class="sidebar-text">Verifikasi Pengajuan</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    {{-- report -> export --}}
    {{-- dibagian report ini ada 4 menu --}}
    {{-- menu pertama berisikian semua data dengan pilihan range tanggal  --}}
    {{-- dan ditampilkan data keseluruhan perorangnya (berapa hadir, tidak hadir dsb) --}}
    {{-- -------------------------------------------------------------------- --}}
    {{-- menu kedua berisikan semua data dengan pilihan range tanggal --}}
    {{-- dan menampilklan data perorangna berdasarkan lokasi absensi dan detailnya --}}
    {{-- -------------------------------------------------------------------- --}}
    {{-- menu ketiga berisikan data detail absesni pegawai berdasarkan range waktu dan id --}}
    {{-- -------------------------------------------------------------------- --}}
    {{-- menu keempat berisikan data laporan harian --}}
    <li class="nav-item mt-2">
        <span
            class="nav-link  d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse"
            data-bs-target="#submenu-report"
        >
            <span>
                <span class="sidebar-icon">
                    <span class="fas fa-book"></span>
                </span>
                <span class="sidebar-text">Laporan</span>
            </span>
            <span class="link-arrow">
                <span class="fas fa-chevron-right"></span>
            </span>
        </span>
        <div
            class="multi-level collapse {{ Route::is('staff.reports.*') ? 'show' : '' }}"
            role="list"
            id="submenu-report"
            aria-expanded="false"
        >
            <ul class="flex-column nav">
                <li class="nav-item {{ Route::is('staff.reports.by-people') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.reports.by-people')}}"
                    >
                        <span class="sidebar-text">Menurut Pegawai</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('staff.reports.by-dates') ? 'active' : '' }}">
                    <a
                        class="nav-link"
                        href="{{route('staff.reports.by-dates')}}"
                    >
                        <span class="sidebar-text">Menurut Tanggal</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li role="separator" class="dropdown-divider mt-3 mb-3 border-black"></li>

    <li class="nav-item">
        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <span class="sidebar-icon">
                <span class="fas fa-sign-out-alt"></span>
            </span>
            <span class="sidebar-text">Keluar</span>
        </a>
    </li>

    <li role="separator" class="dropdown-divider mt-3 mb-3 border-black"></li>

    <li class="nav-item mt-3">
        <a
            href="{{url('docs')}}"
            target="_blank"
            class="nav-link d-flex align-items-center"
        >
            <span class="sidebar-icon">
                <span class="fas fa-book"></span>
            </span>
            <span class="sidebar-text">
                Dokumentasi
                <span class="badge badge-md bg-secondary ms-1 text-dark">
                    v1.0
                </span>
            </span>
        </a>
    </li>
</ul>
