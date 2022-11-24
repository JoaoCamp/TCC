CREATE TABLE usuario(
    idusuario   serial NOT NULL,
    tipousuario character varying(20),
    nome        character varying(120),
    email       character varying(100),
    senha       character varying(200),
    telefone    character varying(25),
    CONSTRAINT pkusuario PRIMARY KEY (idusuario)
);

select*from usuario;
drop table usuario;

--------------------------------------------------

CREATE TABLE evento(
    idevento    serial NOT NULL,
    idusuario	int,
    nomeevento	varchar(100),
    banner      bytea, 
    tipo	varchar(100)    NOT NULL,
    dataevento  date,
    hora        time, 
    descricao   character varying(1000),
    telefone    character varying(15),
    emailevento character varying(100),
    preco       real,
    ruanum      character varying(200),
    cidade      character varying(50),
    bairro      character varying(50),
    pais        character varying(30),
    estado      character varying(30),
    cep         int,
    CONSTRAINT pkevento PRIMARY KEY (idevento),
    CONSTRAINT fkusuario FOREIGN KEY (idusuario)
    REFERENCES usuario(idusuario)
    ON DELETE CASCADE

);

select * from evento

select nomeevento, banner FROM evento

select idevento, nomeevento, dataevento, hora, descricao, telefone, emailevento, preco FROM evento order by idevento

drop table evento;

-- em andamento, de HOJE
select idevento, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
            estado, cep, descricao, telefone, emailevento, preco FROM evento 
             where dataevento = CURRENT_DATE
            order by idevento

-- passanos MENOR que hOJE
select idevento, nomeevento, dataevento, hora, ruanum, cidade, bairro, pais,
            estado, cep, descricao, telefone, emailevento, preco FROM evento 
             where dataevento < CURRENT_DATE
            order by idevento

--------------------------------------------------

CREATE TABLE imagens(
   idimg                serial          NOT NULL,
   idevento		int,
   nome                 varchar(300)    NOT NULL,
   tipo                 varchar(100)    NOT NULL,
   tamanho              varchar(100)    NOT NULL,
   imagem               bytea           NOT NULL, 
   CONSTRAINT pk_idimg_arquivo PRIMARY KEY (idimg),
   CONSTRAINT fkidevento_evento FOREIGN KEY (idevento)
   REFERENCES evento(idevento)	
);

select*from imagens;
drop table imagens;


select idimg, nome, tipo, tamanho, imagem FROM imagens order by idimg




