<?php
include '../conexion.php';
 ob_start(); ?>

 <style>
  .titulos{
    color: white;
  }
 </style>
<h2 style="font-size:3rem;">Lista de Administradores</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#0f2453" class="titulos">
        <th>No. mensaje</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Mensaje</th>
    </tr>
   <?php
          $sql = "SELECT * FROM contacto";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['id_msj']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['telefono'];?></td>
            <td><?php echo $fila['correo']; ?></td>
            <td><?php echo $fila['mensaje']; ?></td>
          </tr>
          <?php } ?>
</table>
<?php
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Contacto_Hotelito450.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
