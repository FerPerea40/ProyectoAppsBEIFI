<?php
   include("conexion.php");
	
    $consulta="SELECT * FROM notificacion INNER JOIN grupo ON notificacion.Grupo_idGrupo = grupo.idGrupo";
	$link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    $tabla = "";
    
    while ($r = mysqli_fetch_assoc($respuesta)) {
        $ver = "<div class='form-group row justify-content-center'>
        <button type='button' value='".$r['idNotificacion']."' id='botoncin' class='btn btn-primary' data-toggle='modal' data-target='#modal-default2' onclick='leerNotificacion(".$r['idNotificacion'].")''>
         Ver </button></div></td></tr>";
        $rows[] = $r;
        $tabla.='{
            "Asunto":"'.$r['titulo'].'",
            "Grupo":"'.$r['nombre'].'",
            "Acción":"'.$ver.'"
          },';
    }
    $tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
    mysqli_close($link);
	?>