<?php
 
 session_start();
 include_once('Config.php');

//print_r($_SESSION);

if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: loginUsuario.php');
}
$logado = $_SESSION['email'];
$SqlIdDonoPet = "SELECT id_dono_pet, nome from usuario_dono_pet where email = '$logado';";
$sqlDonoPet = $conexao->query($SqlIdDonoPet);
$resultado = mysqli_fetch_assoc($sqlDonoPet);
$idDonoPet = $resultado['id_dono_pet'];
$nomeDonoPet = $resultado['nome'];


if(!empty($_GET['search'])){
  $data = $_GET['search'];
  $sql = "SELECT * FROM usuario_prest_serv WHERE nome LIKE '%$data%' or email LIKE'%$data%' or estado LIKE '%$data%' or cidade LIKE '%$data%' or pais LIKE '%$data%' ORDER BY id_prest_serv DESC;";
}
else{
  $sql = "SELECT * FROM usuario_prest_serv ORDER BY id_prest_serv DESC;";
}



$result = $conexao->query($sql);
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
    <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>  
  
    <style type="text/css">
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


<div class="row">
    <div class="col-6 col-md-4 "> <br>
        <?php
          echo"<h2>Bem-Vindo <u>$nomeDonoPet</u></h2>"
        ?>
    </div>

    <div class="col-6 col-md-4 alert-primary"> <!-- COLUNA 2-->


            <br>
            <div class="box-search" style="display: flex;  justify-content:center; gap: 3%; width:100%; danger;">
              <input type="search" class="form-control " placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search-heart" viewBox="0 0 16 16">
                  <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                  <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
              </svg></button>
            
            </div>
              <br><hr>
                <?php
                    if(isset($_SESSION['msg'])){
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                    }
                    
                    //Receber o número da página
                    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
                    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                    
                    //Setar a quantidade de itens por pagina
                    $qnt_result_pg = 2;
                    
                    //calcular o inicio visualização
                    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                    
                    $result_usuarios = "SELECT * FROM usuario_prest_serv LIMIT $inicio, $qnt_result_pg";
                    $resultado_usuarios = mysqli_query($conexao, $result_usuarios);
                    
                    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                     // echo "ID: " . $row_usuario['id_prest_serv'] . "<br>";
                      echo "Nome: " . $row_usuario['nome'] . "<br>";
                      echo "E-mail: " . $row_usuario['email'] . "<br>";
                      echo "Cidade: " . $row_usuario['cidade'] . "<br>";
                      echo "Aceita Gatos: " . $row_usuario['aceita_gato'] . "<br>";
                      echo "Aceita Cães: " . $row_usuario['aceita_cachorro'] . "<br>";
                      echo "Aceita Passáros: " . $row_usuario['aceita_passaro'] . "<br>";
                      echo "Hospedagem: " . $row_usuario['hospedagem'] . "<br>";
                      echo "Creche: " . $row_usuario['creche'] . "<br>";
                      echo "Preço do Serviço: R$ ".$row_usuario['precoReserva']."<br>";
                      echo " <a class='btn btn-info ' href='DetalhesPrestServ.php?id=$row_usuario[id_prest_serv]'>"."Mais Informações..."."
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-book' viewBox='0 0 16 16'>
                      <path d='M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z'/>
                    </svg> 
                      </a>"."<br>"."<hr>";
                    }
                    
                    //Paginação - Somar a quantidade de usuários
                    $result_pg = "SELECT COUNT(id_prest_serv) AS num_result FROM usuario_prest_serv";
                    $resultado_pg = mysqli_query($conexao, $result_pg);
                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                    //echo $row_pg['num_result'];
                    //Quantidade de pagina 
                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                    
                    //Limitar os links antes depois
                    $max_links = 2;
                    echo "<a href='HomepageUsuario.php?pagina=1'>Primeira</a> ";
                    
                    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                      if($pag_ant >= 1){
                        echo "<a href='HomepageUsuario.php?pagina=$pag_ant'>$pag_ant</a> ";
                      }
                    }
                      
                    echo "$pagina ";
                    
                    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                      if($pag_dep <= $quantidade_pg){
                        echo "<a href='HomepageUsuario.php?pagina=$pag_dep'>$pag_dep</a> ";
                      }
                    }
                    
                    echo "<a href='HomepageUsuario.php?pagina=$quantidade_pg'>Ultima</a>";
                    
                    
                    ?>
                    <br>
  
    </div>

    <div class="col-6 col-md-4"> <!-- COLUNA 3-->

    </div>


    </div>
  </div>

  

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
      if(event.key === "Enter"){
        searchData();
      }
    });
    function searchData(){
      window.location = 'HomepageUsuario2.php?search='+search.value;
    }
  </script>

<br><br>



<!-- RODAPE -->

<?php
 include('rodape.php');
?> 
  