<?php
   include("conexion.php");
	$id=$_POST['id'];
    $consulta="SELECT * FROM usuario INNER JOIN agrupamiento INNER JOIN grupo ON usuario.idUsuario = agrupamiento.Usuario_idUsuario and grupo.idGrupo = agrupamiento.Grupo_idGrupo where grupo.IdGrupo = ".$id;
	$link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    
    $rows = array();
    while ($r = mysqli_fetch_assoc($respuesta)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($link);
	?>