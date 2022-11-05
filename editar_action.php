<?php
    require 'config.php';

    /**
     * Recebe os dados do form editar.
     *     
     */
    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name'); 
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 
    $idade = filter_input(INPUT_POST,'idade'); 
    $contato = filter_input(INPUT_POST,'contato'); 
    $endereco = filter_input(INPUT_POST,'endereco'); 
    
    //verificar se o id, o nome e o email são válidos
    if($id && $name && $email) {

        $sql = $pdo->prepare("UPDATE alunos SET nome = :nome, email = :email, idade = :idade, contato = : contato, endereco = :endereco WHERE id = :id");
        $sql->bindValue(':name',$name); 
        $sql->bindValue(':email',$email); 
        $sql->bindValue(':idade',$idade); 
        $sql->bindValue(':contato',$contato); 
        $sql->bindValue(':endereco',$endereco); 
        $sql->bindValue(':id',$id); 
        $sql->execute();

        header("Location:index.php");
        exit;

    } else {
        //caso contrário, vai retorna para página index.php e não registra.
        header('Location: index.php'); 
        exit;
    }