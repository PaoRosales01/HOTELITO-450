<?php
 include '../../includes/headeremp.php';
?>
            
    <main class="container p-7">
  <div class="row justify-content-center">
  
  <div align="center">
  <h1 class="tab-titulo ">RESERVACIÓN</h1>
</div>

    <div class="table-responsive">
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
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</main>
<?php
 include '../../includes/pie.php';
?>

          
