
<?php
    include("conexion.php");
  
    $id = $_POST['id'];
    $grupo = $_POST['grupo'];


    $consulta  = "INSERT INTO `agrupamiento` (`idAgrupamiento`, `Usuario_idUsuario`, `Grupo_idGrupo`)";
    $consulta  .= "VALUES (NULL, ";
    $consulta  .= "'".$id."',";
    $consulta  .= "'".$grupo."')";

    $link=connect();
    if (mysqli_query($link, $consulta)) {
        $status = "ok";
    } else {
        $status = "err";
    }
    mysqli_close($link);
    echo $status;die;
