<?php	
include("conexion.php");
$usuario = $_GET['usuario'];
$pass = $_GET['clave'];
$link=connect();
$consulta="SELECT * from administrador where usuario='" . $usuario . "'";
$result= mysqli_query($link,$consulta) or die('No consulta');
/**/
$resultado = array();
if($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	if($row['clave'] ==  $pass){
		session_start();
        $_SESSION['usuario'] = $usuario;
        $resultado['estado'] = 1;
	}else{
        $resultado['estado'] = 0;
		
	}
}else{
    $resultado['estado'] = 0;
	
}
echo json_encode($resultado);

?>
