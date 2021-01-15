<?php
    include("conexion.php");
    date_default_timezone_set("America/Mexico_City");
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $date = new DateTime();
    $fecha = date("Y-m-d H:i:s");
    $grupo = $_POST['grupo'];
    $consulta  = "INSERT INTO `notificacion` (`idNotificacion`, `titulo`, `descripcion`,`fecha`,`Grupo_idGrupo`)";
    $consulta  .= "VALUES (NULL, ";
    $consulta  .= "'".$titulo."',";
    $consulta  .= "'".$descripcion."',";
    $consulta  .= "'".$fecha."',";
    $consulta  .= "'".$grupo."')";

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