<!DOCTYPE html>
<html>
  <head>
    <title>Tabla con codigo php</title>
  </head>
  <body>

     <table>

     <?php 
    $nombre="Fernando";
    $direccion="paso del puente 14";
    $email="holabuenasmail.com";
     ?>

        <tr><td><?php echo $nombre ;echo "<br>";?></td></tr>
        <tr><td><?php echo $direccion ;echo "<br>"?></td></tr>
        <tr><td><?php echo $email ;echo "<br>"?></td></tr>
</table>
  </body>
</html>