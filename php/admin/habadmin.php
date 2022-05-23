<?php
 include '../../includes/header.php';
?>
            
    <main class="container p-7">
  <div class="row justify-content-center">
    <div class="col-md-4">

    <div align="center">
  <h1 class="tab-titulo ">HABITACIONES</h1>
</div>

<div align="center">
<a href="#agregarhab" class="btn btn-success" data-toggle="modal" id="agregmodal">
              <i class="fas fa-plus"></i>    &nbsp Agregar Habitación
              </a>
  </div>


<div id="agregarhab" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
      <!-- ADD TASK FORM -->
      <div class="card card-body text-center">
      <form action="guardar.php" method="POST" enctype="multipart/form-data" id="formadmin">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

          <label class="desc">Número de habitación:</label>
          <div class="form-group">
          <input type="number" name="hab"  autofocus required>
          </div>
          <label class="desc">¿Tiene televisión? (1-Si ó 2-No)</label>
          <div class="form-group">
            <input type="number" name="telev" class="form-control"  autofocus required>
          </div>
          <label class="desc">¿Costo por noche?</label>
          <div class="form-group">
            <input type="numer" name="costo" class="form-control"  autofocus required>
          </div>
          <label class="desc">Añade una breve descripción</label>
          <div class="form-group">
            <input type="textarea" name="desc" class="form-control"  autofocus required>
          </div>
          <label class="desc">Imagen de la habitación</label>
          <div class="form-group">
            <input type="file" name="archivo" class="form-control" autofocus required>
          </div>
          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="guardar-hab" class="btn btn-success" value="Agregar Habitación">
          </div>
          <input type="hidden" name="tab" class="btn btn-success btn-block" value="h">
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>
  
    
    <div class="table-responsive">
    <a class="fas fa-file-pdf" href="../pdf/pdfhab.php" target="_blank"></a>
      <table class="table">
        <thead>
          <tr>
            <th>No. Habitación</th>
            <th>¿Televisión?</th>
            <th>Costo</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM habitacion";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Habitacion_No']; ?></td>
            <td><?php echo $fila['Television']; ?></td>
            <td><?php echo $fila['Costo']; ?></td>
            <td><?php echo $fila['Descripcion']; ?></td>
            <td><?php echo $fila['Imagen']; ?></td>
            <td>
             <a href="editar_hab.php?id_hab=<?php echo $fila['Habitacion_No']?>" class="btn btn-secondary">
                <i class="fa fa-edit"></i>
              </a>
              <a href="eliminar.php?tab=h&id_hab=<?php echo $fila['Habitacion_No']?>" class="btn btn-danger">
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

          
