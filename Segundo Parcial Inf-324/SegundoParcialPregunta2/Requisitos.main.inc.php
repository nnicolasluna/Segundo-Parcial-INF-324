<?php
session_start();
echo "Hola COD: ".$_SESSION["id"]; 
echo "<br>";

$sql="select * from postulante where id=".$_SESSION["id"];
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$nombrecompleto=$fila["nombre"];
$re1=$fila["requisito1"];
$re2=$fila["requisito2"];
?>