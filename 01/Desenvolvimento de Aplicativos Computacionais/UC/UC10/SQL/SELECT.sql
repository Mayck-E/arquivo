/* Pesquisa em varias tabelas*/
select livros.nome_livro as 'NOME DO LIVRO', editoras.nome as 'NOME DA EDITORA'
from livros inner join editoras
on (livros.id_editora = editoras.id)