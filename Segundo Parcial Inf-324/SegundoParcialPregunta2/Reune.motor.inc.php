<?php
session_start();
$k=$_SESSION["id"];
$sql="select * from postulante where ci=".$_SESSION["id"];
$resultado=mysqli_query($con, $sql);
$var1='';$var2='';$var3='';
if($_GET["CertificadoNac"])
	$var1='SI';
else
	$var1=null;
if($_GET["CertificadoAnt"])
	$var2='SI';
else
	$var2=null;
if($_GET["ProgGestion"])
	$var3='SI';
else
	$var3=null;




	$sql="INSERT INTO `documentos`(`iddocs`, `id`, `re1`, `re2`, `re3`) VALUES ('','$k','$var1','$var2','$var3')";
    $resultado=mysqli_query($con, $sql);

?>
