<div class="content-wrapper">
  <section class="content-header">    
    <h1>      
      Bienvedido!      
      <small>Panel de Control</small>    
    </h1>

    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>    
    </ol>

  </section>

  <section class="content">

    <div class="row">
      
    <?php

  //  if($_SESSION["perfil"] =="Administrador"){

      include "inicio/cajas-superiores.php";

   // }

    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-12">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
           include "reportes/grafico-ventas.php";

        //  }

          ?>

        </div>

        <div class="col-lg-6">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
           include "reportes/productos-mas-vendidos.php";

        // }

          ?>

        </div>

         <div class="col-lg-6">

          <?php

        //  if($_SESSION["perfil"] =="Administrador"){
          
           include "inicio/productos-recientes.php";

         //}

          ?>

        </div>

         <div class="col-lg-12">
           
          <?php

        //  if($_SESSION["perfil"] =="Especial" || $_SESSION["perfil"] =="Vendedor"){
        // esto es solo para usuarios sin permisos al dashboard
             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             </div>

             </div>';

        //  }

          ?>

         </div>

     </div>

  </section>
 
</div>
