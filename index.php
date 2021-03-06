<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SITIB</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="views/img/plantilla/icono-negro.png">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="views//plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="views/plugins/iCheck/all.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="views/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="views/bower_components/morris.js/morris.css"> 

<!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="views/js/jquery-steps/jquery.steps.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="views/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="views/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="views/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="views/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- date-range-picker -->
  <script src="views/bower_components/moment/min/moment.min.js"></script>
  <script src="views/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="views/bower_components/raphael/raphael.min.js"></script>
  <script src="views/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="views/bower_components/Chart.js/Chart.js"></script>
  
</head>

<body style="background: #e0e0e0;">

<?php
$install = 'models/conexion.php';
if (!file_exists($install)) {
  echo '
      <div class="modal modal-success fade in" id="modal-danger" style="display: block; padding-right: 17px;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span></button>
							<h2 class="modal-title">Bienvenido a la configuración de SITIB</h2>
						</div>
						<div class="modal-body">
							<h4>Debes realizar la instalación! <br> <br> Espere un momento mientras carga el menú principal para la configuración del sistema.</h4>
						</div>
						<div class="progress progress-sm active">
              <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" id="progreso" style="">
              	<span class="sr-only">20% Complete</span>
              </div>
            </div>
					</div>
				</div>
			</div>';
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="8;URL=install">';
	
}else{
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index2.php">';
}
?>

</body>
</html>
<script>
	$(function () {
		var porcentaje = 0;
		setInterval(function () {
			$('#progreso').css('width', porcentaje + '%');
			porcentaje++;
		}, 73)
	})
</script>