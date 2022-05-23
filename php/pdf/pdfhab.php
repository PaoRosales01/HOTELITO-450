<?php
include '../conexion.php';
 ob_start(); ?>

 <style>
  .titulos{
    color: white;
  }
 </style>
<h2 style="font-size:3rem;">Lista de Habitaciones</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#0f2453" class="titulos">
        <th>Tipo de habitación</th>
        <th>¿Televisión?</th>
        <th>Costo</th>
        <th>Descripción</th>
        <th>Imagen</th>
    </tr>
   <?php
          $sql = "SELECT * FROM habitacion";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Habitacion_No']; ?></td>
            <td><?php echo $fila['Television']; ?></td>
            <td><?php echo $fila['Costo'];?></td>
            <td><?php echo $fila['Descripcion']; ?></td>
            <td><?php echo $fila['Imagen']; ?></td>
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
$filename = "Habitaciones_Hotelito450.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
