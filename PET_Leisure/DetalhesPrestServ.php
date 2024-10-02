<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_prest_serv WHERE id_prest_serv=$id;";

    $result = $conexao->query($sqlSelect);
    
    
   
    if($result->num_rows>0){

        while($user_data = mysqli_fetch_assoc($result)){
        $id_prest_serv = $user_data['id_prest_serv'];
        $email =  $user_data['email'];
        $password = $user_data['senha'];
        $docIdentidade = $user_data['docIdentidade'];
        $nome = $user_data['nome'];
        $telefone = $user_data['telefone'];
        $perfil = $user_data['perfil'];
        $hospedagem = $user_data['hospedagem'];
        $creche = $user_data['creche'];
        $qtdAnimaisAceitos = $user_data['qtdAnimaisAceitos'];
        $aceitaGato = $user_data['aceita_gato'];
        $aceitaCachorro = $user_data['aceita_cachorro'];
        $aceitaPassaro = $user_data['aceita_passaro'];
        $logradouro = $user_data['logradouro'];
        $cep = $user_data['CEP'];
        $numero = $user_data['numero'];
        $bairro = $user_data['bairro'];
        $pais = $user_data['pais'];
        $estado = $user_data['estado'];
        $cidade = $user_data['cidade'];
        $certificacao = $user_data['certificacao'];
        $precoReserva = $user_data['precoReserva'];
        $local = $user_data['imagem_local_1'];
        $local = $user_data['imagem_local_2'];
        $local = $user_data['imagem_local_3'];
        $obs = $user_data['obs'];
        }
    }
    else{
        header('location: HomepageUsuario.php');
    }
}


    $resultado = mysqli_fetch_assoc($result);
    

    $sql_IMG = "SELECT perfil from imagem_Prest where id_prestServ = $id_prest_serv;";   
    $consulta_IMG = $conexao->query($sql_IMG); 
    $resultado_IMG = mysqli_fetch_assoc($consulta_IMG);
     $imagem_Prestserv = $resultado_IMG['perfil']."";
    //echo $imagem_Prestserv;
    //$extensao == '.png';
    $img = "uploads/".$imagem_Prestserv;
    


?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>

        <link rel="shortcut icon" href="../PET_Leisure/img/favicon.png" >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/rolagem.css" rel="stylesheet">
        <center> <img src="img/top.png" alt="Imagem do topo." width="100%"></center>


        <title>Alteração de Informações</title>
        <style type="text/css">
            #update{
                background-image: linear-gradient(to right, rgb(0,92,197), rgb(90,20,220));
                width:50%;
                border: none;
                padding: 15px;
                color:white;
                font: size 15px;
                cursor: pointer;
                border-radius:10px;
            }
            #update:hover{
                background-image:linear-gradient(to right,rgb(0,80,172), rgb(80,19,195));
            }

            
            a{
                color: #00008b;
            }
    
        </style>
    </head>

    <body class="p-3 mb-2 bg-primary text-white"> 
    <div class="alert alert-primary" role="alert"> <!--cor azul claro-->

        <nav class="navbar navbar-default">
            <div class="container-fluid">
        
              <div class="navbar-header">
              <nav type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <img src="./img/menu.png" width="20" height="20" alt=""></a>
              </nav>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                <li><a href="HomepageUsuario.php">Home</a></li>
        
                <li><a href="perfilDonoPet.php">Meu Perfil</a></li>

                <li><a href="listarReservaDonoPet.php">Reservas</a></li>
        
                <li><a href="sairDonoPet.php">Sair</a></li>

                </li>
                </ul>
              </div>
            </div>
          </nav>

</div>
        <div class="row">
            <div class="col-7 col-md-3 "> <br> <!-- COLUNA 1 -->
                
            </div>

            <div class="col-8 col-md-6 alert-primary" style="padding: 0;">  <!-- COLUNA 2 -->
                <div id="cadastro" alert-primary style="margin-left:0px;">
        

        <form action="InserirReserva.php" method="POST"  class="card" >

            <div class="card-header bg-info mb-0 " >
              
              <div style="margin-left:39%; margin-top: 5%; margin-bottom: 5%; width:100%;">
              <!-- Imagem de perfil -->
              <?php
                
                    echo "<a href='".$img."'> <img src='".$img."'width='150' class='rounded-circle' height='150' > "."</a><br> ";
              ?>
              </div><hr>

              <div style="margin-left:23%; margin-top: 0%; margin-bottom: 3%;">
                    <h2>Perfil - Prestador de serviço </h2>
              </div>

            </div>

                <div class="card-body alert-primary">
                        <br>
                        <label><b>E-Mail:</b> </label>
                        <?php echo $email?>
                    
                        <br><label><b>Nome: </b></label>
                       <?php echo $nome?>
                    
                        <br><label><b>Telefone para contato:</b> </label>
                       <?php echo $telefone?>
                   
                    <hr>  
                        <label><b>Esse perfil fornece:</b></label><br>
                        <b>Hospedagem/Diária?</b>  <?php echo " ".$hospedagem?>
                        <br>
                        <b>Creche/Semanal ou Mensal? </b> <?php echo " ".$creche?>
                        <br><br>
   
                       <b> Preço do Serviço(R$):</b><br> <?php echo $precoReserva?>
                        <br>
                    
                        <br><label><b>Esse local acomoda:</b></label><br>
                        <?php echo $qtdAnimaisAceitos." animais por dia.";?><br>
                
                        <br><label><b>Animais aptos a usufruir desse local:</b> </label><br>
                        <?php echo "<b>"."Cães: "."</b> ".$aceitaCachorro?>
                       <br>
                        <?php echo "<b>"."Gatos: "."</b>".$aceitaGato?>
                        </select>
                        <br>
                        <?php echo "<b>"."Pássaros: "."</b>".$aceitaPassaro?>
                        <br>
                        <br>
                    <hr>
                        <b><label><u>ENDEREÇO</u></label></b>
                        <p>Local Onde os pets irão se acomodar:
                        <br><?php echo $logradouro." - ".$numero.", ".$bairro.", ".$cidade.", ".$cep.", SP - Brasil"; ?>
                    <hr>

                        <label><u><b>Recado do Prestador de Serviços:</b></u> </label><br>
                        <textarea name="obs"  required readonly style="width:100%;"><?php echo $obs?></textarea><br>
                    
                    <hr>
                    <div class="alert-primary text-center">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                        <?php echo " <a class='btn btn-info' href='InserirReserva.php?id=$id'>"."Efetuar Reserva: "."
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                        <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                        <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                        </svg></a>"."<br><br>";?>
                        <?php echo " <a class='btn btn-info' href='Comentarios.php?id=$id'>"."Comentários e avaliações: "."
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                        <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                        <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                        </svg></a>"."<br>";?>
                        <!--<input type="submit" name="update" value="Efetuar Reserva" id="update" >-->
                        <br>
                    </div>
            
                </div>
            </form>
                </div>
        
            </div>
            
            <div class="col-8 col-md-3 "> <!-- COLUNA 3 --> 
                <br>
    

            </div>


        </div>
        <br><br>


<!-- RODAPE -->

<?php
 include('rodape.php');
?>
   