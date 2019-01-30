<style>
  #listaPermisos,.sub-privilegio{list-style: none;}
 </style>
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
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPermisos">
          Agregar permisos
        </button> -->
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
                      <button class="btn btn-warning btnEditarEmpleado" idUsuarioSistema="' . $value["idUsuarioSistema"] . '" estado="' . $value["estado"] . '" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>'
                    //  <button class="btn bg-olive btnPermisosEmpleado btnAgregar" idUsuarioSistema="' . $value["idUsuarioSistema"] . '" estado="' . $value["estado"] . '" data-toggle="modal" data-target="#modalAgregarPermisos"><i class="fa fa-lock"></i></button>
                    //  <button class="btn btn-danger btnPermisosEmpleado btnModificar" idUsuarioSistema="' . $value["idUsuarioSistema"] . '" estado="' . $value["estado"] . '" data-toggle="modal" data-target="#modalAgregarPermisos"><i class="fa fa-lock"></i></button>
                    .'</div>
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

<div id="modalAgregarPermisos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar permisos</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">                
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nombreEmpleadoP" id="nombreEmpleadoP" readonly>
                <input type="hidden" id="idUsuarioP" name="idUsuarioP">
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                <input class="form-control input-lg" id="busquedaEmpleado" placeholder="Ingresar documento" required>
              </div>
            </div> -->
            <hr>
            <ul id="listaPermisos" class="form">
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <input type="button" id="PermisosBoton" class="btn btn-primary" value="Guardar permisos">
        </div>
       </form>
    </div>
  </div>
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
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control select2" style="width: 100% !important;" id="nuevoTerEmpleado" name="nuevoTerEmpleado" required>
                  <option value="">Seleccionar empleado</option>
                  <?php

                  $item = "tipoUsuario";
                  $valor = null;

                  $empleados = ControladorEmpleados::ctrListarEmpTerceros($item, $valor);

                  foreach ($empleados as $key => $value) {
                    if ($value["estado"] != 0) {
                      echo '<option value="'.$value["idUsuario"].'">'.$value["descripcion"].'</option>';
                    }
                  }

                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">                
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span> 
                <select class="form-control select2" style="width: 100% !important;" id="nuevoTipoP" name="nuevoTipoP" required>
                  <option value="">Tipo de acceso</option>
                  <?php

                  $item = null;
                  $valor = null;

                  $permisos = ControladorPermisos::ctrMostrarTipos($item, $valor);

                  foreach ($permisos as $key => $value) {
                      echo '<option value="'.$value["idTipo"].'">'.$value["nombreTipo"].'</option>';
                  }

                  ?>
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

            <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span> 

                  <select class="form-control select2" style="width: 100% !important;" name="editarTipo" id="editarTipo" required>

                    <?php

                    $item = null;
                    $valor = null;

                    $permisos = ControladorPermisos::ctrMostrarTipos($item, $valor);

                    foreach ($permisos as $key => $value) {
                      echo '<option value="'.$value["idTipo"].'">'.$value["nombreTipo"].'</option>';
                    }

                    ?>
    
                  </select>

                </div>

              </div>

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