	<?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">VISDECLI <span class="glyphicon">&#xe092;</span> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">  
	  
        <li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i class='glyphicon glyphicon-user'></i> Clientes <span class="sr-only">(current)</span></a></li>
        <li class="<?php echo $active_productos;?>"><a href="productos.php"><i class='glyphicon glyphicon-barcode'></i> Productos</a></li>
		
		<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class='glyphicon glyphicon-random'></i>
                        Distribuir <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="crear-dist.php"><i class='glyphicon glyphicon-fullscreen'></i> - Crear Distribución</a></li>
                <li class="divider"></li>
                <li><a href="dist-cli.php"><i class='glyphicon glyphicon-tasks'></i> - Distribución x Cliente</a></li>
                <li class="divider"></li>                
            </ul>
        </li>
			
		<li class="<?php echo $active_orden;?>"><a href="orden.php"><i  class='glyphicon glyphicon-folder-open'></i> Orden de Compras</a></li>
		
		<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> <i class='glyphicon glyphicon-list-alt'></i>
                        Carga x Lotes <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="lista.php"><i class='glyphicon glyphicon-sort-by-order'></i> - Lista de Precios</a></li>
                <li class="divider"></li>
                <li><a href="inventario.php"><i class='glyphicon glyphicon-equalizer'></i> - Inventario</a></li>
                <li><a href="#">Orden de Compra</a></li>
                <li class="divider"></li>
                <li><a href="#">Venta Real</a></li>
            </ul>
        </li>
		
		<li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i  class='glyphicon glyphicon-lock'></i> Usuarios</a></li>
		<li class="<?php if(isset($active_perfil)){echo $active_perfil;}?>"><a href="perfil.php"><i  class='glyphicon glyphicon-cog'></i> Configuración</a></li>
       </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://obedalvarado.pw/contacto/" target='_blank'><i class='glyphicon glyphicon-envelope'></i> Soporte</a></li>
		<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
      </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php
		}
	?>