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

        <title>Inserindo comentários</title>
        <style>
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
                <hr>
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
        </div>
                    


<div class="row">

        <div class="col-6 col-md-4 "> <br><!-- COLUNA 1-->
        </div>



        <div class="col-6 col-md-4 alert-primary" style="border-radius: 10px"> <!-- COLUNA 2-->

<?php 
	session_start();
	//Conexão com banco de dados
	include_once("Config.php");
	$logado = $_SESSION['email'];

    if(!empty($_GET['id'])){
    
        $id =  $_GET['id'];
    
        $sqlSelect = "SELECT nome, email FROM usuario_dono_pet WHERE email='$logado';";
    
        $result = $conexao->query($sqlSelect);
    
        if($result->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result)){
            $nomeDonoPet= $user_data['nome'];
            $email =  $user_data['email'];
            //$mensagem = $user_data['mensagem'];
            }
        }
       /* else{
            header('location: HomepageUsuario.php');
        }*/
    }
    
?>
        <form class="form-horizontal" action="processaComentario.php" method="POST">
                <div class="form-group" >
					<div class="col-sm-offset-2 col-sm-10" >
						<input type="hidden" name="idPrestServ" value="<?php echo $id?>">
						<input type="hidden" name="nomeDonoPet" value="<?php echo $nomeDonoPet?>">
                        <input type="hidden" name="emailDonoPet" value="<?php echo $email?>">
                        <div class="card-content-area">
                        <br><label>*Fale um pouco sobre a sua experiência, críticas ou sugestões. </label>
                        <br>
                        <textarea name="comentario" maxlength="2000"  required style="width:100%;"> </textarea><br><br>

						<button type="submit" class="btn btn-info">Cadastrar</button><br>
					    </div>
				    </div>
                </div>
			
        </form>
        

        </div>

        <div class="col-6 col-md-4 "> <br><!-- COLUNA 3-->
        </div>

</div>

    <br><br>
<!-- RODAPE -->

<?php
 include('rodape.php');
?>