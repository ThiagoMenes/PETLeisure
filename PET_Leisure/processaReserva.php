<?php
session_start();
include_once("Config.php");

//Recebe os dados do formulário
$data = $_REQUEST['data'];
$tipoanimal = $_REQUEST['tipo_animal'];
$observacoes = $_REQUEST['observacoes'];
$id_prest_serv = $_REQUEST['idPrestServ'];
$id_dono_pet = $_REQUEST['idDonoPet'];
$tipo_reserva = $_REQUEST['tipo_reserva'];


//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//Salvar no Banco de Dados
$result_data = "INSERT INTO reserva (id_dono_pet, id_prest_serv, tipo_animal, tipo_reserva, observacoes, data) VALUES ('$id_dono_pet','$id_prest_serv','$tipoanimal','$tipo_reserva','$observacoes','$data_sem_barra')";
$resultado_data = mysqli_query($conexao, $result_data);

//Verificando se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<div class='alert alert-success'> Reserva cadastrada com sucesso </div>";
	header("Location: HomepageUsuario.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'> Erro ao cadastradar a Reserva </div>";
	header("Location: HomepageUsuario.php");
}