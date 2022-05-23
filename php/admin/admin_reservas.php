<?php
 include '../../includes/header.php';
?>
            
    <main class="container p-7">
  <div class="row justify-content-center">
    <div class="col-md-4">

    <div align="center">
  <h1 class="tab-titulo ">RESERVACIONES</h1>
</div>

<div align="center">
<a href="#agregarreserva" class="btn btn-success" data-toggle="modal" id="agregmodal">
      <i class="fas fa-plus"></i>    &nbsp Agregar Reservación
      </a>
</div>
  

    <div id="agregarreserva" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
      <!-- ADD TASK FORM -->
      <div class="card card-body text-center">
      <form action="guardar.php" method="POST">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <label class="desc">Hora de entrada:</label>
      <div class="form-group">
          <input id="timepicker" width="276" name="hrent" autofocus readonly required>
            <script>
                $('#timepicker').timepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
          </div>
          <label class="desc">Fecha de entrada:</label>
          <div class="form-group">
            <input type="date" name="fecha_entrada" class="form-control" autofocus required>
          </div>
          <label class="desc">Fecha de salida:</label>
          <div class="form-group">
            <input type="date" name="fecha_salida" class="form-control" autofocus required>
          </div>
          <label class="desc">Estado de la reservación:</label>
          <div class="form-group">
            <input type="text" name="estado" class="form-control" autofocus required>
          </div>
          <label class="desc">Tipo de Habitación: (1-2-3)</label>
          <div class="form-group">
            <input type="number" name="habitacion" class="form-control" min="1" max="3" autofocus required>
          </div>
          <label class="desc">No. de usuario</label>
          <div class="form-group">
          <input type="number" name="usuario" class="form-control" placeholder="Número de usuario" autofocus required> 
          </div>
          <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancelar">
          <input type="reset" name="borrar" class="btn btn-danger" value="Borrar">
          <input type="submit" name="guardar-reserva" class="btn btn-success" value="Agregar Reserva">
          <input type="hidden" name="tab" class="btn btn-success" value="r">
        </form>
      </div>
    </div>
    </div>
    </div>
    </div>

    
    <div class="table-responsive">
    <a class="fas fa-file-pdf" href="../pdf/pdfreservas.php" target="_blank"></a>
      <table class="table">
        <thead>
          <tr>
            <th>No. Reservación</th>
            <th>Hr_Entrada</th>
            <th>Fecha_Entrada</th>
            <th>Fecha_Salida</th>
            <th>Estado</th>
            <th>No_habitacion</th>
            <th>Usuario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM reservacion";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Id_Reservacion']; ?></td>
            <td><?php echo $fila['Hr_Entrada']; ?></td>
            <td><?php echo $fila['Fecha_Entrada']; ?></td>
            <td><?php echo $fila['Fecha_Salida']; ?></td>
            <td><?php echo $fila['Estado']; ?></td>
            <td><?php echo $fila['No_habitacion']; ?></td>
            <td><?php echo $fila['Usuario']; ?></td>
            <td>
             <a href="editar_reserva.php?id_reserva=<?php echo $fila['Id_Reservacion']?>" class="btn btn-secondary">
                <i class="fa fa-edit"></i>
              </a>
              <a href="eliminar.php?tab=r&id_reserva=<?php echo $fila['Id_Reservacion']?>" class="btn btn-danger">
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

          
