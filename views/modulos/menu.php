<aside class="main-sidebar">
	 <section class="sidebar">
	 	<ul class="sidebar-menu" data-widget="tree">

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
						<span>Contactos</span>					
						<span class="pull-right-container">					
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>

					<ul class="treeview-menu">
						<li>
							<a href="proveedores">						
								<i class="fa fa-truck"></i>
								<span>Proveedores</span>
							</a>
						</li>
						
						<li>
							<a href="clientes">							
								<i class="fa fa-users"></i>
								<span>Clientes</span>
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
					<span>Catálogo</span>					
					<span class="pull-right-container">					
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu">
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
				<a href="crear-entrada">
					<i class="fa fa-suitcase"></i>
					<span>Crear entrada</span>
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
						<a href="control-entrada">						
							<i class="fa fa-caret-square-o-left"></i>
							<span>Control entradas</span>
						</a>
					</li>

					<li>
						<a href="control-venta">							
							<i class="fa fa-caret-square-o-right"></i>
							<span>Control ventas</span>
						</a>
					</li>

					<li>
						<a href="estado-productos">							
							<i class="fa fa-hourglass-half"></i>
							<span>Estado de productos</span>
						</a>
					</li>
				</ul>
			</li>';

		echo '<li>
				<a href="deudores">
					<i class="fa fa-credit-card"></i>
					<span>Deudores</span>
				</a>
			</li>

			<li>
				<a href="deudas">
					<i class="fa fa-thumbs-down"></i>
					<span>Deudas por pagar</span>
				</a>
			</li>
			
			<li>
				<a href="informes">
					<i class="fa fa-file"></i>
					<span>Informes</span>
				</a>
			</li>';

			echo '<li class="treeview">
					<a href="#">
						<i class="fa fa-wrench"></i>					
						<span>Configuración</span>					
						<span class="pull-right-container">					
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>

					<ul class="treeview-menu">
						<li>
							<a href="tienda">						
								<i class="fa fa-key"></i>
								<span>Perfil de la tienda</span>
							</a>
						</li>

						<li>
							<a href="impuestos">							
								<i class="fa fa-usd"></i>
								<span>Impuestos</span>
							</a>
						</li>
			
						<li>
							<a href="medidas">							
								<i class="fa fa-cubes"></i>
								<span>Medidas</span>
							</a>
						</li>

					</ul>
				</li>';

			echo '<li class="treeview">
					<a href="#">
						<i class="fa fa-expeditedssl"></i>					
						<span>Administrar accesos</span>					
						<span class="pull-right-container">					
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>

					<ul class="treeview-menu">
						<li>
							<a href="permisos">						
								<i class="fa fa-key"></i>
								<span>Permisos</span>
							</a>
						</li>

						<li>
							<a href="empleados">							
								<i class="fa fa-user"></i>
								<span>Empleados</span>
							</a>
						</li>
					</ul>
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