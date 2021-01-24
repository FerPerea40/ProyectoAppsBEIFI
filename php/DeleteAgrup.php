<?php
   include("conexion.php");

    $id=$_POST['id'];
    $persona=$_POST['persona'];

    
    $consulta="delete from agrupamiento where Grupo_idGrupo=".$id." and Usuario_idUsuario=".$persona;
	
	$link=connect();
       
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;

	?>
