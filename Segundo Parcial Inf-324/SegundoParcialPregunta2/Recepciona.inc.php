Bandeja de Entrada De Encargado


<?php
include "conexion.inc.php";
$sql = "SELECT * FROM documentos";
$pregunta = mysqli_query($con, $sql);
$results = array();
while ($row = mysqli_fetch_assoc($pregunta)) {
    $results[] = $row;
}
$array_final = array();
foreach ($results as $result) {
    $array_final[] = $result;
}
echo "<style>table, td, tr {border: 1px solid;text-align: center;}table {border-collapse:collapse;}</style>";
echo "<table  border=1 style=width:40%>";
echo "<tr>";
echo "<td>ID Docente</td>";
echo "<td>Requisito 1</td>";
echo "<td>Requisito 2</td>";
echo "<td>Requisito 3</td>";
echo "</tr>";
for ($i = 0; $i < count($array_final); $i++) {

    echo "<tr>";
    echo "<td>";
    print_r($array_final[$i]['id']);
    echo "</td>";
    echo "<td>";
    print_r($array_final[$i]['re1']);
    echo "</td>";
    echo "<td>";
    print_r($array_final[$i]['re2']);
    echo "</td>";
    echo "<td>";
    print_r($array_final[$i]['re3']);
    echo "</td>";

    echo "</tr>";
}
echo "</table>";

?>