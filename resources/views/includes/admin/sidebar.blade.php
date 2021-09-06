<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-warning accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <!-- <div class="sidebar-brand-text mx-3">AgendaONLINE</div><br>
    <div class="sidebar-brand-text mx-3">SMAN 2 Gunungputri</div> -->
    <img src="{{ url('frontend/images/logo-app.png')}}" class="img-thumbnail" />
  </a> 

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{(Request::segment(2) == "") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li> 

  <li class="nav-item {{(Request::segment(2) == "agenda") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('agenda.index') }}">
      <i class="fas fa-fw fa-calendar"></i>
      <span>Agenda</span></a>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-users"></i>
      <span>Guru</span></a>
  </li> -->

  <li class="nav-item {{(Request::segment(2) == "mapel") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('mapel.index') }}">
      <i class="fas fa-fw fa-book"></i>
      <span>Mata Pelajaran</span></a>
  </li>   

  <li class="nav-item {{(Request::segment(2) == "kelas") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('kelas.index') }}">
      <i class="fas fa-fw fa-dice-d6"></i>
      <span>Kelas</span></a>
  </li>

  <li class="nav-item {{(Request::segment(2) == "kompetensi") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('kompetensi.index') }}">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Kompetensi Dasar</span></a>
  </li> 

  <li class="nav-item {{(Request::segment(2) == "akun") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('akun.index') }}">
      <i class="fas fa-fw fa-users-cog"></i>
      <span>Kelola Akun</span></a>
  </li>

  <li class="nav-item {{(Request::segment(2) == "jam") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('jam.index') }}">
      <i class="fas fa-fw fa-clock"></i>
      <span>Jam Pelajaran</span></a>
  </li>

  <li class="nav-item"> 
    <a class="nav-link text-light" href="#" data-toggle="modal" data-target="#logoutModal"> 
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


  <!-- <li class="nav-item {{(Request::segment(2) == "absensi") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('absensi.index') }}">
      <i class="fas fa-fw fa-check-circle"></i>
      <span>Absensi Siswa</span></a>
  </li>  -->
  

<!--     <li class="nav-item {{(Request::segment(2) == "pengaturan") ? 'border-left-light active' : ''}}">
    <a class="nav-link text-light" href="{{ route('pengaturan.index') }}">
      <i class="fas fa-fw fa-database"></i>
      <span>Hapus data</span></a>
  </li> -->

</ul>
<!-- End of Sidebar -->