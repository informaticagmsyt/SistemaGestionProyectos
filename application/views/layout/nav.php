  <!-- Nav -->
  <nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">

    <li class="px-nav-item px-nav-dropdown active">
        <a href="#"><i class="px-nav-icon far fa-address-card"></i><span class="px-nav-label">Requerimiento</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fa fa-edit"></i><span class="px-nav-label">Registrar </span></a></li>
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fa fa-search"></i><span class="px-nav-label">Consultar</span></a></li>
         
        </ul>
      </li>

      <li class="px-nav-item px-nav-dropdown ">
        <a href="#"><i class="px-nav-icon fas fa-book"></i><span class="px-nav-label">Proyectos</span></a>
        <ul class="px-nav-dropdown-menu">
        <li class="px-nav-item"><a href="<?php echo base_url('index.php/proyectos/registrar');?>"><i class="px-nav-icon fa fa-edit"></i><span class="px-nav-label">Registrar </span></a></li>

          <li class="px-nav-item"><a href="<?php echo base_url('index.php/proyectos/');?>""><i class="px-nav-icon fas fa-book"></i><span class="px-nav-label">Listar Proyectos </span></a></li>
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fa fa-search"></i><span class="px-nav-label">Consultar</span></a></li>
         </ul>
      </li>

      <li class="px-nav-item px-nav-dropdown ">
        <a href="#"><i class="px-nav-icon fa fa-user"></i><span class="px-nav-label">Tutores</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="<?php echo base_url();?>index.php/Tutores/registrar"><i class="px-nav-icon fa fa-user-plus"></i><span class="px-nav-label">Registrar </span></a></li>
          <li class="px-nav-item"><a href="<?php echo base_url();?>index.php/Tutores/listado"><i class="px-nav-icon fas fa-book"></i><span class="px-nav-label">Listar Tutores</span></a></li>
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fa fa-search"></i><span class="px-nav-label">Consultar</span></a></li>
         </ul>
      </li>


 

      
      <li class="px-nav-item px-nav-dropdown ">
        <a href="#"><i class="px-nav-icon fas fa-clipboard-list " ></i><span class="px-nav-label">Tareas</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fas fa-plus"></i><span class="px-nav-label">Nueva Tarea </span></a></li>
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon fa fa-search"></i><span class="px-nav-label">Listar Tareas</span></a></li>
        </ul>
      </li>


    
 

      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Reportes</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="#"><span class="px-nav-label">Flot.js</span></a></li>
          <li class="px-nav-item"><a href="#"><span class="px-nav-label">Morris.js</span></a></li>

        </ul>
      </li>


      <li class="px-nav-item px-nav-dropdown ">
        <a href="#"><i class="px-nav-icon fas fa-cogs"></i><span class="px-nav-label">Configuración</span></a>
        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon"></i><span class="px-nav-label">Nuevo Usuario </span></a></li>
          <li class="px-nav-item"><a href="#"><i class="px-nav-icon "></i><span class="px-nav-label">Listar Usuarios</span></a></li>
         </ul>
      </li>
      <li class="px-nav-item">
        <a href="<?php echo base_url("index.php/login/logout"); ?>"><i class="px-nav-icon fas fa-sign-out-alt " ></i><span class="px-nav-label">Salir</span></a>
      </li>
    </ul>
  </nav>