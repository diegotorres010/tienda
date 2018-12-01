<?php

/*if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}*/

?>

<div class="content-wrapper">
  <section class="content-header">    
    <h1>      
      Administrar terceros    
    </h1>

    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      
      <li class="active">Administrar terceros</li>    
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTercero">          
          Agregar tercero
        </button>
      </div>

      <div class="box-body">        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         
        <thead>         
         <tr>           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Número de documento</th>
           <th>Email</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Fecha nacimiento</th>
           <th>Fecha registro</th>
           <th>Tipo</th>
           <th>Estado</th>
           <th>Acciones</th>
         </tr> 
        </thead>

        <tbody>

        <?php
          $item = null;
          $valor = null;

          $terceros = ControladorTerceros::ctrListarTercero($item, $valor);

          foreach ($terceros as $key => $value) {

            $tipoUsuario = "";
            switch($value["tipoUsuario"]){
              case 1: 
                $tipoUsuario = "Cliente";
                break;
              case 2:
                $tipoUsuario = "Proveedor";
                break;          
              case 3:
                $tipoUsuario = "Empleado";
                break;                
              default:
                $tipoUsuario = "null";
                break;                
            }
            
            echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["descripcion"].'</td>
                    <td>'.$value["documento"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["telefono"].'</td>
                    <td>'.$value["direccion"].'</td>
                    <td>'.$value["fechaNacimiento"].'</td>
                    <td>'.$value["fechaRegistro"].'</td>
                    <td>'.$tipoUsuario.'</td>';
                    if ($value["estado"] != 0) {
                      echo '<td><button class="btn btn-success btn-xs btnActivarUsuario" idUsuario="' . $value["idUsuario"] . '" estado="0">Activado</button></td>';
                    } else {
                      echo '<td><button class="btn btn-danger btn-xs btnActivarUsuario" idUsuario="' . $value["idUsuario"] . '" estado="1">Desactivado</button></td>';
                    }

              echo '<td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarTercero" data-toggle="modal" data-target="#modalEditarTercero" idUsuario="'.$value["idUsuario"].'" estado="'.$value["estado"].'"><i class="fa fa-pencil"></i></button>';
                    //  if($_SESSION["perfil"] == "Administrador"){
                    //      echo '<button class="btn btn-danger btnEliminarTercero" idUsuario="'.$value["idUsuario"].'"><i class="fa fa-times"></i></button>';
                    //  }
                      echo '</div>  
                    </td>
                  </tr>';
            }
        ?>
   
        </tbody>
       </table>
      </div>
    </div>
  </section>
</div>


<div id="modalAgregarTercero" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar tercero</h4>
        </div>

            <div class="modal-body">
              <div class="box-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                    <select class="form-control input-lg" name="nuevoTipoDoc" id="nuevoTipoDoc" required>
                      <option value="">Seleccionar tipo documento</option>
                      <option value="1">CC </option>
                      <option value="2">NIT</option>
                      <option value="3">TI </option>
                      <option value="4">PA </option>
                    </select>
                  </div>
                </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" id="nuevoDocumentoId" required>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoTercero" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="nuevoGeneroTercero" required>
                  <option value="">Seleccionar genero</option>
                  <option value="1">Masculino  </option>
                  <option value="2">Femenino</option>
                  <option value="3">Indefinido </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="nuevoTipoTercero" required>
                  <option value="">Seleccionar tipo de tercero</option>
                  <option value="1">Cliente  </option>
                  <option value="2">Proveedor</option>
                  <option value="3">Empleado </option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar tercero</button>
        </div>
      </form>

      <?php
        $crearTercero = new ControladorTerceros();
        $crearTercero -> ctrCrearTercero();
      ?>

    </div>
  </div>
</div>


<div id="modalEditarTercero" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar tercero</h4>
        </div>
        
        <div class="modal-body">
          <div class="box-body">
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="editarTipoDoc" required>                  
                  <option value="1">CC </option>
                  <option value="2">NIT</option>
                  <option value="3">TI </option>
                  <option value="4">PA </option>
                </select>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="editarTercero" id="editarTercero" required>
                <input type="hidden" id="idTercero" name="idTercero">
              </div>
            </div>

            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
              </div>
            </div>
            
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
              </div>
            </div>            
            
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>
              </div>
            </div>
            
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="editarGeneroTercero" required>
                  <option value="1">Masculino  </option>
                  <option value="2">Femenino</option>
                  <option value="3">Indefinido </option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="editarTipoTercero" required>
                  <option value="1">Cliente  </option>
                  <option value="2">Proveedor</option>
                  <option value="3">Empleado </option>
                </select>
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
        $editarTercero = new ControladorTerceros();
        $editarTercero -> ctrEditarTercero();
      ?>

    </div>
  </div>
</div>


