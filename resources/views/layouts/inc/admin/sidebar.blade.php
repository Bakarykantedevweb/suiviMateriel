<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Adminstrateur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Nouveau
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('admin/materiel/create') }}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajout</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/materiel') }}" class="nav-link">
                                <i class="fa fa-list nav-icon"></i>
                                <p>Listes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/sortimateriel') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt nav-icon"></i>
                                <p>Sorti</p>
                            </a>
                        </li>
                    </ul>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-table"></i>
                             <p>
                                 Recuperer
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ url('admin/materiel/recuperer/create') }}" class="nav-link">
                                     <i class="fa fa-plus nav-icon"></i>
                                     <p>Ajout</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ url('admin/materiel/recuperer') }}" class="nav-link">
                                     <i class="fa fa-list nav-icon"></i>
                                     <p>Listes</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/agence') }}" class="nav-link">
                         <i class="fa fa-building nav-icon"></i>
                         <p>Agences</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/fournisseur') }}" class="nav-link">
                         <i class="fa fa-users nav-icon"></i>
                         <p>Fornisseurs</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('admin/departement') }}" class="nav-link">
                         <i class="fas fa-warehouse nav-icon"></i>
                         <p>Departements</p>
                     </a>
                 </li>
                <li class="nav-item">
                    <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i> {{ __('Deconnexion') }}

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
