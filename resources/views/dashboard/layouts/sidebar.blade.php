
<nav id="navbar">
        <div class="logo-name">
            <span class="logo_name">Sistem Pakar</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links" style="padding-left:0;">
                @can('admin')
                <li><a {{ Request::is("dashboard") ? "class=active" : "" }} href="/dashboard/">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                @endcan
                @can('admin')

                <li><a {{ Request::is("dashboard/kecanduan*") ? "class=active" : "" }} href="/dashboard/kecanduan/">
                   <i class="uil uil-hospital"></i>
                    <span class="link-name">Daftar Kecanduan</span>
                </a></li>
                <li><a {{ Request::is("dashboard/gejala*") ? "class=active" : "" }} href="/dashboard/gejala/">
                    <i class="uil uil-heartbeat"></i>
                    <span class="link-name">Daftar Gejala</span>
                </a></li>
                <li><a {{ Request::is("dashboard/basis-aturan*") ? "class=active" : "" }} href="/dashboard/basis-aturan/">
                    <i class="uil uil-syringe"></i>
                    <span class="link-name">Basis Aturan</span>
                </a></li>
                @endcan
                <li><a {{ Request::is("dashboard/diagnosa*") ? "class=active" : "" }} href="/dashboard/diagnosa/">
                    <i class="uil uil-stethoscope-alt"></i>
                    <span class="link-name">Diagnosa</span>
                </a></li>
                <li><a {{ Request::is("dashboard/riwayat*") ? "class=active" : "" }} href="/dashboard/riwayat/">
                    <i class="uil uil-clipboard-alt"></i>
                    <span class="link-name">Riwayat Diagnosa</span>
                </a></li>
            </ul>
            <ul class="logout-mode" style="padding-left:0;">
                <li>
                    <a href="/logout">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
</nav>
