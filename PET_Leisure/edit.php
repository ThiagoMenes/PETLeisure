<?php


if(!empty($_GET['cpf'])){


    include_once('Config.php');

    $cpf1 =  $_GET['cpf'];

    $sqlSelect = "SELECT * FROM usuario_dono_pet WHERE cpf='$cpf1'";

    $result = $conexao->query($sqlSelect);

    print_r($result);


    $email =  $_POST['email'];
    $password = $_POST['password'];
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $telefone = $_POST['tel'];
    $tipoAnimal1 = $_POST['tipo_animal1'];
    $tipoAnimal2 = $_POST['tipo_animal2'];
    $tipoAnimal3 = $_POST['tipo_animal3'];
    $idade_animal1 = $_POST['idade_animal1'];
    $idade_animal2 = $_POST['idade_animal2'];
    $idade_animal3 = $_POST['idade_animal3'];
    $nome_animal1 = $_POST['nome_animal1'];
    $nome_animal2 = $_POST['nome_animal2'];
    $nome_animal3 = $_POST['nome_animal3'];
    $foto_animal1 = $_POST['foto_animal1'];
    $foto_animal2 = $_POST['foto_animal2'];
    $foto_animal3 = $_POST['foto_animal3'];
    $rua = $_POST['rua'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $obs = $_POST['obs'];


       
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
        <link href="css/bootstrap.css" rel="stylesheet">


        <center> <img src="img/top.png" alt="Imagem do topo." width="100%"></center>

        <title>Cadastro de usuário dono de pet</title>

    </head>

    <body>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                <li><a href="barra de ferramentas.php">Home</a></li>  
                <li><a href="loginUsuario.php">Dono de Pet</a></li>
                <li><a href="loginPrestServ.php">Prestador de serviços</a></li>
                <li><a href="cadastro.php">Novo por aqui?</a></li>
                <li><a href="info.php">Sobre Nós!</a></li>

                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>

        <div id="cadastro">

            <form action="loginUsuario.html" method="POST"  class="card1" >

                <div class="card-header">

                    <h2>Cadastro de Usuário Dono de Pet </h2>

                </div>

                <div class="card-content">

                    <div class="card-content-area">

                        <label>DADOS DE LOGIN</label>
                        <label>*Email</label>
                        <input type="email" name="email" required >

                    </div>


                    <div class="card-content-area">

                        <label for="password">*Senha</label>
                        <p>Crie uma senha com no mínimo 6 e no máximo 10 caracteres.</p>
                        <input type="password" name="password"  required minlength="6" maxlength="10">

                    </div>
                    <br><br>

                    <div class="card-content-area">

                        <br><br><label>DADOS PESSOAIS</label>
                        <label>*Nome Completo</label>
                        <input type="text" name="nome" required>

                    </div>


                    <div class="card-content-area">

                        <label>*CPF</label>
                        <p>Digite seu CPF(Cadastro de Pessoa Física) sem pontos ou traços.</p>
                        <input type="text" name="cpf"  
                        required pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2}))">

                    </div>
                    <br>

                    <div class="card-content-area">

                     <label>*Telefone para contato</label>
                        <p>Digite o número sem pontos ou traços e não se esqueça do DDD.</p>
                        <input type="text" name="tel"  
                        required pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})">

                    </div>
                    <br>


                    <div class="card-content-area">
                        <label>DADOS DOS PETS</label>
                        <label for="animal1">*Meu Animal 1 é:</label></div>
                        <select name="tipo_animal1"> 
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>  
                        </select>


                    <div class="card-content-area">

                        <label for="animal2">*Meu Animal 2 é:</label></div>
                        <select name="tipo_animal2"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>
                        </select>

                    <div class="card-content-area">

                        <label for="animal3">*Meu Animal 3 é:</label></div>
                        <select name="tipo_animal3"> 
                        <option value="nao_tem">Não tenho</option>
                        <option value="cachorro">Cachorro</option> 
                        <option value="gato">Gato</option> 
                        <option value="passaro">Pássaro</option>   
                        </select>

                        <br><br><br>


                    <div class="card-content-area">

                        <label>*Qual a idade do animal 1? (em anos)</label>
                        <input type="number" max="99" min="0" name="idade_animal1" required>

                    </div>

                    <div class="card-content-area">

                             <label>Qual a idade do animal 2? (em anos)</label>
                             <input type="number" max="99" min="0" name="idade_animal2" >           

                    </div>

                    <div class="card-content-area">

                               <label>Qual a idade do animal 3? (em anos)</label>
                               <input type="number" max="99" min="0" name="idade_animal3">             

                     </div><br><br>




                     <div class="card-content-area">

                        <label>*Qual o nome do animal 1 ?</label>
                        <input type="text" name="nome_animal1" maxlength="20" required>

                    </div>
                    <div class="card-content-area">

                        <label>Qual o nome do animal 2 ?</label>
                        <input type="text"  name="nome_animal2" maxlength="20">           

                    </div>

                    <div class="card-content-area">

                        <label>Qual o nome do animal 3 ?</label>
                        <input type="text"  name="nome_animal3" maxlength="20">             

                     </div> <br><br>

                    <div class="card-content-area">
                        <label>Nos envie fotos do animal 1: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file" accept=".jpg, .jpeg, .png" name="foto_animal1" multiple required>
                    </div>
                    <br>  

                    <div class="card-content-area">
                        <label>Nos envie fotos do animal 2: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file" accept=".jpg, .jpeg, .png" name="foto_animal2" multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">

                        <label>Nos envie fotos do animal 3: </label>
                        <p>Pressione (ctrl) no windowns e (Command)no mac para selecionar multiplos arquivos</p>
                        <input type="file"  accept=".jpg, .jpeg, .png" name="foto_animal3" multiple>
                    </div>
                    <br> <br>


                    <div class="card-content-area">

                        <br><br><br><label>ENDEREÇO</label>
                        <p>Fique tranquilo, pois seu endereço não ficará disponível para os prestadores de serviço.</p>

                        <b></b><label>*Rua: </label>
                        <input type="text" name="rua" required>

                    </div>

                    <div class="card-content-area">

                        <label>*CEP:</label>
                        <input type="text" name="cep" required pattern="(\d{2}\.?\d{3}\.?\d{3})">

                    </div>

                    <div class="card-content-area">

                        <label>*Número:</label>
                        <input type="text" name="numero" minlength="1" maxlength="4" required>

                    </div>

                    <div class="card-content-area">

                        <label>*Bairro:</label>
                        <input type="text" name="bairro" required>

                    </div>

                    <div class="card-content-area">

                        <label for="pais">*País:</label> </div>
                        <select name="pais"> 
                         <option value="br">Brasil</option> 
                         </select>



                    <div class="card-content-area">

                        <label for="estado">*Estado:</label></div>
                        <select name="estado"> 
                        <option value="sp">São paulo</option> 
                        </select>



                    <div class="card-content-area">

                        <label for="cidade">*Cidade:</label></div>
                        <select name="cidade"> 
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
                        </select>



                    <div class="card-content-area">
                        <label>*Fale um pouco sobre o/os bichano/os, diga o que achar relevante, como alguma alergia, doença ou costumes: </label>
                        <textarea name="obs"  required></textarea>
                    </div>



                </div>

                <div class="card-footer">

                    <input type="submit" name="submit" value="Cadastrar" class="submit">
                </div>

            </form>




        </div>

    </body>

</html>