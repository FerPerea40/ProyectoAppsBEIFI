<?php
   include("conexion.php");
   $id=$_POST['id'];
   $nombre=$_POST['nombre'];
   $descripcion=$_POST['desc'];

    $consulta="UPDATE grupo SET nombre='$nombre', descripcion='$descripcion' WHERE idGrupo='$id'"; 
	    
    $link=connect();
       
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;

	?>