<?php
     include_once('Config.php');
     session_start();
     $logado = $_SESSION['email'];
     $id = $_REQUEST['id'];
    if(isset($_POST['update'])){
        $docIdentidade = $_REQUEST['docIdentidade'];
        $nome = $_REQUEST['nome'];
        $telefone = $_REQUEST['tel'];
        $perfil = $_REQUEST['perfil'];
        $hospedagem = $_REQUEST['hospedagem'];
        $creche = $_REQUEST['creche'];
        $qtdAnimaisAceitos = $_REQUEST['qtdAnimais'];
        $aceitaGato = $_REQUEST['gato'];
        $aceitaCachorro = $_REQUEST['cachorro'];
        $aceitaPassaro = $_REQUEST['passaro'];
        $logradouro = $_REQUEST['logradouro'];
        $cep = $_REQUEST['cep'];
        $numero = $_REQUEST['numero'];
        $bairro = $_REQUEST['bairro'];
        $pais = $_REQUEST['pais'];
        $estado = $_REQUEST['estado'];
        $cidade = $_REQUEST['cidade'];
        $certificacao = $_REQUEST['certificacao'];
        $precoReserva = $_REQUEST['precoReserva'];
        $imagem_local_1 = $_REQUEST['local'];
        $imagem_local_2 = $_REQUEST['local'];
        $imagem_local_3= $_REQUEST['local'];
        $obs = $_REQUEST['obs'];

        $sql_update ="UPDATE usuario_prest_serv SET nome ='$nome', telefone='$telefone',perfil='$perfil', hospedagem='$hospedagem', creche='$creche', qtdAnimaisAceitos='$qtdAnimaisAceitos',aceita_gato='$aceitaGato',aceita_cachorro='$aceitaCachorro', aceita_passaro='$aceitaPassaro',logradouro='$logradouro',CEP='$cep', numero='$numero', bairro='$bairro',pais='$pais',estado='$estado', cidade='$cidade',certificacao='$certificacao', precoReserva='$precoReserva', imagem_local_1='$imagem_local_1',imagem_local_2='$imagem_local_2', imagem_local_3='$imagem_local_3', obs='$obs' where id_prest_serv = '$id';";
        $result = $conexao->query($sql_update);
    }
    header('Location: perfilPrestServ.php');
?>