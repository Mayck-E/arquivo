/* INSERIR DADOS NA TABELA CLIENTES */
INSERT INTO clientes (nome, telefone, rua, numero, bairro, cep, cidade, estado, tipo_cliente, cpf_cnpj, rg_ie) VALUES ('Divino','1799160874','Rua Antônio de Souza Figueiredo','3202','Jd Canaã','15503292','Votuporanga','SP','FISICA','111.111.111-11', '99999999')

select * from clientes


/* INSERIR DADOS NA TABELA editoras*/
insert into editoras (nome, contato, telefone, email) values ('SENAC','Gentini','17995432100','senac@editora.com.br')

select * from editoras


/* INSERIR DADOS NA TABELA livros*/
insert into livros (id_editora, nome_livro, autor, preco, categoia, isbn, ano) values (1,'Lua Nova','Jim',35.50,'ficçao',87654321,'2009')

select * from livros


/* INSERIR DADOS NA TABELA estoque*/
insert into estoque (id_livro, quantidade) values (2, 25)

select * from estoque

/* INSERIR DADOS NA TABELA estoque*/
insert into pedido (id_cliente, data, valor) values (2, '2023-03-23', 200)

select * from pedido

select * from clientes


/* INSERIR DADOS NA TABELA itensPedido*/
insert into itensPedido (id_pedido, id_livro, quantidade, valor) values (1, 2, 2, 50)

select * from itensPedido