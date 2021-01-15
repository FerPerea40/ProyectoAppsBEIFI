<?php
   include("conexion.php");

    $id=$_POST['id'];
    $persona=$_POST['persona'];

     if(isset($id)){
    $consulta="delete from agrupamiento where idAgrupamiento=".$id."and Usuario_idUsuario=".$persona;
	
	$link=connect();
       
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;}

	?>
