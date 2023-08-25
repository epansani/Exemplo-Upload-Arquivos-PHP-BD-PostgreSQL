CREATE TABLE arquivo
(
   id_arquivo           serial          NOT NULL,
   descricao            varchar(300)    NOT NULL,
   data_envio           timestamp       NOT NULL DEFAULT now(),
   nome                 varchar(300)    NOT NULL,
   tipo                 varchar(100)    NOT NULL,
   tamanho              varchar(100)    NOT NULL,
   dados_arquivo        bytea           NOT NULL, 
   CONSTRAINT pk_id_arquivo PRIMARY KEY (id_arquivo)	
);
