<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $sql = mysqli_query($connect, "SELECT * FROM tarefas WHERE tarefas.id_tarefa = '$id';") or die(print "Tarefa não existente.".mysqli_error());

        while($tarefa = mysqli_fetch_array($sql)){
            $id = $tarefa['id_tarefa'];
            $nome = $tarefa['nome_tarefa'];
            $custo = $tarefa['custo_tarefa'];
            $data = $tarefa['data_limite'];
        }
    }
?>
    <div class="popup-container">
        <div class="popup">
            <h2>POP-UP: EDITAR</h2>
            <form action="update2.php" method="POST">
                <input type="hidden" name="id" id="id" value="<?=$id?>">

                <label>Tarefa:</label><br> 
                <input type="text" name="nome" id="nome" value="<?=$nome?>"><br><br>

                <label>Custo:</label><br> 
                <input type="number" step=".01" name="custo" id="custo" value="<?=$custo?>"><br><br>

                <label>Data Limite:</label><br> 
                <input type="date" name="data" id="data" value="<?=$data?>"><br><br>

                <!--<button >ALTERAR</button><br>
                <h3><a href="index.php">Voltar a página inicial</a></h3>-->
                <button type="submit" name="update_action">Confirmar</button>
            </form>
            <a class="btn btn-info" href="index.php"><button>Cancelar</button></a>
        </div>
    </div>
<?php
    include_once 'includes/footerupdate.php';
?>