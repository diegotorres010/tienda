<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar datos de la tienda
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar datos de la tienda</li>
    
    </ol>

  </section>

    <?php

$item = "idTienda";
$valor = null;

$tienda = ControladorTiendas::ctrTraerTienda($item, $valor);

    ?>

 <section class="content">
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
                      <input type="text" class="form-control input-lg" name="editarTiendaNombre" id="editarTiendaNombre" value="<?php echo $tienda['nombreTienda']; ?>" required>
                      <input type="hidden" id="idTienda" name="idTienda" value="<?php echo $tienda['idTienda']; ?>">
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaDireccion" id="editarTiendaDireccion" value="<?php echo $tienda['direccion']; ?>" required>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" class="form-control input-lg" name="editarTiendaTelefono" id="editarTiendaTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask value="<?php echo $tienda['telefono']; ?>" required>
                  </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                  <select class="form-control select2" style="width: 100% !important;" name="editarTiendaPropietario" id="editarTiendaPropietario" required>

                    <?php

                    $item = null;
                    $valor = null;

                    $terceros = ControladorTerceros::ctrListarTercero($item, $valor);

                    foreach ($terceros as $key => $value) {
                      if ($value["estado"] != 0) {
                        echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].'</option>';
                      }
                    }

                    ?>
                  </select>
              </div>
            </div>

              <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      <input type="email" class="form-control input-lg" name="editarTiendaEmail" id="editarTiendaEmail" value="<?php echo $tienda['email']; ?>" required>
                  </div>
              </div>
          </div>
      </div>    

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>

      <?php
        $editarTienda = new ControladorTiendas();
        $editarTienda -> ctrEditarTienda();
      ?>

    </div>
  </div>
 </section>
 
</div>

<div id="modalEditarTienda" class="modal fade" role="dialog">  
  
</div>