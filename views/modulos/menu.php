<aside class="main-sidebar">
	 <section class="sidebar">
	 	<ul class="sidebar-menu">

		<?php

	//	if($_SESSION["perfil"] == "Administrador"){
			echo '<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>';

			echo '<li class="treeview">
			<a href="#">
				<i class="fa fa-user-plus"></i>					
				<span>Usuarios</span>					
				<span class="pull-right-container">					
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>

			<ul class="treeview-menu">					
				<li>
					<a href="empleados">							
						<i class="fa fa-user"></i>
						<span>Empleados</span>
					</a>
				</li>

				<li>
					<a href="proveedores">						
						<i class="fa fa-truck"></i>
						<span>Proveedores</span>
					</a>
				</li>
				
				<li>
					<a href="terceros">							
						<i class="fa fa-users"></i>
						<span>Terceros</span>
					</a>
				</li>
			</ul>
		</li>';

		echo '<li class="treeview">
		<a href="#">
			<i class="fa  fa-database"></i>					
			<span>Administrar</span>					
			<span class="pull-right-container">					
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>

		<ul class="treeview-menu">					
			<li>
				<a href="impuestos">							
					<i class="fa fa-usd"></i>
					<span>Impuestos</span>
				</a>
			</li>

			<li>
				<a href="categorias">						
					<i class="fa fa-th"></i>
					<span>Categorías</span>
				</a>
			</li>
			
			<li>
				<a href="productos">							
					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>
				</a>
			</li>
		</ul>
	</li>';

	//	}

	//	if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '			
			<li>
				<a href="crear-ingreso">
					<i class="fa fa-credit-card"></i>
					<span>Movimientos</span>
				</a>
			</li>

			<li>
				<a href="crear-venta">
					<i class="fa fa-shopping-cart"></i>
					<span>Crear venta</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-cogs"></i>					
					<span>Control</span>					
					<span class="pull-right-container">					
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">					
					<li>
						<a href="ventas">							
							<i class="fa fa-briefcase"></i>
							<span>Control ventas</span>
						</a>
					</li>

					<li>
						<a href="ingresos">						
							<i class="fa fa-book"></i>
							<span>Control movimientos</span>
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="reportes">
					<i class="fa fa-file"></i>
					<span>Reportes</span>
				</a>
			</li>';

	//	}

	//	if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

	//		echo '';

	//	}

	//	if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){


	//	}

		?>

		</ul>
	 </section>
</aside>