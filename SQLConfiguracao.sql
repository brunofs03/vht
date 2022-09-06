CREATE TABLE `usuarios` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `email` VARCHAR (60) NOT NULL,
  `nome` VARCHAR (40) NOT NULL,
  `sobrenome` VARCHAR (80) NULL,
  `telefone` VARCHAR (15) NULL,
  `senha` VARCHAR(300) NOT NULL,
  `Perfil` INT NOT NULL
);

CREATE TABLE `log_usuarios` (
  `id_usuario` Int NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `email` VARCHAR (60) NOT NULL,
  `tipo` VARCHAR (15) NOT NULL,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`)
);

CREATE TABLE `quartos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `preco_diaria` FLOAT NOT NULL,
  `num_quarto` INT NOT NULL,
  `disponibilidade` VARCHAR (15) NULL,
  `classificacao` INT NOT NULL,
  `link` VARCHAR (100) NULL,
  `descricao` VARCHAR (500) NULL DEFAULT NOW()
);

CREATE TABLE `agendamentos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_quarto` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `nome` VARCHAR (40) NOT NULL,
  `sobrenome` VARCHAR (80) NOT NULL,
  `cpf` VARCHAR (15) NOT NULL,
  `data_nascimento` DATE NULL,
  `endereco` VARCHAR (100) NULL,
  `cidade` VARCHAR (50) NULL,
  `cep` VARCHAR (20) NOT NULL,
  `email` VARCHAR (50) NOT NULL,
  `telefone` VARCHAR (20) NULL,
  `celular` VARCHAR (20) NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`),
  FOREIGN KEY (`id_quarto`) REFERENCES `quartos`(`id`)
);

CREATE TABLE `pagamentos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_agendamento` INT NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `tipo` INT NOT NULL,
  `preco_diaria` FLOAT NOT NULL,
  `preco_total` FLOAT NOT NULL,
  `status` INT NOT NULL DEFAULT  0,
  FOREIGN KEY (`id_agendamento`) REFERENCES `agendamentos`(`id`)
);

CREATE TABLE `log_senha` (
  `id_usuario` Int NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT NOW(),
  `token` VARCHAR (50) NOT NULL,
  `status` INT NOT NULL DEFAULT 0,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`)
);