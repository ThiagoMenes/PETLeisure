<?php
    session_start();

     include_once('Config.php');
     
     $logado = $_SESSION['email'];
     //$id = $_REQUEST['id'];
        $idPrestServ = $_REQUEST['idPrestServ'];
        $nomeDonoPet = $_REQUEST['nomeDonoPet'];
        $emailDonoPet = $_REQUEST['emailDonoPet'];
        $comentario = $_REQUEST['comentario'];

        echo $idPrestServ;
        echo $nomeDonoPet;
        echo $emailDonoPet;
        echo $comentario;
        
        $result_comentario = "INSERT INTO comentarios (email, id_prestserv, nomeDonoPet, mensagem) VALUES ('$emailDonoPet','$idPrestServ','$nomeDonoPet', '$comentario');";
        $resultado_cadastro = mysqli_query($conexao, $result_comentario);
        

//Verificando se salvou no banco de dados através do "mysqli_insert_id" o qual deve verificar se existe o ID do último dado inserido
            if(mysqli_insert_id($conexao)){
                $_SESSION['msg'] = "<div class='alert alert-success'> Comentário cadastrado com sucesso </div>";
                header("Location: HomepageUsuario.php");
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'> Erro ao cadastrar o comentário </div>";
                header("Location: HomepageUsuario.php");
            }
