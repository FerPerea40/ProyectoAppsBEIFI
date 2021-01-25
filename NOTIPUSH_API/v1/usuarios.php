<?php
  include "conexion.php";
 $Respuesta =array();
 $Respuesta['estado']=1;
 $Respuesta['mensaje']='Algo';

switch($_SERVER['REQUEST_METHOD']){

   case 'POST':
      actionAddEmpleado();
   break;

   case 'GET':
      if(isset($_GET['Nombre'])){
          actionGetOneEmpleado($_GET['Nombre']);
       }else{
          actionGetAllEmpleado();
       }
   break;

   case 'PUT':
       actionUpdateEmpleado($_GET['id']);
   break;
   
   case 'DELETE':
       actionDelEmpleado();
   break;

   default:
      actionErrorMetodoApi();
   break;
}


function actionAddEmpleado(){
  //echo  file_get_contents("php://input");

 $usuario = file_get_contents("php://input");
 $datos =json_decode($usuario);
 
    $link=connect();

    if($link){
      
        $query = "SELECT * FROM  usuario  WHERE boleta = '$datos->boleta' ";
        $respuesta['usuarios']=array();

        $registros = mysqli_query($link,$query);

        $count = mysqli_num_rows($registros);

        if ($count == 1) {
            $sql = "UPDATE usuario SET token='$datos->token' where boleta='$datos->boleta'";
            if ($link->query($sql) === TRUE){
                $respuesta['estatus']=1;
                 $respuesta['mensaje']= "Usuario Actualizado";
             } else {
                      $respuesta['estatus']=0;
                      $respuesta['mensaje']="No se pudo actualizar ";
            }
         } else{
           // $hash = password_hash($datos->clave, PASSWORD_BCRYPT);
            $añadir = "INSERT INTO usuario (nombrecompleto, boleta,token,tipo, Programa_idPrograma) VALUES ('$datos->nombreCompleto','$datos->boleta','$datos->token','$datos->tipo','$datos->Programa_idPrograma')";
       
               if ($link->query($añadir) === TRUE) {
                    $respuesta['estatus']=1;
                    $respuesta['mensaje']="Empleado Creado Exitosamente!" ;
                 } else {
                    $respuesta['estatus']=1;
                     $respuesta['mensaje']="Error al crear el usuario." ;
                   }
        }
      
    }
    
 echo json_encode($respuesta);
}



function actionGetOneEmpleado($nombre){

    $respuesta = array();
  
    $link=connect();

    if($link){
        $query="SELECT * FROM programa where Nombre = $nombre";

        $respuesta['programas']=array();

        $registros = mysqli_query($link,$query);

        while($renglon=mysqli_fetch_array($registros)){

            $programa = array();
            $programa['idPrograma']	=$renglon['idPrograma'];	
            $programa['Nombre']	=$renglon['Nombre'];
            $programa['Descripcion']=$renglon['Descripcion'];

          array_push($respuesta['programas'], $programa); 
        }
        if($respuesta['programas']!=NULL){
        $respuesta['estatus']=1;
        $respuesta['mensaje']='Consulta Existosa';

    }else{
        $respuesta['estatus']=0;
        $respuesta['mensaje']="No existe este Usuario";
    }
    }
    echo json_encode($respuesta);
    

}
function actionGetAllEmpleado(){
    $respuesta = array();
        $link=connect();
        if($link){
			$query="SELECT * FROM programa";

			$respuesta['programas']=array();

			$registros = mysqli_query($link,$query);

			while($renglon=mysqli_fetch_array($registros)){

                $programa = array();
            $programa['idPrograma']	=$renglon['idPrograma'];	
            $programa['Nombre']	=$renglon['Nombre'];
            $programa['Descripcion']=$renglon['Descripcion'];
    

            array_push($respuesta['programas'], $programa); 
			}
			$respuesta['estatus']=1;
			$respuesta['mensaje']='Consulta Existosa';

            if($respuesta['programas']!=NULL){
                $respuesta['estatus']=1;
                $respuesta['mensaje']='Consulta Existosa';
        
            }else{
                $respuesta['estatus']=0;
                $respuesta['mensaje']="No hay usuarios registrados";
            }
        }
		echo json_encode($respuesta);

}

function actionDelEmpleado(){

    if(isset($_GET['id'])){

        $respuesta = array();
        $link=connect();
  
        if($link){
            $query = "SELECT * FROM  empleado  where id='{$_GET["id"]}'";
            $respuesta['empleados']=array();
    
            $registros = mysqli_query($link,$query);
    
            $count = mysqli_num_rows($registros);
    
            if ($count == 1) {
                $query="DELETE FROM empleado where id='{$_GET["id"]}'";
    
             $eliminacion= mysqli_query($link,$query);
             $respuesta['estatus']=1;
             $respuesta['mensaje']='Eliminado Existosamente';
          }else{
            $respuesta['estatus']=0;
            $respuesta['mensaje']="No existe el usuario";
        }
       }
        }
        echo json_encode($respuesta);
}
    

 function actionUpdateEmpleado($id){
    if(isset($_GET['id'])){

           $Empleadito = file_get_contents("php://input");
           $datos =json_decode($Empleadito);
 
    if($datos->usuario == "" ||$datos->nombre == ""||$datos->clave == ""){
           $respuesta['estatus']=0;
           $respuesta['mensaje']="Faltan  datos por llenar";
       } else{
            $hash = password_hash($datos->clave, PASSWORD_BCRYPT);
            $link=connect();
         if($link){
            $query = "SELECT * FROM  empleado  where id='{$_GET["id"]}'";
            $respuesta['empleados']=array();
    
            $registros = mysqli_query($link,$query);
    
            $count = mysqli_num_rows($registros);
    
            if ($count == 1) {
             $sql = "UPDATE empleado SET nombre='$datos->nombre', clave='$hash', id_creador='$datos->id_creador' where id='{$_GET["id"]}'";
          
             if ($link->query($sql) === TRUE){
                $respuesta['estatus']=1;
                 $respuesta['mensaje']= "Usuario Actualizado";
             } else {
                      $respuesta['estatus']=0;
                      $respuesta['mensaje']="No se pudo actualizar ";}
            }else{
                $respuesta['estatus']=0;
                $respuesta['mensaje']= "No existe el usuario ";
            }
      
        }
    }

    }
    echo json_encode($respuesta);
    }






function actionErrorMetodoApi(){
    
    $Respuesta['estado']=1;
    $Respuesta['mensaje']='Metodo no valido';

    

    echo json_encode($Respuesta);

}
?>