Create table users(
    id int primary key not null AUTO_INCREMENT,
    username varchar(100),
    password varchar(750),
    first_name varchar(500),
    last_name varchar(500)
);

create table quartos(
    id_quarto int primary key not null AUTO_INCREMENT,
    preco_diaria varchar(30),
    num_quarto int,
    disponibilidade varchar(30),
    estrelas int,
    link varchar(200),
    descricao varchar(500)
);

create table tb_agendamentos(
	id int primary key AUTO_INCREMENT,
	id_quarto int,
    id_criador int,
	data_criacao datetime,
	txtNome varchar(300),
	txtSobrenome varchar(300),
	txtCpf varchar(300),
	dateDataNascimento varchar(300),
	txtEndereco varchar(300),
	txtCidade varchar(300),
	txtCep varchar(300),
	txtEmail varchar(300),
	txtTelefone varchar(300),
	txtCelular varchar(300),
	dt_inicio date,
	dt_fim date
);

 create table tb_pagamentos(
	id int PRIMARY KEY AUTO_INCREMENT,
	id_agendamento int,
	payment varchar(300),
    cardholder varchar(300),
    dateVencimento varchar(300),
    verification varchar(300),
    cardnumber varchar(300),
	numPix varchar(300),
    preco_diaria varchar(300),
    preco_total varchar(300)
);

create table gestao_logins(
    id int primary key AUTO_INCREMENT not null,
    id_user int not null,
    email varchar(100) not null,
    tipo varchar (50) not null,
    data_criacao datetime
);

CREATE TABLE `user_funcionario` (  
    `id_func` int(11) NOT NULL AUTO_INCREMENT,  
    `nome` varchar(255) NOT NULL,  
    `email` varchar(100) NOT NULL,  
    `senha` varchar(100) NOT NULL,  
    `telefone` varchar(15) DEFAULT NULL,  
    `data_criacao` date DEFAULT curdate(),  
    PRIMARY KEY (`id_func`) 
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4

insert into user_funcionario(
    nome,  
    email,  
    senha,  
    telefone,  
    data_criacao
)values(
    'Vht Funcionario',  
    'vht@administrator.com',  
    '$2y$10$DGArxOW7SdyS1QH0/KNe9epOO81.LbAb3EkcB06kfFX3nVBDhX0Ta',  
    '(11) 12345-6789',  
    now()
);

insert into users(
    username,  
    password,  
    first_name,  
    last_name
)values(
    'vhtUsuario@hotmail.com',  
    '$2y$10$DGArxOW7SdyS1QH0/KNe9epOO81.LbAb3EkcB06kfFX3nVBDhX0Ta',  
    'Usuario',  
    'Comum'
);




-- Quartos


insert into quartos(
	preco_diaria,
	num_quarto,
	disponibilidade,
	estrelas,
	link,
	descricao
)values(
	99.99,
	'901',
	'Disponível',
	3,
	'http://www.diariodeviagem.com/wp-content/uploads/2015/07/18.jpg',
	'Suíte simples com duas camas de solteiro e sacada ampla com vista privilegiada para grande parte da visão paradisíaca do hotel. Gabinete amplo com banheira pequena e pia germinada.'
);

insert into quartos(
	preco_diaria,
	num_quarto,
	disponibilidade,
	estrelas,
	link,
	descricao
)values(
	229.99,
	'802',
	'Ocupado',
	5,
	'https://b9g6i2e6.stackpathcdn.com/wp-content/uploads/2019/04/hoteis-de-luxo-medellin.jpg',
	'Quarto rustico com cama queen e espelho cobrindo completamente a parede central. Jacuzzi germinada na parte posterior da pequena sala de estar. Café da manha e jantar gourmet totalmente inclusos.'
);

insert into quartos(
	preco_diaria,
	num_quarto,
	disponibilidade,
	estrelas,
	link,
	descricao
)values(
	229.99,
	'701',
	'Disponível',
	4,
	'http://s.glbimg.com/es/ge/f/620x470/2011/11/24/dsc_0728_picnik.jpg',
	'quarto minimalista com cama casal e um confortável sofá retrátil de três lugares para acomodar família pequena. Banheiro simples de duas pias e uma ducha pequena.'
);

insert into quartos(
	preco_diaria,
	num_quarto,
	disponibilidade,
	estrelas,
	link,
	descricao
)values(
	109.99,
	'501',
	'Disponível',
	3,
	'http://s.glbimg.com/es/ge/f/620x470/2011/11/24/dsc_0728_picnik.jpg',
	'Com uma belíssima cama queen size, a suíte vem acompanhada de um amplo banheiro com banheira simples para capacidade de apenas uma pessoa. Jantar gourmet incluso, com todas as outras refeições com 50% de desconto.'
);

insert into quartos(
	preco_diaria,
	num_quarto,
	disponibilidade,
	estrelas,
	link,
	descricao
)values(
	49.99,
	'203',
	'Disponível',
	1,
	'https://cf.bstatic.com/images/hotel/max1024x768/147/147126143.jpg',
	'Suite simples com três camas de solteiro, sacada ampla com vitro. banheiro pequeno com banheira e uma televisão com filmes inclusos.'
);

create table tb_redefinicao_senha(
	id_user int,
    token varchar(50),
    status int
)