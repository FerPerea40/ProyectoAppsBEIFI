<?php
   include("conexion.php");
	$id=$_POST['id'];
    
  //$consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT NULL FROM agrupamiento  WHERE usuario.idUsuario = agrupamiento.Usuario_idUsuario )";

  $consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT NULL FROM agrupamiento  WHERE usuario.idUsuario = agrupamiento.Usuario_idUsuario and agrupamiento.Grupo_idGrupo =".$id.")";
   // $consulta="SELECT * FROM usuario WHERE NOT EXISTS (SELECT idUsuario FROM usuario INNER JOIN agrupamiento INNER JOIN grupo ON usuario.idUsuario = agrupamiento.Usuario_idUsuario and grupo.idGrupo = agrupamiento.Grupo_idGrupo where grupo.IdGrupo = )".$id;

    //SELECT * FROM data_base_ct WHERE codct NOT IN (SELECT codigo_ct FROM data_inicio_primera_etapa);
    $link=connect();
    $respuesta = mysqli_query($link, $consulta) or die("Error al ejecutar la consulta");
    
    $rows = array();
    while ($r = mysqli_fetch_assoc($respuesta)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
    mysqli_close($link);
	?>