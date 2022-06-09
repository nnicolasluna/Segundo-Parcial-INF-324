<?php
session_start();
echo "Hola COD: ".$_SESSION["id"]; 
echo "<br>";

$sql="select * from postulante where id=".$_SESSION["id"];
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$x=$fila["requisito1"];
$y=$fila["requisito2"];

$sql="select * from flujoprocesocondicionante where Proceso='P3'";
$resultado1=mysqli_query($con, $sql);
$fila1=mysqli_fetch_array($resultado);
$k=$fila1["ProcesoSI"];
$j=$fila1["ProcesoNO"];

if($x!=null){
    if($y!=null)
    {
        header("Location: principal.php?flujo='F1'&proceso=$k");
    }
    else{
        header("Location: principal.php?flujo='F1'&proceso=$j");
    }
}
else{
    header("Location: principal.php?flujo='F1'&proceso=$j");
}

?>