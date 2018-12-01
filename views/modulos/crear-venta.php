<?php

// if($_SESSION["perfil"] == "Especial"){

//   echo '<script>

//     window.location = "inicio";

//   </script>';

//   return;

//}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear venta

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear venta</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-5 col-md-5 col-xs-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear factura</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label>Vendedor</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombreEmpleado"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["idUsuarioSistema"]; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>Número factura</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

if (!$ventas) {

    echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';

} else {

    foreach ($ventas as $key => $value) {

    }

    $codigo = $value["codigo"] + 1;

    echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="' . $codigo . '" readonly>';

}

?>

                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                      <option value="">Seleccionar cliente</option>

                    <?php

$item = null;
$valor = null;

$clientes = ControladorClientes::ctrSelectCliente();

foreach ($clientes as $key => $value) {

    echo '<option value="' . $value["idUsuario"] . '">' . $value["nombre"] . '</option>';

}

?>

                    </select>
                    <span class="input-group-addon"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Crear cliente</button></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
                    <input type="text" class="form-control" id="nuevoProducto" placeholder="Seleccionar producto">
                  </div>
                </div>
                
                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->

                <div class="form-group row nuevoProducto">


                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">



                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                  <div class="col-xs-8 pull-right">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td style="width: 50%">

                            <div class="input-group">

                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </td>

                          <td style="width: 50%">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">


                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->

                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="1">Efectivo</option>
                        <option value="2">Crédito</option>
                      </select>

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                </div>

                <br>
                
              </div>
              <!-- /.box-body -->
                

              <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
              </div>
            </form>
          </div>
        </div>

        <!-- <div class="box box-success">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">


                BOTÓN PARA AGREGAR PRODUCTO
                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>


          </div>

          <div class="box-footer">

            

          </div>

        </form>

        <?php

//$guardarVenta = new ControladorVentas();
//$guardarVenta->ctrCrearVenta();

?>

        </div>

      </div> -->

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 col-md-7 col-xs-12">

        <div class="box box-warning">

          <div class="box-header with-border">
              <h3 class="box-title">Productos disponibles</h3>
            </div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaVentas">

               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Código</th>
                  <th>Código de barras</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Precio unitario</th>
                  <th>Acciones</th>
                </tr>

              </thead>

            </table>

          </div>

        </div>


      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar cliente</h4>
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
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cliente</button>
        </div>
      </form>

      <?php
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearClienteVenta();
      ?>

    </div>
  </div>
</div>