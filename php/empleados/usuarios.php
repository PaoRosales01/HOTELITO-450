<?php
 include '../../includes/headeremp.php';
?>
            
            <main class="container p-7">
  <div class="row justify-content-center">

  <div align="center">
  <h1 class="tab-titulo ">USUARIOS</h1>
</div>


    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No. Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Fecha de nacimiento</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM usuarios";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['id_usuario']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['apellido']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['fecha_nac']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</main>
<?php
 include '../../includes/pie.php';
?>

          
