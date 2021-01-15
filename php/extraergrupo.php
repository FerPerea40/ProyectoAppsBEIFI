<?php
    include('conexion.php');
    $con = connect();
    $consulta = "SELECT * from grupo";
    $query = mysqli_query($con,$consulta);

    echo '<option></option>';
        while ($fila = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
 
            echo '<option value="'.$fila['idGrupo'].'">'.$fila['nombre'].'</option>';
        };
    
?>