<?php
    include("conexion.php");
    include("CURL.php");



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
     //Esta es lal funcion para la funcion de CURL, crea la id del mensaje pro marca error en la pagina web
     //   enviarNotificacion();

        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;
    echo json_encode($respuesta);