<?php
   include("conexion.php");

    $id=$_POST['id'];
    

     if(isset($id)){
    $consulta="delete from grupo where idGrupo=".$id;
	
	$link=connect();
       
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;}

	?>
