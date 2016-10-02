drop database music_store;
create database music_store;
use music_store;

CREATE TABLE nivel_acesso (
    cod_Niv INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nivel_acesso VARCHAR(10) NOT NULL
);
insert into nivel_acesso(nivel_acesso) values ('Usuario');
insert into nivel_acesso(nivel_acesso) values ('Admin');


CREATE TABLE funcionario (
    cod_func INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome CHAR(40) NOT NULL,
    cpf BIGINT NOT NULL,
    rg BIGINT NOT NULL,
    dtnasc DATE NOT NULL
);
insert into funcionario values (null,'davi',1234567,12345,'1996/03/18');
insert into funcionario values (null,'gabriel',1234567,12345,'1996/03/18');

CREATE TABLE usuario (
    cod_user INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario CHAR(40) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    cod_niv INT,
    cod_func INT,
    FOREIGN KEY (cod_niv)
        REFERENCES nivel_acesso (cod_niv)
                       ON DELETE CASCADE,

    FOREIGN KEY (cod_func)
        REFERENCES funcionario (cod_func)
        ON DELETE CASCADE
);

select * from usuario;


CREATE TABLE cliente (
    cod_cli INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_cli VARCHAR(40) NOT NULL,
    cpf BIGINT NOT NULL,
    rg BIGINT NOT NULL,
    dtnasc DATE NOT NULL
);

insert into cliente values (null,'Rafael',1234567,12345,'1997/07/25');
SELECT 
    *
FROM
    cliente;

CREATE TABLE contador (
    cod_cont INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(40) NOT NULL,
    cnpj INT,
    ie INT
);
insert into contador values (null,'Gabriel',1234567,4545);
select * from contador;
CREATE TABLE contas (
    cod_conta INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    conta VARCHAR(30),
    valor DECIMAL(6 , 2 ) NOT NULL,
    dtvenc DATE NOT NULL,
    cod_cont INT,
    cod_func INT,
    FOREIGN KEY (cod_cont)
        REFERENCES contador (cod_cont)
        ON DELETE CASCADE,
    FOREIGN KEY (cod_func)
        REFERENCES funcionario (cod_func)
        ON DELETE CASCADE
);
insert into contas values(null,'hue',12.5,'2015/06/07',1,1);
SELECT 
    *
FROM
    contas;

CREATE TABLE fornecedor (
    cod_forn INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_fant CHAR(40) NOT NULL,
    cnpj BIGINT NOT NULL,
    inscricao_est BIGINT NOT NULL
);
insert into fornecedor values (null,'Carlos',1234567,454);

CREATE TABLE endereco (
    cod_ende INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    logradouro VARCHAR(100) NOT NULL,
    numero INT NOT NULL,
    cep BIGINT NOT NULL,
    complemento VARCHAR(10) NULL,
    cod_cliente INT NULL,
    cod_funcionario INT NULL,
    cod_contador INT NULL,
    cod_fornecedor INT NULL,
    FOREIGN KEY (cod_cliente)
        REFERENCES cliente (cod_cli)
               ON DELETE CASCADE,

    FOREIGN KEY (cod_funcionario)
        REFERENCES funcionario (cod_func)
               ON DELETE CASCADE,
    FOREIGN KEY (cod_contador)
        REFERENCES contador (cod_cont)
               ON DELETE CASCADE,
    FOREIGN KEY (cod_fornecedor)
        REFERENCES fornecedor (cod_forn)
               ON DELETE CASCADE
);
insert into endereco values (null,'rua n',5,3232,null,39,null,null,null);
insert into endereco values (null,'rua b',5,3232,null,null,1,null,null);
insert into endereco values (null,'rua c',5,3232,null,null,null,6,null);
insert into endereco values (null,'rua c',5,3232,null,null,null,null,1);
SELECT 
    *
FROM
    endereco;

