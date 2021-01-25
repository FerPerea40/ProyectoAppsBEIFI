<?php


 include('functions.php'); 
 $user=$_GET['usuario'];

 if ($resultset = getSQLResultSet("SELECT clave FROM `empleado` WHERE usuario='$user'")) {
     
         while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
         echo json_encode($row);
         
         
         }
         
    }
    
 
 
?>