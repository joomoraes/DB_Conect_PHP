<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "andes";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);
        
    if ( mysqli_connect_errno() ) {
        die("CONEXÃO PERDIDA: " . mysqli_connect_errno());
    }
?>