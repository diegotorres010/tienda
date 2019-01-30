<div class="content-wrapper">
  <section class="content-header">    
    <h1>      
      Administración de permisos    
    </h1>
    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      
      <li class="active">Administración de permisos</li>    
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">          
          Agregar permisos
        </button>
      </div>

      <div class="box-body">        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">         
        <thead>         
         <tr>           
           <th style="width:10px">#</th>
           <th>Nombre de permiso</th>
           <th>Fecha de creación</th>
           <th>Número de usuarios</th>
           <th>Permisos</th>
         </tr> 
        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $permisos = ControladorPermisos::ctrListarPermiso($item, $valor);

          foreach ($permisos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombreTipo"].'</td>

                    <td class="text-uppercase">'.$value["fechaCreacion"].'</td>

                    <td class="text-uppercase">'."numero".'</td>';

            echo '<td>
                    <div class="btn-group">
                      <button class="btn bg-olive btnPermisosEmpleado btnAgregar" idTipo="' . $value["idTipo"] . '" data-toggle="modal" data-target="#modalAgregarPermisos"><i class="fa fa-lock"></i></button>
                      <button class="btn btn-danger btnPermisosEmpleado btnModificar" idTipo="' . $value["idTipo"] . '" data-toggle="modal" data-target="#modalAgregarPermisos"><i class="fa fa-lock"></i></button>
                    </div>
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

<div id="modalAgregarPermisos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar permisos</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">                
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nombreTipo" id="nombreTipo">
                <input type="hidden" id="idTipo" name="idTipo">
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                <input class="form-control input-lg" id="busquedaEmpleado" placeholder="Ingresar documento" required>
              </div>
            </div> -->
            <hr>
            <ul id="listaPermisos" class="form">
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <input type="button" id="PermisosBoton" class="btn btn-primary" value="Guardar permisos">
        </div>
       </form>
    </div>
  </div>
</div>