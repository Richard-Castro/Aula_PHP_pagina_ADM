<?php session_start();

require_once "functions.php";

$seguranca = isset($_SESSION['ativa']) ? TRUE : header("location: login.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - Usuários</title>
</head>
<body>
    <?php if($seguranca) { ?>

    <h1>Painel administrativo do site</h1>
    <h3>Bem vindo, <?php echo $_SESSION['nome']; ?></h3>

    <h1>Gerenciador de Usuários</h1>
    

    <nav>
        <div>
            <a href="index.php">Painel</a>
            <a href="users.php">Gerenciar Usuários</a>
            <a href="logout.php">Sair</a>
        </div>
    </nav>

    <?php 
    $tabela = "usuarios";
    $order = "nome";
    $usuarios = buscar($connect, $tabela, 1, $order);
    inserirUsuarios($connect);
    ?>

    <form action="" method="post">
        <fieldset>
            <legend>Inserir Usuário</legend>
            <input type="text" name="nome" placeholder="Nome">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="repetesenha" placeholder="Confirmar Senha">
            <input type="submit" name="cadastrar" value="Cadastrar">
        </fieldset>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data Cadastro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['data_cadastro']; ?></td>
                </tr>

            <?php endforeach;?>
        </tbody>
    </table>

    <?php } 
    ?>
</body>
</html>