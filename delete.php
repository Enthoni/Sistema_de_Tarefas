<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    //$id = filter_input(INPUT_GET, 'id');

    if(!empty($_GET['id'])){	
        $id = $_GET['id'];

        $sql = "DELETE FROM tarefas WHERE id_tarefa = '{$id}';";
        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Sucesso ao excluir tarefa.";	
            header('Location: index.php');	
            
        } else {
            $_SESSION['mensagem'] = "Erro ao excluir tarefa.";	
            header('Location: index.php');	
        }
    }

    include_once 'includes/footer.php';
?>