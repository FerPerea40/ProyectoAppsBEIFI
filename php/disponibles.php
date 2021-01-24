<?php
   include("conexion.php");
	$id=$_GET['id'];
    
  //$consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT NULL FROM agrupamiento  WHERE usuario.idUsuario = agrupamiento.Usuario_idUsuario )";

  $consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT NULL FROM agrupamiento  WHERE usuario.idUsuario = agrupamiento.Usuario_idUsuario and agrupamiento.Grupo_idGrupo =".$id.")";
   // $consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT idUsuario FROM usuario INNER JOIN agrupamiento INNER JOIN grupo ON usuario.idUsuario = agrupamiento.Usuario_idUsuario and grupo.idGrupo = agrupamiento.Grupo_idGrupo where grupo.IdGrupo = )".$id;

    //SELECT * FROM data_base_ct WHERE codct NOT IN (SELECT codigo_ct FROM data_inicio_primera_etapa);
    $link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    $tabla = "";
    
    while ($r = mysqli_fetch_assoc($respuesta)) {
      
         $ver = '<a href=\"\" data-toggle=\"modal\" data-placement=\"top\" title=\"Eliminar\" class=\"btn btn-danger\" data-target=\"#modal-eliminaralu\" onclick=\"seleliminarpersona('.$r['idUsuario'].') \">Eliminar<i class=\"fa fa-pencil\"  aria-hidden=\"true\" ></i></a>';
         $ver .= '<a href=\"\" data-toggle=\"modal\" data-placement=\"top\" title=\"Asignar\" class=\"btn btn-warning\" data-target=\"\" onclick=\"asignarpersona('.$r['idUsuario'].') \">Asignar<i class=\"fa fa-pencil\"  aria-hidden=\"true\" ></i></a>';

        
        $rows[] = $r;
        $tabla.='{
            "Nombre":"'.$r['nombrecompleto'].'",
            "Funcion":"'.$r['tipo'].'",
            "Accion":"'.$ver.'"
          },';
    }
    $tabla = substr($tabla,0, strlen($tabla) - 1);

	echo '{"data":['.$tabla.']}';	
    mysqli_close($link);
	?>