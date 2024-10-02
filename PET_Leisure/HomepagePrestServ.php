<?php
 
 session_start();
  include_once("Config.php");
//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: loginPrestServ.php');
}
$logado = $_SESSION['email'];
$SqlIdPrestServ = "SELECT * from usuario_prest_serv where email = '$logado';";
$sqlPrestServ = $conexao->query($SqlIdPrestServ);
$resultado = mysqli_fetch_assoc($sqlPrestServ);
$idPrestServ = $resultado['id_prest_serv'];
$nomePrestServ = $resultado['nome'];
?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Leisure - home</title>
    <link rel="shortcut icon" href="../PET_Leisure/img/favicon.png" >


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/rolagem.css" rel="stylesheet">
   <!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
    <script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->
    <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>

          <style>
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
          <li><a href="HomepagePrestServ.php">Home</a></li>

          <li><a href="perfilPrestServ.php">Meu Perfil</a></li>

          <li><a href="listarReservaPrestServ.php">Reservas</a></li>
        
          <li><a href="sairPrestServ.php">Sair</a></li> 
          </ul>
        </div>
        </div>
      </div>
    </nav>
  </div>

<div class="row">

        <div class="col-6 col-md-4 "> <br><!-- COLUNA 1-->
          <h2>Seja Bem-Vindo <?php echo "<u>$nomePrestServ</u>!";?></h2><br>
        </div>



        <div class="col-6 col-md-4 alert-primary"> <!-- COLUNA 2-->
            <h2><center>Comentários e avaliações a respeito dos teus serviços nos últimos dias: </center></h2> <hr>
            <?php 
            
            $sqlSelect = "SELECT * FROM comentarios WHERE id_prestserv=$idPrestServ order by id_comentario DESC";
            

            $result = $conexao->query($sqlSelect);

            if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //definir a quantidade de itens que será apresentado por página.
            $qnt_result_pg = 1;

            //calculando o inicio da visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $result_usuarios = "SELECT * FROM comentarios WHERE id_prestserv=$idPrestServ order by id_comentario DESC LIMIT $inicio, $qnt_result_pg";
            $resultado_usuarios = mysqli_query($conexao, $result_usuarios);
            if($resultado_usuarios->num_rows>0){
              while($user_data = mysqli_fetch_assoc($resultado_usuarios)){
              $nomeDonoPet= $user_data['nomeDonoPet'];
              $email =  $user_data['email'];
              $mensagem = $user_data['mensagem'];
              //$docIdentidade = $user_data['docIdentidade'];
              echo "<div>";
              echo "Nome: ".$nomeDonoPet."<br>";
              echo "E-mail: ".$email."<br>";
              echo "Data do comentário: ".date('d/m/Y H:i:s', strtotime($user_data['timestamp']))."<br>";
              echo "<b>Comentário: </b>".$mensagem."<hr>";
              echo "</div>"."";
              }
              }
            /* echo " <a class='btn btn-primary' href='DetalhesPrestServ.php?id=$row_usuario[id_prest_serv]'>
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-book' viewBox='0 0 16 16'>
              <path d='M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z'/>
            </svg>
              </a>"."<br>". ;*/


            //Paginação - Somar a quantidade de comentários
            $result_pg = "SELECT COUNT(id_comentario) AS num_result FROM comentarios where id_prestserv=$idPrestServ order by id_comentario DESC;";
            $resultado_pg = mysqli_query($conexao, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];
            //Quantidade de paginas 
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

            //Limitar os links para antes e depois
            $max_links = 2;
            echo "<a href='HomepagePrestServ.php?pagina=1'>Primeira</a> ";

            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
              if($pag_ant >= 1){
                echo "<a href='HomepagePrestServ.php?pagina=$pag_ant'>$pag_ant</a> ";
              }
            }
              
            echo "$pagina ";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
              if($pag_dep <= $quantidade_pg){
                echo "<a href='HomepagePrestServ.php?pagina=$pag_dep'>$pag_dep</a> ";
              }
            }

            echo "<a href='HomepagePrestServ.php?pagina=$quantidade_pg'>Ultima</a>";
           

            ?>
            
  
        </div>
        
        <div class="col-6 col-md-4">

        </div>

</div>
<br><br>

<!-- RODAPE -->

<?php
 include('rodape.php');
?>
   