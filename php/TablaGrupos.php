<?php
   include("conexion.php");
	
	$consulta="SELECT * from grupo";
	$link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    
    $tabla = "";
    
    while ($r = mysqli_fetch_assoc($respuesta)) {
        /*$ver =  " <div class='form-group text-center'>
        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-editar' value='".$r['idGrupo']."' onclick='selUpdateGrupo(".$r['idGrupo'].")'' '>
         Editar</button>";
        $ver2="<button id='btn' type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal-eliminar'  value='".$r['idGrupo']."' onclick='fnselect(".$r['idGrupo'].")'' '>
        Eliminar</button>";
        $ver3="<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#modal-asignar' value='".$r['idGrupo']."' onclick='selAsigGrupo(".$r['idGrupo'].")'' '>
         Asignar</button></div>" ;*/
         $ver = '<a href=\"\" data-toggle=\"modal\" data-placement=\"top\" title=\"Editar\" class=\"btn btn-primary\" data-target=\"#modal-editar\" onclick=\"selUpdateGrupo('.$r['idGrupo'].') \"> Editar<i class=\"fa fa-pencil\"  aria-hidden=\"true\" ></i></a>';
         $ver .= '<a href=\"\" data-toggle=\"modal\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\" data-target=\"#modal-eliminar\" onclick=\"fnselect('.$r['idGrupo'].') \">Eliminar<i class=\"fa fa-pencil\"  aria-hidden=\"true\" ></i></a>';
         $ver .= '<a href=\"\" data-toggle=\"modal\" data-placement=\"top\" title=\"Asignar\" class=\"btn btn-warning\" data-target=\"#modal-asignar\" onclick=\"selAsigGrupo('.$r['idGrupo'].') \">Asignar<i class=\"fa fa-pencil\"  aria-hidden=\"true\" ></i></a>';

        
        $rows[] = $r;
        $tabla.='{
            "Nombre":"'.$r['nombre'].'",
            "Descripcion":"'.$r['descripcion'].'",
            "Accion":"'.$ver.'"
          },';
    }
    $tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
    mysqli_close($link);

	?>