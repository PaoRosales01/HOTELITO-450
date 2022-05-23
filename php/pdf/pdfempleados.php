<?php
include '../conexion.php';
 ob_start(); ?>

 <style>
  .titulos{
    color: white;
  }
 </style>
<h2 style="font-size:3rem;">Lista de Empleados</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#0f2453" class="titulos">
        <th>No. empleado</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
    </tr>
   <?php
          $sql = "SELECT * FROM empleados";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Id_empleado']; ?></td>
            <td><?php echo $fila['Nombre']; ?></td>
            <td><?php echo $fila['Apellido'];?></td>
            <td><?php echo $fila['Correo']; ?></td>
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
$filename = "Empleados_Hotelito450.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
