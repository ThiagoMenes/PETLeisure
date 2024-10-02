<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_prest_serv WHERE id_prest_serv=$id;";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows>0){
        while($user_data = mysqli_fetch_assoc($result)){
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
        header('location: perfilPrestServ.php');
    }


   


       
}

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

        <div id="cadastro">

            <form action="saveEditPrestServ.php" method="POST" class="card" style="margin-left: 25%; margin-right: 25%;" enctype="multipart/form-data">

                <div class="card-header bg-info mb-0">
                    <h2>Alterando dados: </h2>
                </div>

                <div class="card-content bg-info clearfix mb-0">

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label><b><u>DADOS DE LOGIN</u></b></label><br>
                        <label>*Email</label>
                        <br><input type="email" name="email" required  style="width:100%;" id="email" value="<?php echo $email?>" readonly>
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label for="password">*Senha</label>
                        <br><input type="password" name="password"  required style="width:100%;" minlength="6" maxlength="10" value="<?php echo $password?>" readonly>
                        <small id="passwordHelpInline" class="text-white">
                        Sua senha (impossível alterar).                      
                        </small>                      
                    </div>
                    

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <hr><br><label><b><u>DADOS PESSOAIS</u></b></label><br>
                        <label>*Nome Completo</label>
                        <br><input type="text" name="nome" required style="width:100%;" value="<?php echo $nome?>">
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>CPF/CNPJ</label>
                        <br><input type="text" name="docIdentidade"  
                        required style="width:100%;" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" value="<?php echo $docIdentidade?>" readonly>
                        <small id="passwordHelpInline" class="text-white">
                            Seu documento de identidade (impossível alterar).                      
                        </small>  
                    </div>
                    <br>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                     <label>*Telefone para contato</label><br>
                        <input type="text" name="tel"  
                        required style="width:100%;" pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})"value="<?php echo $telefone?>">
                        <small id="passwordHelpInline" class="text-white">
                            Digite o número sem pontos ou traços e não se esqueça do DDD.                      
                        </small>  
                    </div>
                    <br>

                    <!-- <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%">
                        <label>*Nos envie imagem sua ou de sua logo para servir de perfil:</label>
                        <input type="file" name="perfil" required >
                    </div>
                    <br> -->

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                    <hr><br><label><u><b>SOBRE OS PETS</b></u></label><br><br>
                            
                            <label >*Quais serviços você ira fornecer?</label>
                            <P>Hospedagem/Diária</p>
                            <select name="hospedagem" style="width:100%;"> 
                                <option value="sim" >Sim</option>
                                <option value="nao" >Não</option> 
                            </select>
                            
                            <br><br> 
                            <p>Creche/Semanal ou Mensal</p>
                            <select name="creche" style="width:100%;"> 
                                <option value="sim" >Sim</option>
                                <option value="nao" >Não</option> 
                            </select>
                            
                    </div>
                    <br>
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Quantos animais no total o local tem condições de acomodar por dia?</label>
                        <input type="number" max="10" min="1" name="qtdAnimais" required style="width:100%;">
                    </div>
                    <br> 

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Valor cobrado pelo Serviço: </label>
                        <input type="text" name="precoReserva" required value="<?php echo $precoReserva ?>" style="width:100%;">
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                       <br> <label>*Quais animais são aptos a usufruir desse local? </label>
                        <br><p>Cachorro</p>
                        <select name="cachorro" style="width:100%;"> 
                        <option ><?php echo $aceitaCachorro?></option>
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        
                        </select>
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                       <br><p>Gato</p>
                        <select name="gato" style="width:100%;">
                        <option ><?php echo $aceitaGato?></option>
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        
                        </select>
                    </div> 

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">   
                        <br><p>Pássaro</p>
                        <select name="passaro" style="width:100%;">
                        <option ><?php echo $aceitaPassaro?></option>
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        
                        </select>
                        
                     </div>
                     
                     <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Fale um pouco sobre você e o ambiente para aconchego dos bichanos, diga o que achar relevante: </label>
                        <textarea name="obs"  required style="width:100%;"><?php echo $obs?></textarea>
                    </div><br>


                     <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                       <hr> <br><label><b><u>ENDEREÇO</u></b></label>
                        <p>Ele servirá para que os donos de pet consigam te encontrar.</p>

                        <b></b><label>*Rua: </label>
                        <br><input type="text" name="logradouro" required value="<?php echo $logradouro ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*CEP:</label>
                        <br><input type="text" name="cep" required pattern="(\d{2}\.?\d{3}\.?\d{3})" value="<?php echo $cep ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Número:</label>
                        <br><input type="text" name="numero" minlength="1" maxlength="4" required value="<?php echo $numero ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Bairro:</label>
                       <br> <input type="text" name="bairro" required value="<?php echo $bairro ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label for="pais">*País:</label> 
                        <br><select name="pais" style="width:100%;"> 
                         <option value="br">Brasil</option>
                         </select>
                    </div>



                    <div class="card-content-area  bg-info mb-0" style="margin-left: 2%; margin-right: 2%;">
                        <label for="estado">*Estado:</label>
                        <br><select name="estado" style="width:100%;"> 
                        <option value="sp">São paulo</option> 
                        </select>
                    </div>



                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label for="cidade">*Cidade:</label>
                        <br><select name="cidade" style="width:100%;"> 
                        <option value="americana">Americana</option> 
                        <option value="amparo">Amparo</option> 
                        <option value="arturNogueira">Artur Nogueira</option> 
                        <option value="campinas">Campinas</option> 
                        <option value="cosmopolis">Cosmópolis</option> 
                        <option value="hortolandia">Hortolândia</option> 
                        <option value="indaiatuba">Indaiatuba</option> 
                        <option value="itatiba">Itatiba</option> 
                        <option value="itupeva">Itupeva</option> 
                        <option value="jaguariuna">Jaguariuna</option> 
                        <option value="jundiai">Jundiaí</option> 
                        <option value="louveira">Louveira</option> 
                        <option value="monteMor">Monte Mor </option> 
                        <option value="novaOdessa">Nova Odessa</option> 
                        <option value="paulinia">Paulínia</option> 
                        <option value="pedreira">Pedreira</option> 
                        <option value="santaBarbara">Santa Bárbara d'Oeste</option> 
                        <option value="sumare">Sumaré</option> 
                        <option value="valinhos">Valinhos</option> 
                        <option value="vinhedo">Vinhedo</option> 
                        <option ><?php echo $cidade?></option>
                        </select>
                    </div><br>


                </div>

                <div class="card-footer bg-info mb-0" >
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" name="update" value="Salvar" id="update" style="margin-left: 31%; width:35%;">
                </div>

            </form>

        </div>
        <br><br>


<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   