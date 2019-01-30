<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administración de impuestos
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administración de impuestos</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarImpuesto">
          Agregar impuesto
        </button>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Descripción</th>
           <th>Porcentaje de impuesto</th>
           <th>Estado</th>
           <th>Editar</th>
         </tr>
        </thead>

        <tbody>

        <?php
$item = null;
$valor = null;

$impuestos = ControladorImpuestos::ctrListarImpuesto($item, $valor);

foreach ($impuestos as $key => $value) {

    echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["descripcion"] . '</td>

                    <td>' . $value["porcentaje"] . '%</td>';

    if ($value["estado"] != 0) {
        echo '<td><button class="btn btn-success btn-xs btnActivarIva" idIva="' . $value["idIva"] . '" estado="0">Activado</button></td>';
    } else {
        echo '<td><button class="btn btn-danger btn-xs btnActivarIva" idIva="' . $value["idIva"] . '" estado="1">Desactivado</button></td>';
    }

    echo '<td>

                      <div class="btn-group">';

    // if ($value["estado"] != 0) {
    echo '<button class="btn btn-warning btnEditarImpuesto" idIva="' . $value["idIva"] . '" estado="' . $value["estado"] . '" data-toggle="modal" data-target="#modalEditarImpuesto"><i class="fa fa-pencil"></i></button>';
    // } else {
    // echo '<button class="btn btn-warning disabled"><i class="fa fa-pencil"></i></button>';
    // }

    //  if($_SESSION["perfil"] == "Administrador"){

    //    echo '<button class="btn btn-danger btnEliminarImpuesto" idIva="'.$value["idIva"].'"descripcion="'.$value["descripcion"].'"porcentaje="'.$value["porcentaje"].'"><i class="fa fa-times"></i></button>';

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

<div id="modalAgregarImpuesto" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar impuesto</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoImpuesto" placeholder="Ingresar descripción del impuesto" id="nuevoImpuesto" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-xs-12 col-md-6 col-lg-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                  <input type="number" class="form-control input-lg nuevoPorcentaje" name="nuevoPorcentaje" id="nuevoPorcentaje" min="0" max="100" value="19" required>
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar impuesto</button>
        </div>

        <?php
$crearImpuesto = new ControladorImpuestos();
$crearImpuesto->ctrCrearImpuesto();
?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR IMPUESTO
======================================-->

<div id="modalEditarImpuesto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar impuesto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <input type="text" class="form-control input-lg" name="editarImpuesto" id="editarImpuesto" required>
                <input type="hidden"  name="idIva" id="idIva" required>
              </div>
            </div>
            <div class="form-group row">
            <div class="col-xs-12 col-md-6 col-lg-6">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                <input type="number" class="form-control input-lg editarPorcentaje" name="editarPorcentaje" id="editarPorcentaje" min="0" required>
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
              </div>
            </div>
            </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

$editarImpuesto = new ControladorImpuestos();
$editarImpuesto->ctrEditarImpuesto();

?>

      </form>

    </div>

  </div>

</div>


