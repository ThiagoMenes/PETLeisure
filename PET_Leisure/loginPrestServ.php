<?php
session_start();
?>
<!DOCTYPE html>


<html lang="pt-br">

    <head >
        <link rel="shortcut icon" href="../PET_Leisure/img/favicon.png" >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/rolagem.css" rel="stylesheet">
 

    <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>

    <style type="text/css">
      #update{
                background-image: linear-gradient(to right, rgb(0,40,190), rgb(20,50,180));
                width:50%;
                border: none;
                padding: 15px;
                color:white;
                font: size 15px;
                cursor: pointer;
                border-radius:10px;
            }
            #update:hover{
                background-image:linear-gradient(to right,rgb(10,20,80), rgb(10,20,80));
            }
     a{
        color: #00008b;
      }
    </style>

        <title>Login do Prestador de Serviços</title>

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
                  
                <li><a href="index.php">Home</a></li>
                <li><a href="loginUsuario.php">Dono de Pet</a></li>
                <li><a href="loginPrestServ.php">Prestador de serviços</a></li>
                <li><a href="cadastro.php">Novo por aqui?</a></li>
                <li><a href="info.php">Sobre Nós!</a></li>
                  
                </li>
                </ul>
              </div> 
            </div> 
          </nav>
    </div>
    <?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

    <div class="card text-center bg-info mb-3" style="width: 38%;  margin-left: auto; margin-right: auto;" id="login">

            <form action="testeLoginPrestServ.php" class="card" method="POST" >

            <div class="card-body bg-info mb-0" >
                    <img src="img/logPrest.png" >
                </div>

                <div class="card-content bg-info  mb-0">
                <div class="card-content-area  bg-info mb-3 ">
                        <label for="prest">Email</label>
                        <input type="text" name="email" >
                    </div>

                    <div class="card-content-area  bg-info mb-0 ">
                        <label for="password">Senha</label>
                        <input type="password" name="senha" autocomplete="off">
                    </div>
                </div>

                <div class="card-footer bg-info mb-0">

                    <input type="submit" class="btn btn-primary" name="submit" value="enviar" class="submit"><br>

                    <!-- <a href="#"class="card-link text-light" >Esqueceu a senha?</a><br> -->
                    <a href="cadastroPrest.php" class="card-link text-light" >Ainda não tem cadastro?  (Criar conta)</a>

                </div>

            </form>

        </div>

<!-- RODAPE -->

<?php
 include('rodape.php');
?>