<?php
   include("conexion.php");


   
   $link=connect();

    $id=$_POST['id'];
    $consulta="delete from grupo where idGrupo=".$id;
    $registros="SELECT COUNT(*) totalregistros FROM agrupamiento WHERE grupo_idGrupo=".$id;
   $registros2=  "SELECT COUNT(*) totalNotificaciones FROM `notificacion` WHERE grupo_idGrupo =".$id;

  
   $result1= mysqli_query($link,$registros) or die('No consulta');
    $Totala = mysqli_fetch_assoc($result1);

    $result2= mysqli_query($link,$registros2) or die('No consulta');
 $Totalb = mysqli_fetch_assoc($result2);
 $suma = $Totala['totalregistros']+$Totalb['totalNotificaciones'];

   if($suma==0){
  
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
