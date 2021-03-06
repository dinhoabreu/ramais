use comas;
create table participantes (
	id int(10) auto_increment primary key,
	poder_publico varchar(100),
	sociedade_civil varchar(150),
	servico_atendido varchar(255),
	nome varchar(255),
	cep varchar(100),
	endereco varchar(150),
	bairro varchar(150),
	numero int(10),
	cidade varchar(250),
	uf varchar(5),
	doc_identidade int(20),
	cpf int(20),
	telefone int(20),
	celular int(20),
	email varchar(255),
	idade int(10),
	nascimento int(10),
	sexo varchar(100),
	escolaridade varchar(100),
	formacao varchar(255),
	area_atuacao varchar(255),
	alguma_deficiencia varchar(10),
	qual varchar(255),
	servicos_especiais varchar(10),
	quais varchar(255),
	partipou_conferencia_municipal varchar(10),
	partipou_conferencia_estadual varchar(10)
) engine=InnoDB;
