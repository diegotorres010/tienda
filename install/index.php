<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SITIB</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="../views/img/plantilla/icono-negro.png">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../views/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../views/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="../views/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../views/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../views/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="../views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../views//plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../views/plugins/iCheck/all.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="../views/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="../views/bower_components/morris.js/morris.css"> 
  
  <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  font-family: Raleway;
  padding: 10px;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>

<!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="../views/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../views/js/jquery-steps/jquery.steps.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="../views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="../views/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="../views/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="../views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="../views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="../views/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="../views/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="../views/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="../views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../views/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="../views/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- date-range-picker -->
  <script src="../views/bower_components/moment/min/moment.min.js"></script>
  <script src="../views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="../views/bower_components/raphael/raphael.min.js"></script>
  <script src="../views/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="../views/bower_components/Chart.js/Chart.js"></script>
  
</head>

<body class="hold-transition skin-blue sidebar-mini" style="background: #e0e0e0;">

<section class="content">
    <div class="row">
        <div class="col-mx-12 col-md-12 col-lg-12">
            <div class="callout callout-info">
                <h2 align="center">Bienvenido a la configuración de SITIB</h2>
                <p>Por favor siga todas las instrucciones que se explican a continuación.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">Información</h3>
                </div>
                <div class="box-body">
                    <dl>
                        <dt>Pasos para la configuración</dt>
                        <dd>A continuación se explicaran los pasos necesarios para la configuración:</dd>
                        <ul>
                            <li>Configuración del archivo <b class="text-red">conexion.php</b> en la pestaña <b class="text-red">"Conexión", el campo de contraseña de la base de datos puede ir vacío.</b></li>
                            <li>Ingresar a la pestaña <b class="text-red">"Crear tienda"</b> e ingresar todos los campos (todos los campos son obligatorios) </li>
                            <li>Ingresar a la pestaña <b class="text-red">"Datos del usuario"</b> e ingresar todos los campos (todos los campos son obligatorios) </li>
                            <li>Ingresar a la pestaña <b class="text-red">"Datos del sistema"</b> e ingresar todos los campos (todos los campos son obligatorios) </li>
                        </ul>        
                    <dt>Al finalizar de llenar en totalidad los datos debe dar en el boton <b class="text-blue">"Crear Tienda"</b>.</dt>
                    <dd>El sistema validará los datos ingresados.</dd>
                    <dd>Una vez finalizado este proceso, ingresará al menú principal de SITIB.</dd>
                    <br>
                    <dt class="text-red">Nota!</dt>
                    <dd>El sistema no dejará ingresar a las siguientes pestañas si hace falta algún dato en una de ellas.</dd>
                </dl>
                </div>
            </div>
        </div>
<!--
<div class="col-md-6">
<form id="regForm" action="/action_page.php">
  <h1>Registro:</h1>
  <div class="tab">Datos para conexión:
  <div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoHost" placeholder="Host o ip" oninput="this.className = ''" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoBD" placeholder="Nombre de la base de datos" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoUsuarioBD" placeholder="Usuario de la base de datos" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control input-lg" name="nuevaPasswordDB" placeholder="Contraseña de la base de datos" >
            </div>
        </div>
    </div>
</div>
</div>
  <div class="tab">Crear tienda:
  <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaNombre" placeholder="Nombre de la tienda" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaDireccion" placeholder="Dirección" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaPropietario" placeholder="Nombre del propietario" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control input-lg" name="nuevaTiendaEmail" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
  </div>
  <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div>
  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
      <button type="submit" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
    </div>
  </div>
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
</div>
-->

        <div class="col-md-6">
            <form role="form" method="post">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#conexiontab" data-toggle="tab">Conexión</a></li>
                        <li><a id="tabTienda" data-toggle="tab">Crear tienda</a></li>
                        <li><a id="tabUsuario">Datos del usuario</a></li>
                        <li><a id="tabSistema" data-toggle="tab">Datos del sistema</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="active tab-pane" id="conexiontab">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoHost" placeholder="Host o ip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoBD" placeholder="Nombre de la base de datos" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoUsuarioBD" placeholder="Usuario de la base de datos" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control input-lg" name="nuevaPasswordDB" placeholder="Contraseña de la base de datos" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tiendatab">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaNombre" placeholder="Nombre de la tienda" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaDireccion" placeholder="Dirección" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" class="form-control input-lg" name="nuevaTiendaTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaPropietario" placeholder="Nombre del propietario" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control input-lg" name="nuevaTiendaEmail" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="usuariotab">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                            <select class="form-control input-lg" name="nuevoTipoDoc">
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
                                            <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" >
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
                                            <input type="text" class="form-control pull-right" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                            <select class="form-control input-lg" name="nuevoGeneroTercero">
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
                                            <select class="form-control input-lg" name="nuevoTipoTercero">
                                                <option value="">Seleccionar tipo de tercero</option>
                                                <option value="1">Cliente  </option>
                                                <option value="2">Proveedor</option>
                                                <option value="3">Empleado </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="sistematab">
                            <div class="modal-body">
                                <div class="box-body">
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
                                            <img src="../views/img/empleados/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Crear tienda</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="alertError" style="display:none;" class="alert alert-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>
<script src="../views/js/login.js"></script>

