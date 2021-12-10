create database db_finaloneminute;
use db_finaloneminute;

create table tblUsuario (
	idUsuario int not null auto_increment primary key,
		unique index (idUsuario),
	nome varchar(100) not null,
    email varchar(100) not null,
    dataNascimento date not null,
    senha varchar(20) not null
);

create table tblPesquisa (
	idPesquisa int not null auto_increment primary key,
		unique index (idPesquisa),
	pergunta varchar(200) not null
);

create table tblResposta (
	idResposta int not null auto_increment primary key,
		unique index (idResposta),
	resposta varchar(20) not null
);

create table tblPesquisaResposta (
	idPesquisaResposta int not null auto_increment primary key,
		unique index (idPesquisaResposta),
	idPesquisa int not null,
		constraint FK_tblPesquisa_tblPesquisaResposta
		foreign key (idPesquisa)
		references tblPesquisa(idPesquisa),
	idResposta int not null,
		constraint FK_tblResposta_tblPesquisaResposta
		foreign key (idResposta)
		references tblResposta(idResposta)
);

create table tblComentario (
	idComentario int not null auto_increment primary key,
		unique index (idComentario),
	comentario varchar (500)
);



insert into tblusuario (nome, email, dataNascimento, senha) values
					   ('Bruna', 'bruna@gmail.com', '2005-05-09', '1234');
                       
insert into tblPesquisa (pergunta) values
						('Qual foi sua experiência com a vacina?'),
                        ('Qual foi o grau da sua reação?'),
						('Você se sente seguro(a) pra tomar a 2° dose da nossa vacina?'),
						('Qual o grau da sua satisfação no atendimento no posto de saúde?'),
						('Qual o grau da sua satisfação com a Médi Cura?');