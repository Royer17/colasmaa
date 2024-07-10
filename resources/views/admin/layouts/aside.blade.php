  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MDAA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
          <a href="javaScript:void(0);" class="d-block" onclick="callModalToEditUser();">Editar perfil</a>
          <a href="/logout" class="d-block">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          @if(in_array('ver-configuracion', $permissions))
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Configuración</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-usuarios', $permissions) && \Auth::user()->role_id == 1)
          <li class="nav-item">
            <a href="/admin/usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Usuarios</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-roles', $permissions))
          <li class="nav-item">
            <a href="/admin/roles" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>Roles</p>
            </a>
          </li>
          @endif
          
          @if(in_array('ver-municipalidad', $permissions))
          <li class="nav-item">
            <a href="/admin/municipalidad" class="nav-link">
              <i class="nav-icon fas fa-landmark"></i>
              <p>Municipalidad</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-rendicion-de-cuentas', $permissions))
          <li class="nav-item">
            <a href="/admin/rendicion-de-cuentas" class="nav-link">
              <i class="nav-icon fas fa-landmark"></i>
              <p>Rendición de cuentas</p>
            </a>
          </li>
          @endif



          @if(in_array('ver-concejo-municipal', $permissions))
          <li class="nav-item">
            <a href="/admin/concejo-municipal" class="nav-link">
              <i class="nav-icon fas fa-gavel"></i>
              <p>Concejo municipal</p>
            </a>
          </li>
          @endif
          
          @if(in_array('ver-comisiones', $permissions))
          <li class="nav-item">
            <a href="/admin/comisiones" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Comisiones</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-agenda', $permissions))
          <li class="nav-item">
            <a href="/admin/agenda" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>Agenda</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-noticias', $permissions))
          <li class="nav-item">
            <a href="/admin/noticias" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Noticias</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-obras', $permissions))
          <li class="nav-item">
            <a href="/admin/obras" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Obras</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-sliders', $permissions))
          <li class="nav-item">
            <a href="/admin/sliders" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>Sliders</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-popup', $permissions))
          <li class="nav-item">
            <a href="/admin/popups" class="nav-link">
              <i class="nav-icon fas fa-window-restore"></i>
              <p>Popup</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-servicios', $permissions))
          <li class="nav-item">
            <a href="/admin/servicios" class="nav-link">
              <i class="nav-icon fas fa-hand-point-up"></i>
              <p>Servicios</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-convocatorias', $permissions))
          <li class="nav-item">
            <a href="/admin/convocatorias" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>Convocatorias</p>
            </a>
          </li>
          @endif
          
          @if(in_array('ver-normas', $permissions))
          <li class="nav-item">
            <a href="/admin/normas" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>Normas</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-tipo-de-documento', $permissions))
          <li class="nav-item">
            <a href="/admin/tipos-de-documento" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Tipos de documento</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-videos', $permissions))
          <li class="nav-item">
            <a href="/admin/videos" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>Videos</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-documentos-institucionales', $permissions))
          <li class="nav-item">
            <a href="/admin/documentos-institucionales" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Favoritos</p>
            </a>
          </li>
          @endif

          @if(in_array('ver-otros-documentos-importantes', $permissions))
          <li class="nav-item">
            <a href="/admin/otros-documentos-importantes" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Enlaces</p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>