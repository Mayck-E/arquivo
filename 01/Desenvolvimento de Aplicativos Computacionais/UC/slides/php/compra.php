<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de Produtos</title>
</head>
<body>
    <form method="POST" action="processamento/proc_compra.php">
        <label>Nome</label><br />
        <input type="text" name="nome" /><br />
        <label>Endereço</label><br />
        <input type="text" name="endereco" /><br />
        <label>CEP</label><br />
        <input type="text" name="cep" /><br />
        <label>Cidade - Ex. Rio de Janeiro</label><br />
        <input type="text" name="cidade" /><br />
        <label>Estado - Ex. SP</label><br />
        <input type="text" name="estado" /><br />
        <label>Produto</label><br />
        <input type="text" name="nome_produto" /><br />        
        <label>Valor R$</label><br />
        <input type="text" name="valor_produto" /><br />
        <label>Quantidade</label><br />
        <input type="text" name="qtde_produto" /><br /><br />
        <input type="submit" value="Resumo do pedido" />

    </form>
    
</body>
</html>