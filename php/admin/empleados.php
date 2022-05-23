<?php
 include '../../includes/header.php';
?>
            
    <main class="container p-7">
  <div class="row justify-content-center">
    <div class="col-md-4">

    <div align="center">
  <h1 class="tab-titulo ">EMPLEADOS</h1>
</div>

<div align="center">
<a href="#agregaremp" class="btn btn-success" data-toggle="modal" id="agregmodal">
              <i class="fas fa-plus"></i>    &nbsp Agregar Administrador
              </a>
  </div>

  <div id="agregaremp" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

      <!-- ADD TASK FORM -->
      <div class="card card-body text-center">
      <form action="guardar.php" method="POST">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     
      <label class="desc">No. de empleado:</label>
        <div class="form-group">
          <input type="number" name="id" placeholder="N° Empleado" autofocus>
          </div>
          <label class="desc">Nombre:</label>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
          </div>
          <label class="desc">Apellido:</label>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Apellido" autofocus>
          </div>
          <label class="desc">Contraseña:</label>
          <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Contraseña" autofocus>
          </div>
          <label class="desc">Correo Electrónico:</label>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="Correo" autofocus>
          </div>
          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="guardar-empleado" class="btn btn-success" value="Agregar Empleado">
          </div>
          <input type="hidden" name="tab" class="btn btn-success btn-block" value="e">
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="table-responsive">
    <a class="fas fa-file-pdf" href="../pdf/pdfadmin.php" target="_blank"></a>
      <table class="table">
        <thead>
          <tr>
            <th>No. Empleado</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM empleados";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Id_empleado']; ?></td>
            <td><?php echo $fila['Nombre']; ?></td>
            <td><?php echo $fila['Apellido']; ?></td>
            <td><?php echo $fila['Contrasenia']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td>
             <a href="editar_empleado.php?id_emp=<?php echo $fila['Id_empleado']?>" class="btn btn-secondary">
                <i class="fa fa-edit"></i>
              </a>
              <a href="eliminar.php?tab=e&id_emp=<?php echo $fila['Id_empleado']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
      </table>
  </div>
</main>
<?php
 include '../../includes/pie.php';
?>

          
