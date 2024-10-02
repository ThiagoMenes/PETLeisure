<?php
     session_start();
     $logado = $_SESSION['email'];
    include_once('Config.php');
    $id = $_REQUEST['id'];
    if(isset($_POST['update'])){
        $email =  $_REQUEST['email'];
       // $password = password_hash($_REQUEST['senha'],PASSWORD_DEFAULT);
        $cpf = $_REQUEST['cpf'];
        $nome = $_REQUEST['nome'];
        $telefone = $_REQUEST['tel'];
        $tipoAnimal1 = $_REQUEST['tipo_animal1'];
        $tipoAnimal2 = $_REQUEST['tipo_animal2'];
        $tipoAnimal3 = $_REQUEST['tipo_animal3'];
        $idade_animal1 = $_REQUEST['idade_animal_1'];
        $idade_animal2 = $_REQUEST['idade_animal2'];
        $idade_animal3 = $_REQUEST['idade_animal3'];
        $nome_animal1 = $_REQUEST['nome_animal1'];
        $nome_animal2 = $_REQUEST['nome_animal2'];
        $nome_animal3 = $_REQUEST['nome_animal3'];
       // $foto_animal1 = $_REQUEST['foto_animal1'];
       // $foto_animal2 = $_REQUEST['foto_animal2'];
       // $foto_animal3 = $_REQUEST['foto_animal3'];
        $rua = $_REQUEST['logradouro'];
        $cep = $_REQUEST['cep'];
        $numero = $_REQUEST['numero'];
        $bairro = $_REQUEST['bairro'];
        $pais = $_REQUEST['pais'];
        $estado = $_REQUEST['estado'];
        $cidade = $_REQUEST['cidade'];
        $obs = $_REQUEST['obs'];

        $sql_update ="UPDATE usuario_dono_pet SET  nome ='$nome', telefone='$telefone', tipo_animal_1='$tipoAnimal1', tipo_animal_2='$tipoAnimal2', tipo_animal_3='$tipoAnimal3', nome_animal_1='$nome_animal1',nome_animal_2='$nome_animal2',nome_animal_3='$nome_animal3',idade_animal_1='$idade_animal1',idade_animal_2='$idade_animal2',idade_animal_3='$idade_animal3', imagem_animal_1='$foto_animal1',imagem_animal_2='$foto_animal2',imagem_animal_3='$foto_animal3', logradouro='$rua', CEP='$cep',numero='$numero',bairro='$bairro', pais='$pais',estado='$estado', cidade='$cidade',obs='$obs' where id_dono_pet = '$id';";
        $result = $conexao->query($sql_update);
    }
    header('Location: perfilDonoPet.php');
?>