CREATE TABLE telefone (
    cod_tel INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    telefone BIGINT NOT NULL,
    celular BIGINT NOT NULL,
    cod_cliente INT NULL,
    cod_funcionario INT NULL,
    cod_contador INT NULL,
    cod_fornecedor INT NULL,
    FOREIGN KEY (cod_cliente)
        REFERENCES cliente (cod_cli)
               ON DELETE CASCADE,
    FOREIGN KEY (cod_funcionario)
        REFERENCES funcionario (cod_func)
               ON DELETE CASCADE,
    FOREIGN KEY (cod_contador)
        REFERENCES contador (cod_cont)
               ON DELETE CASCADE,
    FOREIGN KEY (cod_fornecedor)
        REFERENCES fornecedor (cod_forn)
               ON DELETE CASCADE

);
	insert into telefone values (null,5,3232,39,null,null,null);
insert into telefone values (null,5,3232,null,1,null,null);
insert into telefone values (null,5,3232,null,null,6,null);
insert into telefone values (null,5,3232,null,null,null,1);
SELECT 
    *
FROM
    telefone;


CREATE TABLE produtos (
    cod_prod INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    tipo CHAR(50) NOT NULL,
    nome CHAR(50) NOT NULL,
    unidade DECIMAL(7 , 2 ) NOT NULL,
    valor DECIMAL(6 , 2 ),
    quantidade DECIMAL(6 , 3 ) NOT NULL
);
insert into produtos values (null,'enlatado','ervilha',1,1.50,10);
SELECT 
    *
FROM
    produtos;

CREATE TABLE vendas (
    cod_venda INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    valtotal FLOAT NOT NULL,
    data_hora DATETIME NOT NULL,
    cod_func INT,
    cod_cli INT,
    FOREIGN KEY (cod_func)
        REFERENCES funcionario (cod_func)
        ON DELETE CASCADE,
    FOREIGN KEY (cod_cli)
        REFERENCES cliente (cod_cli)
        ON DELETE CASCADE
);
insert into vendas values (null,12.5,now(),1,1);
CREATE TABLE itens_venda (
    cod_item INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    quantidade DECIMAL(15 , 2 ) NOT NULL,
    cod_prod INT,
    cod_venda INT,
    FOREIGN KEY (cod_prod)
        REFERENCES produtos (cod_prod)
        ON DELETE CASCADE,
    FOREIGN KEY (cod_venda)
        REFERENCES vendas (cod_venda)
        ON DELETE CASCADE
);
insert into itens_venda values (null,10,1,1);
SELECT 
    *
FROM
    itens_venda;



CREATE TABLE compra (
    cod_comp INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    valor_tot FLOAT NOT NULL,
    data_hora DATETIME NOT NULL,
    cod_forn INT,
    cod_func INT,
    FOREIGN KEY (cod_forn)
        REFERENCES fornecedor (cod_forn)
        ON DELETE CASCADE,
    FOREIGN KEY (cod_func)
        REFERENCES funcionario (cod_func)
        ON DELETE CASCADE
);
insert into compra values (null,15.4,now(),1,1);

CREATE TABLE item_compra (
    cod_item INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    quantidade FLOAT NOT NULL,
    situacao BIT NOT NULL,
    cod_comp INT,
    cod_prod INT NOT NULL,
    FOREIGN KEY (cod_comp)
        REFERENCES compra (cod_comp)
        ON DELETE CASCADE,
    FOREIGN KEY (cod_prod)
        REFERENCES produtos (cod_prod)
        ON DELETE CASCADE
);
insert into item_compra values (null, 10,0,1,1);



-- V I S Ã O   C O M   O C U L T A M E N T O   D E   D A D O S 
CREATE VIEW escondeSenha AS
    SELECT 
        funcionario.nome, usuario.usuario
    FROM
        funcionario
            INNER JOIN
        usuario ON (funcionario.cod_func = usuario.cod_func);

SELECT 
    *
FROM
    escondeSenha;


