<?php
include "conexion.inc.php";
session_start();
$flujo=$_GET["flujo"];
$proceso=$_GET["procesoanterior"];
$procesosiguiente=$_GET["proceso"];
$sql="select * from flujoproceso ";
$sql.="where Flujo='$flujo' and proceso='$proceso'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
$pantalla=$fila['Pantalla'];
$pantalla.=".motor.inc.php";
include $pantalla;
//echo $sql;
if (isset($_GET["Anterior"]))
{
	$sql="select * from flujoproceso ";
	$sql.="where Flujo='$flujo' and procesosiguiente='$proceso'";
	$resultado1=mysqli_query($con, $sql);
	$fila1=mysqli_fetch_array($resultado1);
	print_r ($fila1);
	//$proceso=$fila1["Proceso"];
	$pro=$fila1["Proceso"];
	header("Location: principal.php?flujo=$flujo&proceso=$pro");
	//echo $procesosiguiente;
}
if (isset($_GET["Siguiente"]))
{
	$sql="select * from flujoproceso ";
	$sql.="where Flujo='$flujo' and proceso='$procesosiguiente'";
	$resultado=mysqli_query($con, $sql);
	$fila=mysqli_fetch_array($resultado);
	if($fila['Tipo']!='C'){
		header("Location: principal.php?flujo=$flujo&proceso=$procesosiguiente");
	}
	else{
		$sql="select * from flujoprocesocondicionante ";
		$sql.="where Flujo='$flujo' and proceso='$procesosiguiente'";
		if($procesosiguiente=='P3'){
			$sql="select * from flujoprocesocondicionante where Proceso='P3'";
			$resultado1=mysqli_query($con, $sql);
			$filaa=mysqli_fetch_array($resultado1);
			$k=$filaa["ProcesoSI"];
			$j=$filaa["ProcesoNO"];
			$sql="select * from postulante where id=".$_SESSION["id"];
			$resultado=mysqli_query($con, $sql);
			$fila=mysqli_fetch_array($resultado);
			$x=$fila["requisito1"];
			$y=$fila["requisito2"];
			if($x!=null && $y!=null){
				header("Location: principal.php?flujo=$flujo&proceso=$k");
			}
			else{
				header("Location: principal.php?flujo=$flujo&proceso=$j");
			}
		}
		if($procesosiguiente=='P7'){
			$sql="select * from flujoprocesocondicionante where Proceso='P7'";
			$resultado1=mysqli_query($con, $sql);
			$filaa=mysqli_fetch_array($resultado1);
			$k=$filaa["ProcesoSI"];
			$j=$filaa["ProcesoNO"];
			$sql="select * from documentos where id=".$_SESSION["id"];
			$resultado=mysqli_query($con, $sql);
			$fila=mysqli_fetch_array($resultado);
			$x=$fila["re1"];
			$y=$fila["re2"];
			$z=$fila["re3"];
			if($x!=null && $y!=null && $z!=null){
				header("Location: principal.php?flujo=$flujo&proceso=$k");
			}
			else{
				header("Location: principal.php?flujo=$flujo&proceso=$j");
			}
		}
		
	}

}

	



?>