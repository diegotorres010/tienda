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

      Crear entrada

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Crear entrada</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->

      <div class="col-lg-12 col-md-12 col-xs-12">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear factura de entrada</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form"> -->
              <div class="box-body">
                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                  <label>Vendedor que elabora</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombreEmpleado"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["idUsuarioSistema"]; ?>">
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                  <label>Número factura del proveedor</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Número de factura" >

                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-xs-12">
                  <label>Proveedor</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <input type="text" class="form-control" id="seleccionarCliente" placeholder="Ingrese NIT o nombre">
                    <span class="input-group-addon"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Crear proveedor</button></span>
                  </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-xs-12">
                <label>Productos</label>
                  <div class="input-group">
                    <div class="input-group-btn">
                    <button id="agregarItm" type="button" class="btn btn-success" >Agregar </button>
                    </div>
                    <!-- /btn-group -->
                    <input type="text" class="form-control" id="nuevoProducto" placeholder="Seleccionar producto">
                  </div>
                </div>
                
                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->

                <div class="col-lg-12 col-md-12 col-xs-12 box-body" style="overflow: auto;">

                  <table class="table table-bordered tablaProdVentas">

                    <thead>

                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Quitar</th>
                        <th>Código de barras</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Precio unitario</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </tr>

                    </thead>

                    <tbody id="detalleFactura">
                      <!-- <tr>
                        <td>1</td>
                        <td>701201515</td>
                        <td>prueba</td>
                        <td>60</td>
                        <td>60.000</td>
                        <td> 
                          <input type="number">
                        </td>
                        <td>600.000</td>
                      </tr> -->
                    </tbody>

                  </table>

                </div>

                <div class="form-group row nuevoProducto">


                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">



                <hr>

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                  <div class="col-xs-9 pull-right">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Subtotal</th>
                          <th>Impuesto</th>
                          <th>Total</th>
                        </tr>

                      </thead>

                      <tbody>

                        <tr>

                          <td>

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoSubtotalVenta" name="nuevoSubtotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="subtotalVenta" id="subtotalVenta">


                            </div>

                          </td>

                          <td>

                            <div class="input-group">

                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" readonly required>

                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                            </div>

                          </td>

                          <td>

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

      <!-- <div class="col-lg-4 col-md-4 col-xs-12">

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


      </div> -->

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
      <!-- </form> -->

      <?php
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearClienteVenta();
      ?>

    </div>
  </div>
</div>