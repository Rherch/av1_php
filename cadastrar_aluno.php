<?php
    session_start();
    ob_start();
    require 'config.php';

    $nome = filter_input(INPUT_POST, 'nome'); 
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 
    $idade= filter_input(INPUT_POST,'idade'); 
    $contato = filter_input(INPUT_POST,'contato'); 
    $endereco = filter_input(INPUT_POST,'endereco'); 



    if(isset($_POST['Submit'])) {
        
        $sql = $pdo->prepare( "INSERT INTO alunos (nome,email,idade,contato,endereco) VALUES (:nome, :email, :idade, :contato, :endereco)" );
                $sql->bindValue(':nome', $nome); 
                $sql->bindValue(':email', $email); 
                $sql->bindValue(':idade', $idade); 
                $sql->bindValue(':contato', $contato); 
                $sql->bindValue(':endereco', $endereco); 
                $sql->execute();

                
                $_SESSION['msg'] = "Aluno Cadastrado com Sucesso!";
                header("Location: index.php");
                exit;
} else {
    $_SESSION['msg'] = "Erro: Necessário preencher todos os campos!";
    header('Location: index.php ');
    exit;
}