-- V I S A O   C O M   J U N Ç Ã O   D E   T A B E L A S - FAZER UMA JUNÇÃO PARA MOSTRAR POS DADOS DA
-- COMPRA DO CLIENTE: NOME, DADOS DA COMPRA E O VALOR TOTAL DA COMPRA -ARRUMAR O BANCO DE DADOS


CREATE VIEW statusCompra2 AS
    SELECT 
        vendas.cod_venda,
        vendas.valtotal,
        vendas.data_hora,
        funcionario.nome,
        cliente.nome_cli
    FROM
        vendas
            INNER JOIN
        funcionario ON vendas.cod_func = funcionario.cod_func
            INNER JOIN
        cliente ON vendas.cod_cli = cliente.cod_cli;

SELECT 
    *
FROM
    statuscompra2;


	
-- FUNÇÃO QUE AVISA QUANTOS DIAS FALTAM P A R A   V E N C E R    A   C O N T A    D E S E J A D A
DELIMITER //
create function vencConta (cod_conta1 INT)
	returns int(3)
    reads sql data
    begin
		declare resul int(3);
        
			select datediff(dtvenc,curdate()) into resul from contas where contas.cod_conta =  cod_conta1;
            
		return resul + 1; -- verificar se o procedimento com soma de mais um é correta
	end  //
DELIMITER ;

SELECT VENCCONTA(1);








-- G A T I L H O   A T U A L I Z A   I T E M_C O M P R A
Delimiter //
create trigger insere_produtos after update
on item_compra 
for each row
	begin
		declare qtd int;
		if new.situacao = 1 then
        select produtos.quantidade into qtd from produtos where cod_prod = new.cod_prod;
			update produtos set quantidade = qtd + new.quantidade where cod_prod = new.cod_prod;
        end if;
	end //
Delimiter ;







-- G A T I L H O   C R I A   U S U A R I O   P A R A    F U N C
Delimiter //
create trigger cria_usuario after insert
on funcionario
for each row
	begin
		declare nome1 varchar(40);
		select funcionario.nome into nome1 from funcionario where cod_func = new.cod_func;
        insert into usuario (usuario,senha,cod_func,cod_Niv) values (new.nome,'123',new.cod_func,'1');
        
    end //
Delimiter ;






SELECT 
    *
FROM
    usuario;
--  I N S E R T   T E S T    F U N C I O N A R I O    P A R A G A T I L H O   I N S E R E   U S U A R I O
SELECT 
    *
FROM
    usuario;

-- I N S E R T   T E S T  C O M P R A S



UPDATE item_compra 
SET 
    situacao = 1
WHERE
    cod_item = 1;



-- TRANSAÇÃO PARA INSERT CLIENTE
BEGIN;
	insert into cliente values (null,'Rafael',1234567,12345,'1997/07/25');
	insert into endereco values (null,'rua n',5,3232,null,1,null,null,null);
	insert into telefone values (null,5,3232,1,null,null,null);


COMMIT;







-- 	TRANSAÇÃO PARA VENDAS 
BEGIN;
insert into vendas values (null,12.5,now(),1,1); 
insert into itens_venda values (null,10,1,1);

COMMIT;


SELECT 
    cod_cli
FROM
    cliente
ORDER BY cod_cli DESC
LIMIT 1;

SELECT 
    cliente.cod_cli,
    cliente.nome_cli,
    cliente.cpf,
    cliente.rg,
    cliente.dtnasc,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    cliente
        INNER JOIN
    telefone ON   cliente.cod_cli = telefone.cod_cliente
        INNER JOIN
    endereco ON  cliente.cod_cli = endereco.cod_cliente ;

select * from funcionario;
select * from telefone;
select * from endereco;

SELECT 
    funcionario.cod_func,
    funcionario.nome,
    funcionario.cpf,
    funcionario.rg,
    funcionario.dtnasc,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    funcionario
        INNER JOIN
    telefone ON   funcionario.cod_func = telefone.cod_funcionario
        INNER JOIN
    endereco ON  funcionario.cod_func = endereco.cod_funcionario ;
    
    
