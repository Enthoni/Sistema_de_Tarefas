<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];
?>

        <div class="infotarefas">
            <h2>Deseja mesmo excluir esta tarefa?</h2>
            <a href='delete.php?id=<?php echo $id; ?>'><button >SIM</button></a>
            <a href='index.php'><button>NÃO</button></a>
        </div>
<?php
    }
    include_once 'includes/footer.php';
?>