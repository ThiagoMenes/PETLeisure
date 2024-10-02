<?php
session_start();
$logado = $_SESSION['email'];
if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];
	$sqlSelectDonoPet = "SELECT id_dono_pet FROM usuario_dono_pet WHERE email = '$logado';";

	
    $sqlSelect = "SELECT * FROM usuario_prest_serv WHERE id_prest_serv=$id;";

}
$result = $conexao->query($sqlSelect);
$resultPet = $conexao->query($sqlSelectDonoPet);

if($result->num_rows>0){
	while($user_data = mysqli_fetch_assoc($result)){
	$id_prest_serv= $user_data['id_prest_serv'];
	}
}
else{
	header('location: HomepageUsuario.php');
}

if($resultPet->num_rows>0){
	while($user_data2 = mysqli_fetch_assoc($resultPet)){
	$id_dono_pet= $user_data2['id_dono_pet'];
	}
}
else{
	header('location: HomepageUsuario.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Efetuar Reserva</title>
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="css/rolagem.css" rel="stylesheet">
		<!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
		<script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->
		<center> <img src="img/top.png" alt="Imagem do topo." width="100%"></center>
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
<!-- Brand and toggle get grouped for better mobile display -->
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
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
		<div class="container">
			<br><br><a href='listarReservaDonoPet.php' class="alert alert-primary">Listar Reservas</a><br><br>
			<h1>Efetuar Reserva</h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<form class="form-horizontal" action="processaReserva.php" method="POST">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Tipo Animal</label>
					<div class="col-sm-10">
						<!--<input type="text" name="tipoanimal" class="form-control" id="inputEmail3" placeholder="Para qual especíe de animal está sendo feita a Reserva?">-->
                        <select  name="tipo_animal" class="form-control" id="inputEmail3" placeholder="Para qual especíe de animal está sendo feita a Reserva?"> 
                        <option value="Cachorro">Cachorro</option> 
                        <option value="Gato">Gato</option> 
                        <option value="Passaro">Pássaro</option>  
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Tipo de Reserva</label>
					<div class="col-sm-10">
                        <select  name="tipo_reserva" class="form-control" id="inputEmail3" placeholder="Qual o tipo de serviço?"> 
                        <option value="Hospedagem">Hospedagem</option> 
                        <option value="Creche">Creche</option> 
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Data e Hora</label>
					<div class="col-sm-10">
						<div class="input-group date data_formato" data-date-format="dd/mm/yyyy HH:ii:ss">
							<input type="text" class="form-control" name="data" placeholder="Data e hora da Reserva">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</span>
						</div> 
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Observações da reserva:</label>
				<div class="col-sm-10">	
				<textarea name="observacoes" maxlength="2000"  placeholder= "Ex: tipo de serviço agendado, comportamento dos animais e preferências."required></textarea><br><br>
				</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" name="idPrestServ" value="<?php echo $id_prest_serv?>">
						<input type="hidden" name="idDonoPet" value="<?php echo $id_dono_pet?>">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>
		<script src="js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
		<script type="text/javascript">
			$('.data_formato').datetimepicker({
				weekStart: 1,
				todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                startDate: '+0d'
			});
		</script>


<!-- RODAPE -->
<br><br>
<?php
 include('rodape.php');
?>