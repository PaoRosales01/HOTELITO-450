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
        <th>No. Administrador</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>
   <?php
          $sql = "SELECT * FROM administrador";
          $resultado = mysqli_query($conexion, $sql);    

          while($fila = mysqli_fetch_assoc($resultado)) { ?>
          <tr>
            <td><?php echo $fila['Id_admin']; ?></td>
            <td><?php echo $fila['Correo']; ?></td>
            <td><?php echo $fila['nombre'];?></td>
            <td><?php echo $fila['apellido']; ?></td>
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
$filename = "Admin_Hotelito450.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
