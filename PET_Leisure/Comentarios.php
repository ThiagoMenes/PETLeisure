<?php
	session_start();
	//Conexão com o banco de dados
	include_once("Config.php");
	$logado = $_SESSION['email'];

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
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="HomepageUsuario.php">Home</a></li>
        
                        <li><a href="perfilDonoPet.php">Meu Perfil</a></li>

                        <li><a href="listarReservaDonoPet.php">Reservas</a></li>
        
                        <li><a href="sairDonoPet.php">Sair</a></li>

                    </ul>
                    </div>
                </div>
                </div>
            </nav>

        </div>

 

 <div class="row">

        <div class="col-6 col-md-4 "> <br><!-- COLUNA 1-->
        </div>



        <div class="col-6 col-md-4 alert-primary" style="border-radius: 10px"> <br> <!-- COLUNA 2-->

                <?php if(!empty($_GET['id'])){
                        $id =  $_GET['id'];

                        echo "Inserir Comentário: ";echo " <a class='btn btn-info' href='inserirComentario.php?id=$id'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar-check' viewBox='0 0 16 16'>
                        <path d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
                        <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                        </svg></a>"."<br>"."<hr>";

                    

                    $sqlSelect = "SELECT * FROM comentarios WHERE id_prestserv=$id;";



                    $result = $conexao->query($sqlSelect);

                    if($result->num_rows>0){
                    while($user_data = mysqli_fetch_assoc($result)){
                    $nomeDonoPet= $user_data['nomeDonoPet'];
                    $email =  $user_data['email'];
                    $mensagem = $user_data['mensagem'];
                    //$docIdentidade = $user_data['docIdentidade'];
                    echo "<div>";
                    echo "Nome: ".$nomeDonoPet."<br>";
                    echo "E-mail: ".$email."<br>";
                    echo "Data do comentário: ".date('d/m/Y H:i:s', strtotime($user_data['timestamp']))."<br>";
                    echo "<b>Comentário:</b> ".$mensagem."<hr>";
                    echo "</div>"."<br>";
                    }
                    }
                    /* else{
                        header('location: HomepageUsuario.php');
                    }*/
                    }?>

        </div>

        <div class="col-6 col-md-4 "> <br><!-- COLUNA 3-->


        </div>
</div>

<br><br>
<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   