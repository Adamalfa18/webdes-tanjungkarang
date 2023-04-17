 {{-- NEW SIDEBAR --}}
 <div id="sidebar" class="active">
     <div class="sidebar-wrapper active">
         <div class="sidebar-header">
             <div class="d-flex justify-content-between">
                 <div class="dashboard-logo">
                     <a href="#">
                         <img src="{{ asset('images/logo/logo-desk.png') }}" alt="Logo"></a>
                 </div>
             </div>
         </div>
         <div class="sidebar-menu">
             <ul class="menu">
                 @if (Auth::user()->user_role_id == '1')
                     <li class="sidebar-item @yield('dashboard') ">
                         <a href="/dashboard" class='sidebar-link '>
                             <i class="bi bi-grid-fill"></i>
                             <span>Dashboard</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('data_penduduk') ">
                         <a href="/dashboard/data-penduduk" class='sidebar-link '>
                             <i class="bi bi-clipboard-data"></i>
                             <span>Data Penduduk</span>
                         </a>
                     </li>

                     <li class="sidebar-item  @yield('kelola-berita') has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-newspaper"></i>
                             <span>Kelola Berita</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item @yield('berita') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/posts">Berita</a>
                             </li>
                             <li class="submenu-item @yield('category') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/category">Kategory Berita</a>
                             </li>
                         </ul>
                     </li>

                     {{-- <li class="sidebar-item @yield('potensi-desa') ">
                         <a href="/dashboard/villages" class='sidebar-link '>
                             <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                             <span>Potensi Desa</span>
                         </a>
                     </li> --}}

                     <li class="sidebar-item  @yield('data_desa') has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-clipboard-data"></i>
                             <span>Data Desa</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item @yield('pekerjaan') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/data/professions">Data Pekerjaan</a>
                             </li>
                             <li class="submenu-item  @yield('pendidikan') ">
                                 <a href="/dashboard/data/educations">Data Pendidikan</a>
                             </li>
                             <li class="submenu-item  @yield('agama')">
                                 <a href="/dashboard/data/religions">Data Agama</a>
                             </li>
                             <li class="submenu-item  @yield('jenis')">
                                 <a href="/dashboard/data/genders">Data Jenis Kelamin</a>
                             </li>
                             <li class="submenu-item  @yield('perkawinan')">
                                 <a href="/dashboard/data/marriages">Data Perkawinan</a>
                             </li>
                         </ul>
                     </li>

                     <li class="sidebar-item  @yield('profil-desa') has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-person"></i>
                             <span>Profil Desa</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item @yield('aparat') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/aparatur">Aparatur Desa</a>
                             </li>
                             <li class="submenu-item @yield('profil') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/profil_desa">Profil Desa</a>
                             </li>
                             <li class="submenu-item @yield('category-profil') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/kategori_profil">Ketagori Profil</a>
                             </li>
                         </ul>
                     </li>

                     {{-- <li class="sidebar-item @yield('informasi-keuangan') ">
                         <a href="/dashboard/finances" class='sidebar-link '>
                             <i class="bi bi-cash"></i>
                             <span>Informasi Keuangan</span>
                         </a>
                     </li> --}}

                     {{-- <li class="sidebar-item @yield('program-bantuan') ">
                         <a href="/dashboard/programs" class='sidebar-link '>
                             <i class="bi bi-pen-fill"></i>
                             <span>Program Bantuan</span>
                         </a>
                     </li> --}}

                     <li class="sidebar-item @yield('dokumen') ">
                         <a href="/dashboard/data_pdf" class='sidebar-link '>
                             <i class="bi bi-upload"></i>
                             <span>Upload Dokumen</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('kelola_akun') ">
                         <a href="/dashboard/user_login" class='sidebar-link'>
                             <i class="bi bi-gear"></i>
                             <span>Pengaturan Akun</span>
                         </a>
                     </li>
                 @endif
                 @if (Auth::user()->user_role_id == '1' || Auth::user()->user_role_id == '2')
                     <li class="sidebar-item @yield('layanan') ">
                         <a href="/dashboard/layanan" class='sidebar-link '>
                             <i class="bi bi-envelope"></i>
                             <span>Layanan Mandiri</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('dokumen_surat') ">
                         <a href="/dashboard/dokumen_surat" class='sidebar-link '>
                             <i class="bi bi-file-earmark-word"></i>
                             <span>Template Surat</span>
                         </a>
                     </li>
                 @endif


             </ul>
             {{-- @can('user') --}}





             <ul class="menu mt-5">
                 <div class="navbar-nav">
                     <div class="nav-item text-nowrap">
                         <form action="/logout" method="post">
                             @csrf
                             <button type="submit" class="btn btn-outline-danger">Logout <span class="ms-2"
                                     data-feather="log-out"></span></button>
                         </form>
                     </div>
                 </div>
             </ul>

         </div>
         <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
     </div>
 </div>
