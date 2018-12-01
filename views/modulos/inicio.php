<div class="content-wrapper">
  <section class="content-header"> 
    <?php
       echo '<h1>Bienvenid@ ' .$_SESSION["nombreEmpleado"].'</h1>';
    ?>

    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>    
    </ol>

  </section>

  <section class="content">

    <?php

$item = "idTienda";
$valor = null;

$tienda = ControladorTiendas::ctrTraerTienda($item, $valor);

    echo '<div class="box-header with-border">  
            <button class="btn btn-block btn-linkedin btn-lg fa fa-edit btnEditarTienda" data-toggle="modal" data-target="#modalEditarTienda" idTienda="'.$tienda["idTienda"].'">          
            Editar datos de la tienda
            </button>
          </div>';
    ?>

    

    <div class="row">
      
    <?php

  //  if($_SESSION["perfil"] =="Administrador"){

      include "inicio/cajas-superiores.php";

   // }

    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-12">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
        //   include "reportes/grafico-ventas.php";

        //  }

          ?>

        </div>

        <div class="col-lg-6">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
        //   include "reportes/productos-mas-vendidos.php";

        // }

          ?>

        </div>

         <div class="col-lg-6">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
        //   include "inicio/productos-recientes.php";

         //}

          ?>

        </div>

         <div class="col-lg-12">
           
          <?php

        //  if($_SESSION["perfil"] =="Especial" || $_SESSION["perfil"] =="Vendedor"){
        // esto es solo para usuarios sin permisos al dashboard
             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["nombreEmpleado"].'</h1>

             </div>

             </div>';

        //  }

          ?>

         </div>

     </div>

  </section>
 
</div>

<div id="modalEditarTienda" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar tienda</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaNombre" id="editarTiendaNombre" required>
                      <input type="hidden" id="idTienda" name="idTienda">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaDireccion" id="editarTiendaDireccion" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaTelefono" id="editarTiendaTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaPropietario" id="editarTiendaPropietario" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" class="form-control input-lg" name="editarTiendaEmail" id="editarTiendaEmail" required>
                  </div>
              </div>
          </div>
      </div>    

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

      <?php
        $editarTienda = new ControladorTiendas();
        $editarTienda -> ctrEditarTienda();
      ?>

    </div>
  </div>
</div>