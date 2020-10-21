<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset("/home") }}" class="brand-link">
      <img src="{{ asset("/adminlte/img/logobpom.png") }}"
           alt="AdminLTE Logo"
           class="brand-image"
           style="opacity: .9">
      <span class="brand-text font-weight-light">SIPENSA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("/adminlte/img/user2-160x160.jpg") }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
-->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ asset("/home") }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

            @if(Auth::user()->roles == '["ADMIN"]')
      
      <li class="nav-item">
        <a href="{{ asset("/user") }}" class="nav-link">
          <i class="nav-icon far fa-grin-beam"></i>
          <p>
            Pegawai
            
          </p>
        </a>
      </li>
     
      @endif
      <li class="nav-item">
            <a href="{{ asset("/budget") }}" class="nav-link">
            <i class="nav-icon fa fa-money-bill-wave"></i>
              <p>
                Anggaran
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset("/sarana") }}" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Sarana
                
              </p>
            </a>
          </li>
            </ul> 
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-forward"></i>
              <p>
                Kinerja
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ asset("/iku") }}" class="nav-link">
              <i class="nav-icon fas fa-landmark"></i>
              <p>
                Unit Kerja
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('individu.index') }}" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Individu
              </p>
            </a>
          </li>
            </ul> 
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                Pemeriksaan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ asset("/stugas") }}" class="nav-link">
              <i class="nav-icon fas fa-battery-full"></i>
              <p>
                Surat Tugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ asset("/audit") }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Audit
                
              </p>
            </a>
          </li>
            </ul> 
          </li>
          <!-- <li class="nav-item">
            <a href="{{ asset("/event") }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Agenda
                
              </p>
            </a>
          </li>    -->
          <!-- <li class="nav-item">
            <a href="{{ asset("/convert") }}" class="nav-link">
              <i class="nav-icon far fa-file-excel"></i>
              <p>
                Konversi
                
              </p>
            </a>
          </li>    -->
        </ul>
      </nav> 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  