select * from contador;
select * from telefone;
select * from endereco;
SELECT 
    contador.cod_cont,
    contador.nome,
    contador.cnpj,
    contador.ie,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    contador
        INNER JOIN
    telefone ON   contador.cod_cont = telefone.cod_contador
        INNER JOIN
    endereco ON  contador.cod_cont = endereco.cod_contador ;
    
    select * from Fornecedor;
select * from telefone;
select * from endereco;
SELECT 
    fornecedor.cod_forn,
    fornecedor.nome_fant,
    fornecedor.cnpj,
    fornecedor.inscricao_est,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    fornecedor
        INNER JOIN
    telefone ON   fornecedor.cod_forn = telefone.cod_fornecedor
        INNER JOIN
    endereco ON  fornecedor.cod_forn = endereco.cod_fornecedor ;
    
    select * from usuario;
SELECT 
    usuario.cod_user,
    usuario.usuario,
    usuario.senha,
    nivel_acesso.nivel_acesso,
    funcionario.nome
    
FROM
    usuario
        INNER JOIN
    nivel_acesso ON   usuario.cod_user = nivel_acesso.cod_niv
        INNER JOIN
    funcionario ON  usuario.cod_func = funcionario.cod_func ;
    
    select * from contas;
    
    
    
    
    
    SELECT 
    contas.conta,
    contas.valor,
    contas.dtvenc,
    contador.nome,
    funcionario.nome
    
FROM
    contas
        INNER JOIN
    contador ON   contador.cod_cont = contas.cod_conta
        INNER JOIN
    funcionario ON  contas.cod_conta = funcionario.cod_func ;
    
    
    
    
SELECT
    cliente.cod_cli,
    cliente.nome_cli,
    cliente.cpf,
    cliente.rg,
    cliente.dtnasc,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    cliente
        INNER JOIN
    telefone ON   telefone.cod_cliente = cliente.cod_cli
        INNER JOIN
    endereco ON  endereco.cod_cliente = cliente.cod_cli where cliente.cod_cli = telefone.cod_cliente and cliente.cod_cli = endereco.cod_cliente;
		
    select * from cliente;
    select * from endereco where cod_cliente= 1;
    
    
    select cod_cli from cliente order by cod_cli desc limit 1
		
            
    SELECT
    cliente.nome_cli,
    cliente.cpf,
    cliente.rg,
    cliente.dtnasc,
    telefone.telefone,
    telefone.celular,
    endereco.logradouro,
    endereco.numero,
    endereco.cep,
    endereco.complemento
FROM
    endereco
        INNER JOIN
    cliente ON   cliente.cod_cli = endereco.cod_cliente
        INNER JOIN
    telefone ON  telefone.cod_cliente = endereco.cod_cliente;
		
    use music_store
    select * from funcionario;		
    select * from cliente;
    
    
    delete from cliente where  cod_cli = 7;
    
    
    
SELECT
    usuario.cod_user,
    usuario.usuario,
    usuario.senha,
    nivel_acesso.nivel_acesso,
    funcionario.nome

FROM
    usuario
        INNER JOIN
    nivel_acesso ON   usuario.cod_niv = nivel_acesso.cod_niv
        INNER JOIN
    funcionario ON  usuario.cod_func = funcionario.cod_func;    

select * from usuario;

UPDATE usuario SET usuario='davi2', senha='1234', cod_niv='1',cod_func=9 WHERE cod_user =8



select * from produtos;





		  SELECT
			contas.cod_conta,
			contas.conta,
			contas.valor,
			contas.dtvenc,
			contador.nome,
			funcionario.nome

		FROM
			contas
				INNER JOIN
			contador ON   contador.cod_cont = contas.cod_cont
				INNER JOIN
			funcionario ON  contas.cod_func = funcionario.cod_func ;