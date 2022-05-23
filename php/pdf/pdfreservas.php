<?php
include '../conexion.php';
 ob_start(); ?>

 <style>
  .titulos{
    color: white;
  }
 </style>
<h2 style="font-size:3rem;">Lista de Reservaciones</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#0f2453" class="titulos">
        <th>No. Reservación</th>
        <th>Hr_Entrada</th>
        <th>Fecha_Entrada</th>
        <th>Fecha_Salida</th>
        <th>Estado</th>
        <th>Tipo de Habitación</th>
        <th>Usuario</th>
    </tr>
   <?php
          $sql = "SELECT * FROM reservacion";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Id_Reservacion']; ?></td>
            <td><?php echo $fila['Hr_Entrada']; ?></td>
            <td><?php echo $fila['Fecha_Entrada'];?></td>
            <td><?php echo $fila['Fecha_Salida']; ?></td>
            <td><?php echo $fila['Estado']; ?></td>
            <td><?php echo $fila['No_habitacion'];?></td>
            <td><?php echo $fila['Usuario']; ?></td>
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
$filename = "Reservas_Hotelito450.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
