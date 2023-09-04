
<?php
        if(isset($_POST['enviar'])){
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);


            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                move_uploaded_file($_FILES['foto']['tmp_name'],$_FILES['foto']['name']);

            }
        
            $sql = "INSERT INTO usuarios (Img_u, Nbr_u, Pass_u) VALUES ('$foto', '$usuario' ,'$contrasenia')";
            $insertar = mysqli_query($conexion,$sql);
        }
        
    ?>