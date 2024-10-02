<?php 
	session_start();
	//Conexão com banco de dados
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
        

        <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>


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
                color:  #00008b;
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

                <li><a href="HomepagePrestServ.php">Home</a></li>
        
                <li><a href="perfilPrestServ.php">Meu Perfil</a></li>

                <li><a href="listarReservaPrestServ.php">Reservas</a></li>
        
                <li><a href="sairPrestServ.php">Sair</a></li>

                </li>
                </ul>
              </div>
            </div>
          </nav>

</div>

    <div class="row">
        <div class="col-6 col-md-4  "> 
                
            <div class=" " style="border-radius: 10px;"><br>
                <?php echo "<a class='p-3 mb-2 btn bg-info text-white' href='HomepagePrestServ.php'>Voltar a página Inicial</a><br><br>"; ?>
            </div>
        </div>


        <div class="col-6 col-md-4 alert-primary ">             
              <?php  
              echo "<br><h1>Histórico de Reservas: </h1><hr>";

                $sqlSelect = "SELECT id_prest_serv FROM usuario_prest_serv WHERE email = '$logado';";
                $resultadoPrestServ = $conexao->query($sqlSelect);
                $resultadoIdPrestServ = mysqli_fetch_assoc($resultadoPrestServ);
                $idPrestLogado = $resultadoIdPrestServ['id_prest_serv'];
                $result_horarios = "SELECT * FROM reserva WHERE  id_prest_serv = $idPrestLogado order by n_reserva DESC;";
                $resultado_horarios = mysqli_query($conexao, $result_horarios);
                
                

                while($row_horarios = mysqli_fetch_array($resultado_horarios)){
                
                    ////-------
                    $sqlSelectPrestServ = "SELECT nome, email, telefone FROM usuario_prest_serv WHERE id_prest_serv = $row_horarios[id_prest_serv];";
                    $resultadoQueryPrestServ = $conexao->query($sqlSelectPrestServ);
                    if($resultadoQueryPrestServ->num_rows>0){
                        while($resultadoPrestServ = mysqli_fetch_assoc($resultadoQueryPrestServ)){
                        $nomePrestServ= $resultadoPrestServ['nome'];
                        $emailPrestServ= $resultadoPrestServ['email'];
                        $TelefonePrestServ= $resultadoPrestServ['telefone'];
                        /*echo "Nome Prestador de Serviço: ".$nomePrestServ."<br>";
                        echo "E-mail Prestador de Serviço: ".$emailPrestServ."<br>";
                        echo "Telefone p/Contato: ".$TelefonePrestServ."<br>";*/
                        }
                        }
                        $sqlSelectDonoPet = "SELECT nome, email, telefone FROM usuario_dono_pet where id_dono_pet =  $row_horarios[id_dono_pet];";
                    //echo $sqlSelectDonoPet;
                    $resultadoQueryDonoPet = $conexao->query($sqlSelectDonoPet);
                        if($resultadoQueryDonoPet->num_rows>0){
                        while($resultadoDonoPet = mysqli_fetch_assoc($resultadoQueryDonoPet)){
                            //$id_dono_pet= $resultadoDonoPet['id_dono_pet'];
                            $nome_dono_pet= $resultadoDonoPet['nome'];
                            $emailDonoPet = $resultadoDonoPet['email'];
                            $telefoneDonoPet =$resultadoDonoPet['telefone'];
                            echo "Nome Dono do Pet: ".$nome_dono_pet."<br>";
                            echo "E-mail Dono do Pet: ".$emailDonoPet."<br>";
                            echo "Telefone p/Contato: ".$telefoneDonoPet."<br>";
                            echo "Tipo Animal: ".$row_horarios['tipo_animal']."<br>";
                            echo "Tipo de Serviço: ".$row_horarios['tipo_reserva']."<br>";
                            echo "<b>Observações: </b>".$row_horarios['observacoes']."<br>";
                            echo "Horário : ".date('d/m/Y H:i:s', strtotime($row_horarios['data']))."<hr>";
                            }
                        }
                
                    
                }
                
                        
                ?>
            </div>
        
            <div class="col-6 col-md-4 " >
            
            </div>
    </div>
<br><br>

<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   