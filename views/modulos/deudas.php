<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administración de deudas
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administración de deudas</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Deudas por pagar</h3>
      </div>

      <div class="box-body">
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Proveedor</th>
           <th>Teléfono</th>
           <th>Número de factura</th>
           <th>Valor deuda</th>
           <th>Valor del crédito</th>
           <th>Fecha de vencimiento</th>
           <th>Acciones</th>
         </tr>
        </thead>

        <tbody>

        <?php

$creditos = ControladorCreditos::ctrListarCredito();

foreach ($creditos as $key => $value) {

    echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["descripcion"] . '</td>

                    <td>' . $value["telefono"] . '</td>

                    <td>' . $value["valorMaximo"] . '</td>
                    <td></td>
                    <td>' . $value["diasPlazo"] . '</td>';

    echo '<td>

                      <div class="btn-group">';

    echo '<button class="btn btn-warning btnEditarCredito" idCredito="' . $value["idCredito"] . '" data-toggle="modal" data-target="#modalEditarCredito"><i class="fa fa-pencil"></i></button>';

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

<div id="modalAgregarCredito" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar créditos</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevoClienteCre" name="nuevoClienteCre" required>

                  <option value="">Seleccionar cliente</option>

                  <?php

                  $clientes = ControladorClientes::ctrSelectCliente();

                  foreach ($clientes as $key => $value) {
                          echo '<option value="' . $value["idUsuario"] . '">' . $value["nombre"] .' ' . $value["numeroDoc"] .'</option>';
                  }

                  ?>

                </select>

              </div>

            </div>

            <div class="form-group row">

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                  <input type="number" class="form-control input-lg" id="nuevoCredito" name="nuevoCredito" step="any" min="0" placeholder="Valor del crédito" required>

                </div>

              </div>

              <div class="col-xs-6">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                  <input type="number" class="form-control input-lg" id="nuevoDiasPlazo" name="nuevoDiasPlazo" step="any" min="0" placeholder="Días máx. plazo" required>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar crédito</button>
        </div>

        <?php
$crearCredito = new ControladorCreditos();
$crearCredito->ctrIngresarCredito();
?>

      </form>
    </div>
  </div>
</div>