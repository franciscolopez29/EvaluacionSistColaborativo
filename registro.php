<?php


include ("conexion.php");
include ("redimensionarImg.php");

if(isset($_POST['enviar'])){
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
    
    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        move_uploaded_file($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);

        $foto = redimensionarImg($_FILES['imagen']['name'],100,100);
        unlink($_FILES['imagen']['name']); // BORRA IMAGEN ORIGINAL 
    }

    $sql = "INSERT INTO usuarios (Img_u, Nbr_u, Pass_u) VALUES ('$foto', '$usuario' ,'$contrasenia')";
    $insertar = mysqli_query($conexion,$sql);
}


    //     include ("conexion.php");
    //     include ("redimensionarImg.php");

    //     if(isset($_POST['enviar'])){
    //         $usuario = $_POST['usuario'];
    //         $contrasenia = $_POST['contrasenia'];
    //         $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
            
    //         if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
    //             move_uploaded_file($_FILES['imagen']['tmp_name'],$_FILES['imagen']['name']);

    //             $img = redimensionarImg($_FILES['imagen']['name'],100,100);
    //             unlink($_FILES['imagen']['name']);
    //         }


    //     $sql = "INSERT INTO usuarios (Img_u, Nbr_u, Pass_u) VALUES ('$imgen', '$usuario' ,'$contrasenia')";
    //     $insertar = mysqli_query($conexion,$sql);
    // }
        
?>