<?php


if(isset($_POST['submit'])){


    include_once('Config.php');

        $email =  $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $nome = $_POST['nome'];
        $docIdentidade = $_POST['docIdentidadePrest'];
        $telefone = $_POST['tel'];
        //$perfil = $_POST['perfil'];
        $hospedagem = $_POST['hospedagem'];
        $creche = $_POST['creche'];
        $qtdAnimais = $_POST['qtdAnimais'];
        //$certificacao = $_POST['certificacao'];
        //$local = $_POST['local'];
        $precoReserva = $_POST['precoReserva'];
        $cachorro = $_POST['cachorro'];
        $gato = $_POST['gato'];
        $passaro = $_POST['passaro'];
        $rua = $_POST['rua'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $pais = $_POST['pais'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $obs = $_POST['obs'];


        $result = mysqli_query($conexao, "INSERT INTO usuario_prest_serv(docIdentidade,email,senha,nome,telefone,perfil,hospedagem,creche,qtdAnimaisAceitos,aceita_gato,aceita_cachorro,aceita_passaro,logradouro,CEP,numero,bairro,pais,estado,cidade,certificacao,precoReserva,imagem_local_1,obs)  
        VALUES ($docIdentidade,'$email','$password','$nome','$telefone',' ','$hospedagem','$creche','$qtdAnimais','$gato','$cachorro','$passaro','$rua','$cep','$numero','$bairro','$pais','$estado','$cidade',' ','$precoReserva',' ','$obs') ");
        


        $msg = false;

        
        if(isset($_FILES['perfil'])){
                    
                 $extensao = strtolower(substr($_FILES['perfil']['name'], -4)); //pega a extensão
                 $novo_nome = md5(time()).$extensao; //define o nome do arquivo
                 $diretorio = "uploads/";//define o diretorio para onde enviaremos o arquivo
                 move_uploaded_file($_FILES['perfil']['tmp_name'], $diretorio.$novo_nome); //efetua o upload   
                
        

                    $sql_codes = "INSERT INTO imagem_Prest (id, perfil, id_prestServ, calendar) VALUES (null, '$novo_nome', 0, now());"; 
                
                    $atualizados = "UPDATE imagem_Prest set id_prestServ = (SELECT id_prest_serv FROM usuario_prest_serv WHERE id_prest_serv order by id_prest_serv desc limit 1) where id order by id desc limit 1;";

                    if(mysqli_query($conexao, $sql_codes)){
                        $msg = "Arquivo enviado com sucesso!";
                    }else{
                        $msg = "Falha ao enviar arquivo!";
                    }
                        echo $msg;

                    if(mysqli_query($conexao, $atualizados)){
                        $msg = "Atualizado";
                    }else{
                        $msg = "Falha";
                    }
                        echo $msg;
        }
                
        
        header('Location: loginPrestServ.php');

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
        <!-- <script type="text/javascript" src="/js/jquery.min.js"> </script>
             <script type="text/javascript" src="/js/bootstrap.min.js"> </script>-->


             <center> <img src="img/top.png" alt="Imagem do topo." width="100%" ></center>

        <style type="text/css">
           #update{
                background-image: linear-gradient(to right, rgb(0,40,190), rgb(20,50,180));
                width:50%;
                border: none;
                padding: 15px;
                color:white;
                font: size 15px;
                cursor: pointer;
                border-radius:10px;
            }
            #update:hover{
                background-image:linear-gradient(to right,rgb(10,20,80), rgb(10,20,80));
            }
           a{
                color: #00008b;
            }
        </style>

        <title>Cadastro do Prestador de Serviços</title>

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
               
                <li><a href="index.php">Home</a></li>  
                <li><a href="loginUsuario.php">Dono de Pet</a></li>
                <li><a href="loginPrestServ.php">Prestador de serviços</a></li>
                <li><a href="cadastro.php">Novo por aqui?</a></li>
                <li><a href="info.php">Sobre Nós!</a></li>
                  
                </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
</div>

        <div id="cadastro">

            <form action="cadastroPrest.php" method="POST"   class="card" style="margin-left: 25%; margin-right: 25%;" enctype="multipart/form-data">

            <div class="card-header bg-info mb-0">

                    <h2>Cadastro para Prestar Serviços</h2>

                </div>

                <div class="card-content bg-info clearfix mb-0">

                <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                       
                        <br><label><u><b>DADOS DE LOGIN</b></u></label><br>
                        <br><label>*Email</label>
                        <br><input type="email" name="email" required style="width:100%;">

                    </div>
                    
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                        <br><label for="password">*Senha</label>
                        <br><input type="password" name="password"  required style="width:100%;" minlength="6" maxlength="10" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-white">
                         Crie uma senha com no mínimo 6 e no máximo 10 caracteres.
                        </small> 
                        <br> <hr>  
                    </div>
                    
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                    
                        <br><label><u><b>DADOS PESSOAIS</b></u></label><br>
                        <br><label>*Nome Completo</label>
                        <br><input type="text" name="nome" required style="width:100%;">
                        <br><small id="passwordHelpInline" class="text-white">
                        Nome completo da pessoa que irá prestar o serviço ou o nome da instituição se for o caso.
                        </small> 
                    
                    </div>
                     

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                        <br><label>*CPF ou CNPJ</label>
                        <br><input type="text" name="docIdentidadePrest"  
                        required style="width:100%;" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})">
                        <br><small id="passwordHelpInline" class="text-white">
                        Digite seu CPF(Cadastro de Pessoa Física) ou CNPJ(Cadastro Nacional de Pessoa Jurídica) para instituições.
                        </small> 
                    </div>
                    <br>
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                     <label>*Telefone para contato</label>
                        <br><input type="text" name="tel"  
                        required style="width:100%;" pattern="(\d{2}\.?\d{1}\.?\d{4}-?\d{4})">
                        <br><small id="passwordHelpInline" class="text-white">
                        Digite o número sem pontos ou traços e não se esqueça do DDD.
                        </small> 
                    </div>
                    <br>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Nos envie imagem sua ou de sua logo para servir de perfil:</label>
                        <br><input type="file" accept=".png, .jpg" name="perfil"  required style="width:100%;"  aria-describedby="passwordHelpInline">
                        
                    </div>
                    <hr>


                <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;"> 
                    <br><label><u><b>SOBRE OS PETS</b></u></label><br><br>
                    
                    <label >*Quais serviços você ira fornecer?</label>
                    <small id="passwordHelpInline" class="text-white">
                    Hospedagem/Diária                        
                    </small>
                    <br><select name="hospedagem" style="width:100%;"> 
                        <option value="sim" >Sim</option>
                        <option value="nao" >Não</option> 
                    </select>
                    
                    <br><br>
                    <small id="passwordHelpInline" class="text-white">
                    Creche/Semanal ou Mensal                        
                    </small>
                    <br><select name="creche" style="width:100%;">  
                        <option value="sim" >Sim</option>
                        <option value="nao" >Não</option> 
                    </select>
                    <br>
                </div>
                    
                   
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Quantos animais no total o local tem condições de acomodar por dia?</label>
                        <br><input type="number" max="10" min="1" name="qtdAnimais" required style="width:100%;">
                    </div>
                    <br> 

                   <!-- <div class="card-content-area">
                        <label>Se houver, nos envie certificações ou experiências relacionadas na area: </label>
                        <input type="file" name="certificacao" multiple>
                    </div>
                    <br> 

                    <div class="card-content-area">
                        <label>*Nos envie imagens do local onde será realizado os trabalhos:</label>
                        <input type="file" name="local" required multiple>
                    </div>
                    <br> -->

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                    <label>*Quanto irá cobrar pelos Serviços?</label>
                    <br><input type="text" name="precoReserva" required style="width:100%;">
                    <small id="passwordHelpInline" class="text-white">
                    (digite apenas os números, em R$)                      
                    </small>     
                </div><br>

                <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <label>*Quais animais são aptos a usufruir desse local? </label>
                        <p>Cachorro</p>
                        <select name="cachorro" style="width:100%;">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        </select>
                        <br><br>
                        <p>Gato</p>
                        <select name="gato" style="width:100%;">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        </select>
                        <br><br>
                        <p>Pássaro</p>
                        <select name="passaro" style="width:100%;">
                        <option value="sim">Sim</option>
                        <option value="nao" >Não</option>
                        </select>
                        <br>
                    </div>
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label>*Fale um pouco sobre você e o ambiente para aconchego dos bichanos, diga o que achar relevante: </label>
                       <br> <textarea name="obs"  placeholder="Mensagem" required style="width:100%;" ></textarea>
                    </div>
                    <hr>
                    

                        <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                       <br> <b><label><u>ENDEREÇO</u></label><br></b><br>
                        <label>*Rua: </label>
                        <br><input type="text" name="rua" required style="width:100%;">
                    
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                    
                        <br><label>*CEP:</label>
                        <br><input type="text" name="cep" required style="width:100%;" pattern="(\d{2}\.?\d{3}\.?\d{3})">
                   
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                    
                        <br><label>*Número:</label>
                        <br><input type="text" name="numero" minlength="1" maxlength="4" required style="width:100%;" >
                   
                    </div>

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                        <br><label>*Bairro:</label>
                        <br><input type="text" name="bairro" required style="width:100%;">
                    
                    </div>
                    
                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">

                        <br><label for="pais">*País:</label> 
                        <select name="pais" style="width:100%;"> 
                         <option value="br">Brasil</option> 
                         </select>
                    </div>
    
                   

                    <div class="card-content-area  bg-info mb-0"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label for="estado">*Estado:</label>
                        <br><select name="estado" style="width:100%;"> 
                        <option value="sp">São paulo</option> 
                        </select>
                    </div>

                    

                    <div class="card-content-area  bg-info mb-3"  style="margin-left: 2%; margin-right: 2%;">
                        <br><label for="cidade">*Cidade:</label>
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
                        </select>
                    </div>
                    

                    
                </div>

                <div class="card-footer bg-info mb-0" >
                <br><center><input type="submit" class="btn btn-primary" name="submit" value="enviar" class="submit" style="width:30%;"></center><br>                
                </div>
            </form>
        </div>
        <br><br>


<!-- RODAPE -->

<?php
 include('rodape.php');
 ?>
   