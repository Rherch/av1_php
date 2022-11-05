<?php
    session_start();
    ob_start();
    require 'head.php';
	require 'config.php';

    if((!isset($_SESSION['id'])) && (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário fazer o login!</p>";
        header("Location: index.php");
        exit;
    }
	

	$lista = [];
    $sql = $pdo->query("SELECT * FROM alunos");

    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        //print_r($lista);
    }
?>

<html>
    <head>
        <title>Alunos</title>
    </head>
    <h1>Home</h1>
    <h2>Bem-vindo, <?php echo $_SESSION['nome'] ?></h2>
    
<body>
	<br/><br/>

	<form action="cadastrar_aluno.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr> 
				<td>Idade</td>
				<td><input type="text" name="idade"></td>
			</tr>
			<tr> 
				<td>Contato</td>
				<td><input type="text" name="contato"></td>
			</tr>
			<tr> 
				<td>Endereço</td>
				<td><input type="text" name="endereco"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Adicionar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php foreach($lista as $usuario): ?><br/>
                <tr><br/>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?=$usuario['nome']; ?></td><br/>
                    <td><?=$usuario['email']; ?></td>
                    <td>
                        <a
                         href="editar.php?id=<?=$usuario['id']; ?>"
                         class="btn btn-success"
                        >
                            Editar
                        </a>
                        <a
                         href="excluir.php?id=<?=$usuario['id']; ?>"
                         onclick="return confirm('Tem certeza que deseja excluir?')"
                         class="btn btn-danger"
                        >
                        	Excluir
                    </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

<br/><a href="sair.php">Sair</a>

<?php include 'footer.php'; ?>