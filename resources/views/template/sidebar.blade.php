      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('AdminLTE/dist/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">ADMINISTRATOR</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('dashboard.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                KLIEN DEWASA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dlitmas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LITMAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dbimbingan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>B & P</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                KLIEN ANAK
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pendampingan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendampingan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('alitmas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LITMAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('abimbingan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>B & P</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                PETUGAS PK
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('petugas.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Petugas</p>
                </a>
              </li>                                 
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->


          