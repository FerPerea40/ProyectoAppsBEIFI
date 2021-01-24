<?php
   include("conexion.php");
   $link=connect();

    $id=$_POST['id'];
    $consulta="delete from usuario where idUsuario=".$id;
    $registros="SELECT COUNT(*) total FROM agrupamiento WHERE usuario_idUsuario=".$id;

  
   $result1= mysqli_query($link,$registros) or die('No consulta');
    $Totala = mysqli_fetch_assoc($result1);


     if($Totala['total']==0){
	
       
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;
}else{

    $status = "errr";
    mysqli_close($link);
echo $status;die;
}


	?>
