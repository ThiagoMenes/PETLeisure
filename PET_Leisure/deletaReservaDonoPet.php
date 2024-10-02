<?php 
	session_start();
	//Conexão com banco de dados
	include_once("Config.php");
	$logado = $_SESSION['email'];
    $id =  $_GET['id'];

    $SqlDeletaReserva = "DELETE FROM reserva where n_reserva = $id;";
    $resultado_data = mysqli_query($conexao, $SqlDeletaReserva);

    if(mysqli_insert_id($conexao)){
        $_SESSION['msg'] = "<div class='alert alert-danger'> Erro ao excluir a Reserva </div>";
        header("Location: HomepageUsuario.php");
    }else{
        $_SESSION['msg'] = "<div class='alert alert-success'> Reserva Excluída com sucesso</div>";
        header("Location: HomepageUsuario.php");
    }

?>