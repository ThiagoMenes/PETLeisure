create database pet_leisure_bd;
use pet_leisure_bd;

-- Usuário dono de Pet
create table usuario_dono_pet(
id_dono_pet int(100) auto_increment PRIMARY KEY,
cpf varchar(11) NOT NULL UNIQUE, 
email varchar(100) NOT NULL UNIQUE,
senha varchar(255) NOT NULL,
nome varchar(50) NOT NULL,
telefone varchar(13) NOT NULL,
tipo_animal_1 varchar(20) NOT NULL,
tipo_animal_2 varchar(20) NOT NULL,
tipo_animal_3 varchar(20) NOT NULL,
nome_animal_1 varchar(20) NOT NULL,
nome_animal_2 varchar(20) NOT NULL,
nome_animal_3 varchar(20) NOT NULL,
idade_animal_1 varchar(3) NOT NULL,
idade_animal_2 varchar(3) NOT NULL,
idade_animal_3 varchar(3) NOT NULL,
logradouro varchar(80) NOT NULL,
CEP varchar(8) NOT NULL,
numero varchar(4) NOT NULL,
bairro varchar(20) NOT NULL,
pais varchar(6) NOT NULL,
estado varchar(25) NOT NULL,
cidade varchar(35) NOT NULL,
imagem_animal_1 varchar(30) NOT NULL,
imagem_animal_2 varchar(30) NOT NULL,
imagem_animal_3 varchar(30) NOT NULL,
obs varchar(2000) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP); 

-- Tabela Prestador de serviço
create table usuario_prest_serv(
id_prest_serv int(100) auto_increment PRIMARY KEY,
docIdentidade  varchar(11) NOT NULL UNIQUE, 
email varchar(100) NOT NULL UNIQUE,
senha varchar(255) NOT NULL,
nome varchar(50) NOT NULL,
telefone varchar(13) NOT NULL,
perfil varchar(20) NOT NULL,
hospedagem varchar(5) NOT NULL,
creche varchar(5) NOT NULL,
qtdAnimaisAceitos varchar(2) NOT NULL,
aceita_gato varchar(5) NOT NULL,
aceita_cachorro varchar(5) NOT NULL,
aceita_passaro varchar(5) NOT NULL,
logradouro varchar(80) NOT NULL,
CEP varchar(8) NOT NULL,
numero varchar(4) NOT NULL,
bairro varchar(50) NOT NULL,
pais varchar(6) NOT NULL,
estado varchar(25) NOT NULL,
cidade varchar(35) NOT NULL,
certificacao varchar(30) NOT NULL,
precoReserva float(5.00) not null,
imagem_local_1 varchar(30) ,
imagem_local_2 varchar(30) ,
imagem_local_3 varchar(30) ,
obs varchar(2000) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP);

-- Criando a tabela de Reservas
create table reserva(
	n_reserva int(100) primary key auto_increment,
    id_dono_pet int(100) NOT NULL,
    id_prest_serv int(100) NOT NULL,
    tipo_animal varchar(20) NOT NULL,
    tipo_reserva varchar(20) NOT NULL,
    observacoes varchar (500) NOT NULL,
    `data` datetime not null
);
-- criando a tabela imagem Prestador de serviços
CREATE TABLE IF NOT EXISTS imagem_Prest (
  id int not null auto_increment primary key,
  perfil varchar(60) not null,
  id_prestServ int not null,
  calendar datetime not null
);

-- Criando a tabela imagem dono de Pet
CREATE TABLE IF NOT EXISTS imagem_Pet (
  id int not null primary key auto_increment,
  imagem_perfil varchar(60) not null,
  id_donoPet int not null,
  calendar datetime NOT NULL
); 
-- Criando a tabela comentários.
create table comentarios(
id_comentario  int (100) primary key auto_increment, 
email varchar (100) NOT NULL,
id_prestserv int (100) NOT NULL,
nomeDonoPet varchar (50) NOT NULL,
mensagem varchar (800) NOT NULL, 
timestamp timestamp DEFAULT CURRENT_TIMESTAMP); 

-- efetuando as consultas nas tabelas.

SELECT * FROM usuario_dono_pet;

select * from usuario_prest_serv;

select * from reserva; 

select * from comentarios;

select *from imagem_Pet;

select * from imagem_Prest;
