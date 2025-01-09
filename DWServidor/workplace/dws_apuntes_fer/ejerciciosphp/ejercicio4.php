<!DOCTYPE html>
<html>
  <head>
    <title>Tabla con codigo php</title>
  </head>
  <body>

     <table>

     <?php 
 
 define("OCHO", 8);
 
 for($i=1;$i<=10;$i++){
  echo OCHO."*".$i."=" .OCHO*$i ;echo "<br>";;

 }
     ?>

<tr><td><?php echo OCHO."*".$i."=" .OCHO*$i ;echo "<br>";;?></td></tr>
  
</table>
  </body>
</html>