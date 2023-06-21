/* CONSUTAR OS REGISTROS DA TABELA USUARIOS*/
SELECT * FROM usuarios

/* INSERIR DADOS NA TABELA USUARIOS */
INSERT INTO usuarios (nome, email, senha, fone, created) VALUES ('', '', '', '', GETDATE())

/* CONSUTAR OS REGISTROS DA TABELA PRODUTOS*/
SELECT * FROM produtos

/* INSERIR DADOS NA TABELA PRODUTOS */
INSERT INTO produtos (nome, quantidade, valor, created) VALUES ('Gabinete', 2, 120.10, GETDATE())

/* CONSUTAR OS REGISTROS DA TABELA CLIENTES*/
SELECT * FROM clientes

/* INSERIR DADOS NA TABELA CLIENTES */
INSERT INTO clientes(nome, fone, rua, numero, bairro, complemento, cidade, estado, created) VALUES ('Mayck', '17988090058', 'Rua São Carlos', '3847', 'Jd Eldorado', 'casa', 'Votuporanga', 'SP', GETDATE())


/*COMANDO PARA ADICIONAR UM CAMPO NA TABELA*/
ALTER TABLE usuarios ADD dedo_duro NVARCHAR (30);

DROP TABLE clientes_log  

/*COMANDO PARA EXCLUIR UM CAMPO NA TABELA*/
ALTER TABLE usuarios DROP COLUMN dedo_duro;

--CRIAR TABELA PARA ARMAZENAR O LOG

CREATE TABLE usuarios_log(ID int, Nome nvarchar(100), EmailAntigo nvarchar(100), EmailNovo nvarchar(100), DataAlteração datetime not null);

--CRIAR TRIGGER
GO 
CREATE TRIGGER TRclientes 
ON clientes 
AFTER UPDATE 
AS 
BEGIN
	DECLARE @usuarioId INT
	DECLARE @usuarioNome nvarchar(100) 
	DECLARE @usuarioEmailAntigo nvarchar(100)  
	DECLARE @usuarioEmailNovo nvarchar(100)

	SELECT @usuarioId = INSERTED.ID FROM INSERTED
	SELECT @usuarioNome = INSERTED.NOME FROM INSERTED
	SELECT @usuarioEmailAntigo = DELETED.Email FROM DELETED
	SELECT @usuarioEmailNovo = INSERTED.ID FROM INSERTED

INSERT INTO usuarios_log (ID, Nome, EmailAntigo, EmailNovo, DataAlteração) VALUES (@usuarioId, @usuarioEmailAntigo, @usuarioEmailNovo, GETDATE())
END
GO

SELECT * FROM usuarios
SELECT * FROM usuarios_log

UPDATE usuarios SET nome = 'mayck' WHERE ID = 14



--CRIAR TABELA PARA ARMAZENAR O LOG CLIENTES

CREATE TABLE clientes_log(ID int, NomeOld nvarchar(100), NomeNew nvarchar(100), foneOld nvarchar(50), foneNew nvarchar(50), ruaOld nvarchar(200), ruaNew nvarchar(200), numeroOld varchar(5), numeroNew varchar(5), bairroOld varchar(50), bairroNew varchar(50), complementoOld varchar(50), complementoNew varchar(50), cidadeOld varchar(50), cidadeNew varchar(50), estadoOld varchar(2), estadoNew varchar(2), cpfOld varchar(15), cpfNew varchar(15), DataAlteração datetime not null);

--CRIAR TRIGGER CLIENTES
GO 
CREATE TRIGGER TRUclientes 
ON clientes 
AFTER UPDATE 
AS 
BEGIN
/* DECLARANDO */
	DECLARE @clientesId INT

	DECLARE @clientesNomeOld nvarchar(100) 
	DECLARE @clientesfoneOld nvarchar(100)  
	DECLARE @clientesruaOld nvarchar(100)
	DECLARE @clientesNumeroOld nvarchar(100)
	DECLARE @clientesBairroOld nvarchar(100)
	DECLARE @clientesComplementoOld nvarchar(100)
	DECLARE @clientesCidadeOld nvarchar(100)
	DECLARE @clientesEstadoOld nvarchar(100)
	DECLARE @clientesCpfOld nvarchar(100)

	DECLARE @clientesNomeNew nvarchar(100) 
	DECLARE @clientesfoneNew nvarchar(100)  
	DECLARE @clientesruaNew nvarchar(100)
	DECLARE @clientesNumeroNew nvarchar(100)
	DECLARE @clientesBairroNew nvarchar(100)
	DECLARE @clientesComplementoNew nvarchar(100)
	DECLARE @clientesCidadeNew nvarchar(100)
	DECLARE @clientesEstadoNew nvarchar(100)
	DECLARE @clientesCpfNew nvarchar(100)

	SELECT @clientesId = INSERTED.ID FROM INSERTED
	SELECT @clientesNomeNew = INSERTED.nome FROM INSERTED
	SELECT @clientesfoneNew = INSERTED.fone FROM INSERTED
	SELECT @clientesruaNew  = INSERTED.rua FROM INSERTED
	SELECT @clientesNumeroNew  = INSERTED.numero FROM INSERTED
	SELECT @clientesBairroNew  = INSERTED.bairro FROM INSERTED
	SELECT @clientesComplementoNew = INSERTED.complemento FROM INSERTED
	SELECT @clientesCidadeNew = INSERTED.cidade FROM INSERTED
	SELECT @clientesEstadoNew = INSERTED.estado FROM INSERTED
	SELECT @clientesCpfOld = INSERTED.cpf FROM INSERTED

	SELECT @clientesId = DELETED.ID FROM DELETED
	SELECT @clientesNomeOld = DELETED.nome FROM DELETED
	SELECT @clientesfoneOld = DELETED.fone FROM DELETED
	SELECT @clientesruaOld  = DELETED.rua FROM DELETED
	SELECT @clientesNumeroOld  = DELETED.numero FROM DELETED
	SELECT @clientesBairroOld  = DELETED.bairro FROM DELETED
	SELECT @clientesComplementoOld = DELETED.complemento FROM DELETED
	SELECT @clientesCidadeOld = DELETED.cidade FROM DELETED
	SELECT @clientesEstadoOld = DELETED.estado FROM DELETED
	SELECT @clientesCpfOld = DELETED.cpf FROM DELETED


INSERT INTO clientes_log (id, NomeNew, foneNew, ruaNew, numeroNew, bairroNew, complementoNew, cidadeNew, estadoNew, cpfNew, NomeOld, foneOld, ruaOld, numeroOld, bairroOld, complementoOld, cidadeOld, estadoOld, cpfOld, DataAlteração) VALUES (@clientesId, @clientesNomeNew, @clientesFoneNew, @clientesRuaNew, @clientesNumeroNew, @clientesBairroNew, @clientesComplementoNew, @clientesCidadeNew, @clientesEstadoNew, @clientesCpfNew, @clientesNomeOld, @clientesFoneOld, @clientesRuaOld, @clientesNumeroOld, @clientesBairroOld, @clientesComplementoOld, @clientesCidadeOld, @clientesEstadoOld, @clientesCpfOld, GETDATE())
END
GO

SELECT * FROM clientes
SELECT * FROM clientes_log

UPDATE clientes SET nome = 'Mayck Eduardo', rua = 'R. São Carlos', bairro = 'Jardim Eldorado', cidade = 'votuporanga', estado = 'SP', fone = '17988090058' WHERE ID = 3



