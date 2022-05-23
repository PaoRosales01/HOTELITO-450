<?php
 include '../../includes/header.php';
?>
            
            <main class="container p-7">
  <div class="row justify-content-center">
    <div class="col-md-4">

<div align="center">
  <h1 class="tab-titulo ">USUARIOS</h1>
</div>

<div align="center">
<a href="#agregaruser" class="btn btn-success" data-toggle="modal" id="agregmodal">
              <i class="fas fa-plus"></i>    &nbsp Agregar Usuario
              </a>
  </div>


<div id="agregaruser" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
      <!-- ADD TASK FORM -->
      <div class="card card-body text-center">
        <form action="guardar.php" method="POST">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <label class="desc">Nombre de usuario:</label>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" autofocus required>
          </div>
          <label class="desc">Apellido:</label>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" autofocus required>
          </div>
          <label class="desc">Teléfono:</label>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" autofocus required>
          </div>
          <label class="desc">Fecha de nacimiento:</label>
          <div class="form-group">
            <input type="date" name="fecha_nac" class="form-control" autofocus required> 
          </div>
          <label class="desc">Correo electrónico:</label>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" autofocus required>
          </div>
          <label class="desc">Contraseña:</label>
          <div class="form-group">
            <input type="password" data-toggle="password" name="contraseña" class="form-control" autofocus required>
          </div>
          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="guardar-user" class="btn btn-success" value="Agregar Usuario">
          <input type="hidden" name="tab" class="btn btn-success" value="u">
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="table-responsive">
    <a class="fas fa-file-pdf" href="../pdf/pdfusuarios.php" target="_blank"></a>
      <table class="table">
        <thead>
          <tr>
            <th>No. Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Fecha de nacimiento</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM usuarios";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = (mysqli_fetch_assoc($resultado))) { ?>
          <tr>
            <td><?php echo $fila['id_usuario']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['apellido']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['fecha_nac']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td><?php echo $fila['contrasenia']; ?></td>
            <td>
              <a href="editarusuario.php?id_usuario=<?php echo $fila['id_usuario']?>" class="btn btn-secondary">
                <i class="fa fa-edit"></i>
              </a>
              <a href="eliminar.php?tab=u&id_usuario=<?php echo $fila['id_usuario']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php
 include '../../includes/pie.php';
?>

          
