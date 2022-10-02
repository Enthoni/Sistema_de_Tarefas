<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    $resultado= mysqli_query($connect,"SELECT tarefas.id_tarefa, tarefas.nome_tarefa, tarefas.custo_tarefa, tarefas.data_limite FROM tarefas ORDER BY ordem_tarefa DESC;");
?>
        <section class="container">
            <ul id = "lista">
                <div id="msg"></div>

<?php
            if(mysqli_num_rows($resultado)>0):
                while($tarefas = mysqli_fetch_array($resultado)):
                    //$custo = number_format($tarefas['custo_tarefa'], 2, ',', '.');
                    $custo = floatval($tarefas['custo_tarefa']);
                    
?>
                <li id = "ordem_<?php echo $tarefas['id_tarefa'];?>">
                    <article class="tarefas">
                            <div class="infotarefas">
                                <div>
                                    <?php if($custo >= 1000){
                                        echo '<p style="color: blue;">';
                                    ?>
                                            <u>Código tarefa:</u> <?php echo $tarefas['id_tarefa'];?><br>
                                            <u>Nome da tarefa:</u> <?php echo $tarefas['nome_tarefa'];?><br>
                                            <u>Custo:</u> R$<?php echo number_format($custo, 2, ',', '.')?><br>
                                            <u>Data limite:</u> <?php echo $tarefas['data_limite'];?>
                                        </p>
                                
                                    <?php
                                    }
                                    else{
                                        echo '<div><p>';
                                    
                                    ?>
                                        <u>Código tarefa:</u> <?php echo $tarefas['id_tarefa'];?><br>
                                        <u>Nome da tarefa:</u> <?php echo $tarefas['nome_tarefa'];?><br>
                                        <u>Custo:</u> R$<?php echo number_format($custo, 2, ',', '.')?><br>
                                        <u>Data limite:</u> <?php echo $tarefas['data_limite'];?>
                                    </p>
                                
                                <?php
                                }
                                ?>
                                </div>
                                <div class="button">
                                <a class="btn btn-info" href="update.php?id=<?php echo $tarefas['id_tarefa']; ?>">
                                    <button class="openPopup">
                                        <span class="material-symbols-outlined ">edit</span>   
                                    </button> 
                                </a>
                                
                                <a class="btn btn-info" href="confirmadelete.php?id=<?php echo $tarefas['id_tarefa']; ?>" data-confirm="Tem certeza que deseja deletar a tarefa selecionada?">
                                    <button>
                                        <span class="material-symbols-outlined ">delete</span>  
                                    </button>
                                </a>
                            </div>
                    </article>
                </li>
            <?php
                endwhile;
            ?>
            </ul>
            <a href="incluir.php"><button>INCLUIR UMA NOVA TAREFA</button></a><br>
        </section>
        <?php
            else:
        ?>
                <section class="conteiner">
                    <article class="tarefas">
                        <div>
                            <p>-</p>
                            <a href="incluir.php"><button>INCLUIR UMA NOVA TAREFA</button></a><br>
                        </div>
                    </article>
                </section>

<?php
            endif;
    include_once 'includes/footer.php';
?>
