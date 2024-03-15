<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html">
                <img src="{{ asset('theme/images/logo.png')}}" alt="Mono">
                <span class="brand-name">MINI PROJECT</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                @if(auth()->user()->role == "admin")
                <li>
                    <a class="sidenav-item-link" href="dashboard">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#data" aria-expanded="false" aria-controls="data">
                        <i class="mdi mdi-notebook"></i>
                        <span class="nav-text">Data</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="data" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="dataasisten">
                                    <span class="nav-text">Data Asistensi</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="datakelas">
                                    <span class="nav-text">Data Kelas</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="datamateri">
                                    <span class="nav-text">Data Materi</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#code" aria-expanded="false" aria-controls="code">
                        <i class="mdi mdi-cube-scan"></i>
                        <span class="nav-text">Generator</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="code" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="/generate-code">
                                    <span class="nav-text">Generator Kode</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#report" aria-expanded="false" aria-controls="report">
                        <i class="mdi mdi-book-open"></i>
                        <span class="nav-text">Report</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="report" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="riwayat">
                                    <span class="nav-text">Riwayat All Absen</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="riwayat-absen">
                                    <span class="nav-text">Riwayat Absen</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                @endif

                @if(auth()->user()->role == "pj")
                <li>
                    <a class="sidenav-item-link" href="dashboard">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#code" aria-expanded="false" aria-controls="code">
                        <i class="mdi mdi-cube-scan"></i>
                        <span class="nav-text">Generator</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="code" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="/generate-code">
                                    <span class="nav-text">Generator Kode</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li>
                    <a class="sidenav-item-link" href="riwayat-absen">
                        <i class="mdi mdi-file-document"></i>
                        <span class="nav-text">Riwayat Absen</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == "asisten")
                <li>
                    <a class="sidenav-item-link" href="dashboard">
                        <i class="mdi mdi-barcode-scan"></i>
                        <span class="nav-text">Absen</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="riwayat-absen">
                        <i class="mdi mdi-file-document"></i>
                        <span class="nav-text">Riwayat</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</aside>