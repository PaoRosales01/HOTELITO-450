<?php
 include '../../includes/header.php';
?>
            
    <main class="container p-7">
  <div class="row justify-content-center">

<div align="center">
  <h1 class="tab-titulo ">CONTACTO</h1>
</div>

    
    <div class="table-responsive">
    <a class="fas fa-file-pdf" href="../pdf/pdfcontacto.php" target="_blank"></a>
      <table class="table">
        <thead>
          <tr>
            <th>No. Mensaje</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Mensaje</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM contacto";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['id_msj']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td><?php echo $fila['mensaje']; ?></td>
            <td>
              <a href="eliminar.php?tab=c&id_msj=<?php echo $fila['id_msj']?>" class="btn btn-danger">
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

          
