<div id="tienda"></div>

<div class="login-box">
  
  <div class="login-box-body">

    <div class="login-logo">
    
    <img src="views/img/plantilla/logo-negro-bloque.png" class="img-responsive" style="padding:30px 100px 0px 100px">

  </div>

    <p class="login-box-msg">Ingresar a SITIB</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Empleado" name="ingEmpleado" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        
        </div>

      </div>

      <?php

        $login = new ControladorEmpleados();
        $login -> ctrIngresoEmpleado();
        
      ?>

    </form>

  </div>

</div>
