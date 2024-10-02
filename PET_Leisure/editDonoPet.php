<?php


if(!empty($_GET['id'])){


    include_once('Config.php');

    $id =  $_GET['id'];

    $sqlSelect = "SELECT * FROM usuario_dono_pet WHERE id_dono_pet=$id;";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows>0){
        while($user_data = mysqli_fetch_assoc($result)){
        $email =  $user_data['email'];
        $password = $user_data['senha'];
        $cpf = $user_data['cpf'];
        $nome = $user_data['nome'];
        $telefone = $user_data['telefone'];
        $tipoAnimal1 = $user_data['tipo_animal_1'];
        $tipoAnimal2 = $user_data['tipo_animal_2'];
        $tipoAnimal3 = $user_data['tipo_animal_3'];
        $idade_animal1 = $user_data['idade_animal_1'];
        $idade_animal2 = $user_data['idade_animal_2'];
        $idade_animal3 = $user_data['idade_animal_3'];
        $nome_animal1 = $user_data['nome_animal_1'];
        $nome_animal2 = $user_data['nome_animal_2'];
        $nome_animal3 = $user_data['nome_animal_3'];
        $foto_animal1 = $user_data['imagem_animal_1'];
        $foto_animal2 = $user_data['imagem_animal_2'];
        $foto_animal3 = $user_data['imagem_animal_3'];
        $rua = $user_data['logradouro'];
        $cep = $user_data['CEP'];
        $numero = $user_data['numero'];
        $bairro = $user_data['bairro'];
        $pais = $user_data['pais'];
        $estado = $user_data['estado'];
        $cidade = $user_data['cidade'];
        $obs = $user_data['obs'];
        }
    }
    else{
        header('location: perfilDonoPet.php');
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


        <title>Cadastro de usuário dono de pet</title>
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
                

                </li>
                </ul>
              </div>
            </div>
          </nav>

</div>

        <div id="cadastro">

            <form action="saveEditDonoPet.php" method="POST"  class="card" style="margin-left: 25%; margin-right: 25%;" enctype="multipart/form-data">

            <div class="card-header bg-info mb-0">

                    <h2>Alterando dados:</h2>

                </div>

                <div class="card-content bg-info clearfix mb-0">

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                       <br> <label><u><b>DADOS DE LOGIN</b></u></label><br>
                        <label>*Email</label>
                        <br><input type="email" name="email" required id="email" value="<?php echo $email?>" readonly style="width:100%;">
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label for="password">*Senha</label>
                        <input type="password" name="password"  required minlength="6" maxlength="10" value="<?php echo $password?>" readonly style="width:100%;">
                        <small id="passwordHelpInline" class="text-white">
                            Crie uma senha com no mínimo 6 e no máximo 10 caracteres.                      
                        </small> 
                    </div>
                    <br><hr>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label><u><b>DADOS PESSOAIS</u></b></label><br>
                        <label>*Nome Completo</label>
                        <br><input type="text" name="nome" required value="<?php echo $nome?>" style="width:100%;">
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*CPF</label>
                        <input type="text" name="cpf"  
                        required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))" value="<?php echo $cpf?>" readonly style="width:100%;">
                        <small id="passwordHelpInline" class="text-white">
                            Digite seu CPF(Cadastro de Pessoa Física) sem pontos ou traços.                     
                        </small> 
                    </div>
                    <br>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                     <label>*Telefone para contato</label>
                        <input type="text" name="tel"  
                        required pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})"value="<?php echo $telefone?>" style="width:100%;"> 
                        <small id="passwordHelpInline" class="text-white">
                            Digite o número sem pontos ou traços e não se esqueça do DDD.                      
                        </small> 
                    </div>
                    <br><hr>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label><b><u>DADOS DOS PETS</u></b></label><br>
                        <label for="animal1">*Meu Animal 1 é:</label>
                        <br><select name="tipo_animal1" style="width:100%;"> 
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        <option ><?php echo $tipoAnimal1?></option> 
                        </select>
                    </div>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label for="animal2">*Meu Animal 2 é:</label>
                        <br><select name="tipo_animal2" style="width:100%;"> 
                        <option> <?php echo $tipoAnimal2?></option>
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        </select>
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label for="animal3">*Meu Animal 3 é:</label>
                        <br><select name="tipo_animal3" style="width:100%;"> 
                        <option ><?php echo $tipoAnimal3?></option> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option> 
                        </select>
                    </div>



                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Qual a idade do animal 1? (em anos)</label>
                        <br><input type="number" max="99" min="0" name="idade_animal_1" value="<?php echo $idade_animal1 ?>" required style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>Qual a idade do animal 2? (em anos)</label>
                        <br><input type="number" max="99" min="0" name="idade_animal2" value="<?php echo $idade_animal2 ?>" style="width:100%;">           
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>Qual a idade do animal 3? (em anos)</label>
                        <br><input type="number" max="99" min="0" name="idade_animal3" value="<?php echo $idade_animal3 ?>" style="width:100%;">             
                     </div>

                     <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Qual o nome do animal 1 ?</label>
                        <br><input type="text" name="nome_animal1" maxlength="20" required value="<?php echo $nome_animal1 ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>Qual o nome do animal 2 ?</label>
                        <br><input type="text"  name="nome_animal2" maxlength="20" value="<?php echo $nome_animal2 ?>" style="width:100%;">           
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>Qual o nome do animal 3 ?</label>
                        <br><input type="text"  name="nome_animal3" maxlength="20" value="<?php echo $nome_animal3 ?>" style="width:100%;">             
                    </div> 

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Fale um pouco sobre o/os bichano/os, diga o que achar relevante, como alguma alergia, doença ou costumes: </label>
                        <br><textarea name="obs"  required style="width:100%;"><?php echo $obs ?></textarea>
                    </div>
                    <br><hr>


                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label><b><u>ENDEREÇO</u></b></label>
                        <p>Fique tranquilo, pois seu endereço não ficará disponível para os prestadores de serviço.</p>

                        <b></b><label>*Rua: </label>
                        <br><input type="text" name="logradouro" required value="<?php echo $rua ?>" style="width:100%;">
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
                        <br><input type="text" name="bairro" required value="<?php echo $bairro ?>" style="width:100%;">
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label for="pais">*País:</label> 
                        <br><select name="pais" style="width:100%;"> 
                        <option value="br">Brasil</option>
                        </select>
                    </div>



                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
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
   