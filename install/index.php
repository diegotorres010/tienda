<?php
$install = '../models/conexion.php';
if (file_exists($install)) {
    $rutaAnterior = '../index2.php';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL='. $rutaAnterior . '">';
}
?>
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

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../views/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="../views/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="../views/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="../views/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- <script src="../views/js/jquery-steps/jquery.steps.min.js"></script> -->

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

  <!-- bootstrap datepicker -->
  <script src="../views/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

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
                        <dt>Nota!</dt>
                        <dd>El sistema no dejará ingresar a las siguientes pestañas si hace falta algún dato requerido.</dd>
                        <dt class="text-red">Este proceso se realizará una sóla vez si todo se configura de la manera correcta.</dt>
                        <br>
                        <dt>Pasos para la configuración</dt>
                        <dd>A continuación se explicaran los pasos necesarios para la configuración:</dd>
                        <ul>
                            <li>Configuración del archivo <b class="text-red">conexion.php</b> en la pestaña <b class="text-red">"Conexión"</b>, por defecto se recomiendan algunos datos ya cargados en el formulario, recuerde el campo de contraseña de la base de datos puede ir vacío.</li>
                            <li>Ingresar a la pestaña <b class="text-red">"Crear tienda"</b> e ingresar todos los campos (todos los campos son obligatorios). </li>
                            <li>Ingresar a la pestaña <b class="text-red">"Datos del usuario"</b> e ingresar todos los campos (todos los campos son obligatorios). </li>
                            <li>Ingresar a la pestaña <b class="text-red">"Datos del sistema"</b> e ingresar todos los campos (la foto es opcional). </li>
                        </ul>
                    <br>
                    <dt>Al terminar de digitar todos los datos debe dar clic en el botón <b class="text-blue">"Crear Tienda"</b>.</dt>
                    <br>
                    <dd>El sistema validará los datos ingresados, Si se presenta algún tipo de error el sistema se lo notificará.</dd>
                    <dd>Una vez finalizado este proceso, ingresará al inicio de sesión de SITIB.</dd>
                </dl>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <form id="configAdmin" action="crear_conexion.php" method="post" enctype="multipart/form-data">
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
                                    <div class="form-group host">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoHost" placeholder="Host o ip" value="127.0.0.1" data-inputmask="'alias': 'ip'" data-mask required>
                                        </div>
                                    </div>
                                    <div class="form-group namedb">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoDB" placeholder="Nombre de la base de datos" value="tienda" required>
                                        </div>
                                    </div>
                                    <div class="form-group userdb">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoUsuarioDB" placeholder="Usuario de la base de datos" value="root" required>
                                        </div>
                                    </div>
                                    <div class="form-group passdb">
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
                                    <div class="form-group newTienda">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaNombre" placeholder="Nombre de la tienda" required>
                                        </div>
                                    </div>

                                    <div class="form-group newDirecc">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaDireccion" id="nuevaTiendaDireccion" placeholder="Dirección" required>
                                        </div>
                                    </div>

                                    <div class="form-group newTelefo">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaTelefono" id="nuevaTiendaTelefono" placeholder="Teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group newPropie">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaTiendaPropietario" id="nuevaTiendaPropietario" placeholder="Nombre del propietario" required>
                                        </div>
                                    </div>

                                    <div class="form-group newEmail">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control input-lg" name="nuevaTiendaEmail" id="nuevaTiendaEmail" placeholder="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="usuariotab">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group newTipo">
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

                                    <div class="form-group newDocumentoTer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                            <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" >
                                        </div>
                                    </div>

                                    <div class="form-group newTercero">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoTercero" id="nuevoTercero" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-group newTelefonoTer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group newEmailTer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control input-lg" name="nuevoEmail" id="nuevoEmail" placeholder="Ingresar email" required>
                                        </div>
                                    </div>

                                    <div class="form-group newDireccionTer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingresar dirección" required>
                                        </div>
                                    </div>

                                    <div class="form-group newFechaNac">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" id="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                                        </div>
                                    </div>

                                    <div class="form-group newGenero">
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
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="sistematab">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="text" class="form-control input-lg" name="nuevoEmpleado" placeholder="Ingresar usuario" value="admin" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control input-lg" name="repetirPassword" placeholder="Confirmar contraseña" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div id="alertPass" style="display:none;" class="alert alert-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="panel">SUBIR FOTO</div>
                                        <input type="file" class="nuevaFoto" name="nuevaFoto">
                                        <p class="help-block">Peso máximo de la foto 2MB</p>
                                        <img src="../views/img/empleados/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="crearTiendaBoton" class="btn btn-primary">Crear tienda</button>
                                        <!-- <input type="submit" id="crearTiendaBoton" class="btn btn-primary" value="Crear tienda"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="alertError" style="display:none;" class="alert alert-danger">
                    </div>
                    <div class="modal modal-danger fade in" id="modal-danger" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Recuerde</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Debe diligenciar todos los campos en su totalidad y con Información correcta.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline" data-dismiss="modal">Regresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>
<script src="../views/js/login.js"></script>
