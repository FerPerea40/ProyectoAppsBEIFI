<?php
   include("conexion.php");
     $link=connect();
	
	$consulta="SELECT * from 'grupo' ";
	$todos= mysqli_query($link,$consulta) or die('No consulta');

    $respuesta = array();
	while($row = mysqli_fetch_array($todos,MYSQLI_ASSOC)){
	$respuesta['grupo'] = $row;
    echo "alert('".$row['nombres']." - ".$row['departamento']." - ".$row['sueldo']."')";
	   	} 
		echo json_encode($respuesta);
        echo $respuesta;die;

	?>