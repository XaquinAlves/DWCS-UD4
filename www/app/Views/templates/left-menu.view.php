<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link <?php echo isset($seccion) && $seccion === '/inicio' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/proveedores" class="nav-link <?php echo isset($seccion) && $seccion === '/proveedores' ?
                        'active' : ''; ?>">
                  <i class="fas fa-headset nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/demo-proveedores" class="nav-link <?php echo isset($seccion) && $seccion ===
                '/demo-proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Demo Proveedores</p>
                </a>
              </li>              
            </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Iterativas
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas03" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas03' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 3</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas04" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas04' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 4</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas05" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas05' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 5</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas06" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas06' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 6</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas07" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas07' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 7</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $_ENV['host.folder'] ?>iterativas08" class="nav-link
                            <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'iterativas08' ?
                                'active' : ''; ?>">
                            <i class="nav-icon fas fa-laptop-code"></i>
                            <p>Iterativas 8</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->