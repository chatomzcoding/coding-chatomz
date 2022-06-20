<div class="sidebar-menu">
    <ul class="menu">
        <section class="d-none d-sm-block">
            <form action="{{ url('pencarian') }}" method="get">
                @csrf
                <input type="hidden" name="s" value="carinama">
                <div class="input-group mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="cari disini ..." aria-label="cari disini ..." aria-describedby="button-addon2" autocomplete="off" required>
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi-search"></i></button>
                </div>
            </form>
            <hr>
        </section>
        <li class="sidebar-title mt-0">Menu</li>
        <li class="sidebar-item active ">
            <a href="{{ url('dashboard') }}" class='sidebar-link'>
                <i class="bi bi-house-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi-file"></i>
                <span>Data Aplikasi</span>
            </a>
            <ul class="submenu">
                @foreach ($aplikasi as $item)
                    <li class="submenu-item">
                        <a href="{{ url('aplikasi/'.$item->id) }}">{{ $item->nama_aplikasi }}</a>
                    </li>
                @endforeach
            </ul>
        </li> --}}
        <li class="sidebar-item">
            <a href="{{ url('aplikasi') }}" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Data Aplikasi</span>
            </a>
        </li>

        <li class="sidebar-title my-2">Sistem</li>

        <li class="sidebar-item">
            <a href="{{ url('/user/'.Crypt::encryptString(Auth::user()->id).'/edit')}}" class="sidebar-link">
              <i class="bi bi-gear"></i> <span>Pengaturan Akun</span>
            </a>
        </li>
        <li class="sidebar-item">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"  class="sidebar-link"
                    onclick="event.preventDefault();
                            this.closest('form').submit();">
            <i class="bi bi-box-arrow-right"></i><span>Keluar</span></a>
        </form>
        </li>

    </ul>
</div>