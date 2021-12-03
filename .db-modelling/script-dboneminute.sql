use db_oneminute;

create table tblNota (
	idNota int not null auto_increment primary key,
		unique index(idNota),
	nome int not null
);

create table tblLocal (
	idLocal int not null auto_increment primary key,
		unique index (idLocal),
	nome varchar(70)
);

create table tblVacina (
	idVacina int not null auto_increment primary key,
		unique index (idVacina),
	nome varchar(70)
);

create table tblComentario (
	idComentario int not null auto_increment primary key,
		unique index (idComentario),
	comentario varchar(400) not null,
    
    idNota int not null,
		constraint FK_tblNota_tblComentario
		foreign key (idNota)
        references tblNota(idNota),
        
	idVacina int,
		constraint FK_tblVacina_tblComentario
		foreign key (idVacina)
        references tblVacina(idVacina)
);

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
	idLocal int not null,
		constraint FK_tblLocal_tblPesquisa
		foreign key (idLocal)
		references tblLocal(idLocal),
	idVacina int not null,
		constraint FK_tblVacina_tblPesquisa
		foreign key (idVacina)
		references tblVacina(idVacina),
    idUsuario int not null,
		constraint FK_tblUsuario_tblPesquisa
		foreign key (idUsuario)
		references tblUsuario(idUsuario)
);

create table tblpergunta (
	idPergunta int not null auto_increment primary key,
		unique index (idPergunta),
	pergunta varchar(200)
);

create table tblPesquisaPergunta (
	idPesquisaPergunta int not null auto_increment primary key,
		unique index (idPesquisaPergunta),	
	idPesquisa int not null,
		constraint FK_tblPesquisa_tblPesquisaPergunta
		foreign key (idPesquisa)
		references tblPesquisa(idPesquisa),
	idPergunta int not null,
		constraint FK_tblPergunta_tblPesquisaPergunta
		foreign key (idPergunta)
		references tblPergunta(idPergunta)
);

create table tblResposta (
	idResposta int not null auto_increment primary key,
		unique index (idResposta),
	resposta varchar(500),
    idPergunta int not null,
		constraint FK_tblPergunta_tblResposta
		foreign key (idPergunta)
		references tblPergunta(idPergunta),
	idUsuario int not null,
		constraint FK_tblUsuario_tblResposta
		foreign key (idUsuario)
		references tblUsuario(idUsuario)
);



















