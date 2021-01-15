<?php
   include("conexion.php");
	
    $consulta="SELECT * FROM notificacion INNER JOIN grupo ON notificacion.Grupo_idGrupo = grupo.idGrupo";
	$link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    
    $rows = array();
    while ($r = mysqli_fetch_assoc($respuesta)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($link);
	?>