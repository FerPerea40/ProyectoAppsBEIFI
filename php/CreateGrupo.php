<?php
    include("conexion.php");
  
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $consulta  = "INSERT INTO `grupo` (`idGrupo`, `nombre`, `descripcion`)";
    $consulta  .= "VALUES (NULL, ";
    $consulta  .= "'".$nombre."',";
    $consulta  .= "'". $descripcion."')";

    $respuesta = array();
    $link=connect();
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;
    echo json_encode($respuesta);
