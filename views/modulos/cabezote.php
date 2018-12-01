 <header class="main-header">
	<a href="inicio" class="logo">
		<span class="logo-mini">			
			<img src="views/img/plantilla/logo.png" class="img-responsive" style="padding:10px">
		</span>		
		<span class="logo-lg">			
			<img src="views/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:5px 30px 5px 40px">
		</span>
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	<span class="sr-only">Menu</span>
      	</a>
		<div class="navbar-custom-menu">				
			<ul class="nav navbar-nav">				
				<li class="dropdown user user-menu">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){
						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
					}else{
						echo '<img src="views/img/empleados/default/anonymous.png" class="user-image">';
					}

					$item = "idUsuario";
					$valor = $_SESSION["idUsuario"];
			
					$terceros = ControladorTerceros::ctrMostrarTercero($item, $valor);

					?>						
					
						<span class="hidden-xs"><?php  echo $terceros["descripcion"]; ?></span>
					</a>

					<ul class="dropdown-menu">						
						<li class="user-body">							
							<div class="pull-right">								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
 </header>