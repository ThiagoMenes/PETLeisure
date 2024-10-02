<?php

session_start();
//print_r($_REQUEST);
include_once("Config.php");
$submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);
if($submit){
    $emailInserido = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senhaInserida = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    
    if ((!empty($emailInserido)) AND (!empty($senhaInserida))){
        $sql = "SELECT * FROM usuario_dono_pet WHERE email = '$emailInserido';";
    
        $resultado = mysqli_query($conexao,$sql);
        
       if ($resultado){
        $linha_usuario = mysqli_fetch_assoc($resultado);
        if(password_verify($senhaInserida,$linha_usuario['senha'])){
            $_SESSION['id'] = $linha_usuario['id_prest_serv'];
            $_SESSION['nome'] = $linha_usuario['nome'];
            $_SESSION['email'] = $linha_usuario['email'];
            header("Location: HomepageUsuario.php");
        }else{
            $_SESSION['msg'] = "Login e/ou senha incorretos!";
            header("Location: loginUsuario.php");
        }
       } 
    }else{
        $_SESSION['msg'] = "Login e/ou senha incorretos!";
        header("Location: loginUsuario.php");
    }
    }else{
        $_SESSION['msg'] = "Página não encontrada!";
        header("Location: loginUsuario.php");
    }
?>

