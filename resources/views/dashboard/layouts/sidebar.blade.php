<div class="bg-white px-3" class="sidebar-nav" id="sidebar-wrapper" style="width: 220px;">
    <ul class="sidebar-nav py-4" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <a href="{{ route('beranda') }}" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'beranda' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-home me-2" style="margin-left: -30px;"></i>Beranda</a>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'mahasiswa' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-user-graduate me-2" style="margin-left: -30px;"></i>Mahasiswa</a>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'mataKuliah' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-book me-2" style="margin-left: -30px;"></i>Mata Kuliah</a>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'akademik' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-file-alt me-2" style="margin-left: -30px;"></i>Akademik</a>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'dosen' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-user-tie me-2" style="margin-left: -30px;"></i>Dosen</a>
        
    @if($user->role == 'Admin')
        <li class="nav-heading pt-4">Master Data</li>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'masterDataPengguna' == request()->path() ? 'active' : ''  }}""><i
            class="fas fa-user-friends me-2" style="margin-left: -30px;"></i>Pengguna</a>
        <a href="#" class="link list-group-item list-group-item-action bg-transparent second-text {{ 'masterDataMataKuliah' == request()->path() ? 'active' : ''  }}""><i
            class="fas fa-list me-2" style="margin-left: -30px;"></i>Mata Kuliah</a>
    @endif
        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-transparent text-danger"><i
            class="fas fa-sign-out-alt me-2" style="margin-left: -30px;"></i>Keluar</a>
    </ul>
</div>