<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar empleados
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar empleados</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">
          Agregar empleado
        </button>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Nombre de acceso</th>
           <th>Teléfono</th>
           <th>Foto</th>
           <th>Estado</th>
           <th>Último login</th>
           <th>Acciones</th>
         </tr>
        </thead>

        <tbody>

        <?php

$item = null;
$valor = null;

//$empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);
$terceros = ControladorEmpleados::ctrListarEmpleados();

foreach ($terceros as $key => $value) {
    echo '<tr>' .
        '<td>' . ($key + 1) . '</td>' .
        '<td>' . $value['descripcion'] . '</td>' .
        '<td>' . $value['codigoEmpleado'] . '</td>' .
        '<td>' . $value['telefono'] . '</td>';

    if ($value["avatar"] != "") {
        echo '<td><img src="' . $value["avatar"] . '" class="img-thumbnail" width="40px"></td>';
    } else {
        echo '<td><img src="views/img/empleados/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
    }

    //  echo '<td>'.$value["perfil"].'</td>';

    if ($value["estado"] != 0) {
        echo '<td><button class="btn btn-success btn-xs btnActivarEmpleado" idUsuarioSistema="' . $value["idUsuarioSistema"] . '" estado="0">Activado</button></td>';
    } else {
        echo '<td><button class="btn btn-danger btn-xs btnActivarEmpleado" idUsuarioSistema="' . $value["idUsuarioSistema"] . '" estado="1">Desactivado</button></td>';
    }

    echo '<td>' . $value["ultimoIngreso"] . '</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarEmpleado" idUsuarioSistema="'.$value["idUsuarioSistema"].'" estado="'.$value["estado"].'" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>
                    </div>
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

<div id="modalAgregarEmpleado" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar empleado</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
          <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="nuevoTipoDoc" id="nuevoTipoDoc">
                  <option value="">Seleccionar tipo documento</option>
                  <option value="1">CC</option>
                  <option value="2">NIT</option>
                  <option value="3">TI</option>
                  <option value="3">PA</option>
                </select>
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span> 
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" id="nuevoDocumentoId" placeholder="Ingresar documento" >
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoTercero" placeholder="Ingresar nombre" >
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask >
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" >
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" >
              </div>
            </div>
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                <select class="form-control input-lg" name="nuevoGeneroTercero">
                  <option value="">Seleccionar género</option>
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                  <option value="3">Indefinido</option>                
                </select>
              </div>
            </div>
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoEmpleado" placeholder="Ingresar usuario" id="nuevoEmpleado" >
              </div>
            </div>            
             <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" >
              </div>
            </div>          
             <div class="form-group">
              <div class="panel">SUBIR FOTO</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
              <p class="help-block">Peso máximo de la foto 2MB</p>
              <img src="views/img/empleados/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <input type="submit" class="btn btn-primary" value="Guardar empleado">
        </div>

        <?php

$crearEmpleado = new ControladorEmpleados();
$crearEmpleado->ctrCrearEmpleado();

?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarEmpleado" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar empleado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre">
                <input type="hidden" id="idUsuarioSistema" name="idUsuarioSistema">

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="editarFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/empleados/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

$editarEmpleado = new ControladorEmpleados();
$editarEmpleado->ctrEditarEmpleado();

?>

      </form>

    </div>

  </div>

</div>