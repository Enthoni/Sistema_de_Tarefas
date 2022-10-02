<?php
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    $ordens = $_POST['ordem'];

    $contador = 1;
    foreach($ordens as $id){
        $sql = mysqli_query($connect, "SELECT tarefas SET ordem_tarefa = $contador WHERE id_tarefa = $id");
        $contador++;
    }

    echo '<h4 style="color: blue;">Ordem alterada com sucesso!</h4>';

?>