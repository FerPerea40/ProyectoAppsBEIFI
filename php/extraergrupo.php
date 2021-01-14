<?php
include ("conexion.php");
$sql = "SELECT * FROM grupo";
$result = $mysqli->query($sql);
while($data = msqli_fetch_array($result)){
    $grupo[] = $array = array(
        'idGrupo' => $data['idGrupo'],
        'nombre' => $data['nombre'] );
}
echo json_encode($grupo);
