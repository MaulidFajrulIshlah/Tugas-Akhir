<div class="bg-white px-3" class="sidebar-nav" id="sidebar-wrapper" style="width: 220px;">
    <ul class="sidebar-nav py-4" id="sidebar-nav">
        <li class="nav-heading mb-2">Dashboard</li>
        
        <a href="{{ route('beranda') }}" class="link list-group-item second-text navSidebar mb-2 {{ 'beranda' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-home me-2"></i>Beranda</a> 
        <a href="{{ route('mahasiswa') }}" class="link list-group-item second-text navSidebar rounded mb-2 {{ 'mahasiswa' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-user-graduate me-2"></i>Mahasiswa</a>
        <a href="#" class="link list-group-item  second-text navSidebar rounded mb-2 {{ 'mataKuliah' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-book me-2"></i>Mata Kuliah</a>
        <a href="#" class="link list-group-item  second-text navSidebar rounded mb-2 {{ 'akademik' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-file-alt me-2"></i>Akademik</a>
        <a href="#" class="link list-group-item  second-tFext navSidebar rounded mb-2 {{ 'dosen' == request()->path() ? 'active' : ''  }}"><i
            class="fas fa-user-tie me-2"></i>Dosen</a>
        
    @if($user->role == 'Admin')
        <li class="nav-heading pt-4 mb-2">Master Data</li>
        <a href="#" class="link list-group-item  second-text navSidebar rounded mb-2 {{ 'masterDataPengguna' == request()->path() ? 'active' : ''  }}""><i
            class="fas fa-user-friends me-2"></i>Pengguna</a>
        <a href="#" class="link list-group-item  second-text navSidebar rounded mb-2 {{ 'masterDataMataKuliah' == request()->path() ? 'active' : ''  }}""><i
            class="fas fa-list me-2"></i>Mata Kuliah</a>
    @endif
        <a href="{{ route('logout') }}" class="list-group-item rounded logout-link"><i
            class="fas fa-sign-out-alt me-2"></i>Keluar</a>
    </ul>
</div>