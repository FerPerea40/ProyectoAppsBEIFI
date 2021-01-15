<?php
   include("conexion.php");
   $id=$_POST['id'];
	
    $consulta='SELECT * from grupo where idGrupo like '.$id;
    
	$link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    mysqli_close($link);
    
    $rows = array();
    while ($r = mysqli_fetch_assoc($respuesta)) {
        $rows[] = $r;
    }
    echo json_encode($rows);

	?>