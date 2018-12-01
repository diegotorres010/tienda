<div class="content-wrapper">
  <section class="content-header">    
    <h1>      
      Administración de categorías    
    </h1>
    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      
      <li class="active">Administración de categorías</li>    
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">          
          Agregar categoría
        </button>
      </div>

      <div class="box-body">        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         
        <thead>         
         <tr>           
           <th style="width:10px">#</th>
           <th>Categoria</th>
           <th>Estado</th>
           <th>Editar</th>
         </tr> 
        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorCategorias::ctrListarCategoria($item, $valor);

          foreach ($categorias as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["descripcion"].'</td>';

                    if ($value["estado"] != 0) {
                      echo '<td><button class="btn btn-success btn-xs btnActivarCategoria" idCategoria="' . $value["idCategoria"] . '" estado="0">Activado</button></td>';
                    } else {
                      echo '<td><button class="btn btn-danger btn-xs btnActivarCategoria" idCategoria="' . $value["idCategoria"] . '" estado="1">Desactivado</button></td>';
                    }

            echo '<td>

                      <div class="btn-group">';

                      //  if ($value["estado"] != 0) {
                          echo '<button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["idCategoria"].'" estado="'.$value["estado"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>';
                      //  } else {
                      //    echo '<button class="btn btn-warning disabled"><i class="fa fa-pencil"></i></button>';
                      //  }

                      //  if($_SESSION["perfil"] == "Administrador"){

                      //    echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["idCategoria"].'"descripcion="'.$value["descripcion"].'"><i class="fa fa-times"></i></button>';

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

<div id="modalAgregarCategoria" class="modal fade" role="dialog">  
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar categoría</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoría" id="nuevaCategoria" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

        <?php
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrIngresarCategoria();
        ?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

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

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>