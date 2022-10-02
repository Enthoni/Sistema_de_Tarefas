<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    if(isset($_POST["action"])):
        $erros = array();

        $nome_tarefa=($_POST['nome']);
        $custo_tarefa=($_POST['custo']);
        $data_limite=($_POST['data']);
        $ordem = mysqli_query($connect, "SELECT id_tarefa FROM tarefas;");
        $i = 1; 
        while($count = mysqli_fetch_array($ordem)){
            $contador = $count["id_tarefa"];
            $i++;
        }
        $ordem_tarefa = $i;
        
        if (empty($nome_tarefa)): 
            $erros[] = "Nome Inválido";
        endif;

        if (empty($custo_tarefa) or $custo_tarefa < 0): 
            $erros[] = "Custo Inválido";
        endif;

        if (empty($data_limite)): 
            $erros[] = "Data Inválida";
        endif;

        $nome_tarefa = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);

        $errosanitize = array();
        if (!empty($erros)):
            foreach($erros as $errosanitize):
                echo "<li> $errosanitize </li>";
            endforeach;
        else:
            $bollnome = true;
            $resultadonome = mysqli_query($connect,"SELECT tarefas.nome_tarefa FROM tarefas WHERE nome_tarefa = '{$nome_tarefa}';");
            if(mysqli_num_rows($resultadonome)>0){
                $bollnome = false;
            };   

            if($bollnome == true){
                $sql="INSERT INTO tarefas(nome_tarefa, custo_tarefa, data_limite, ordem_tarefa)
                    VALUES ('$nome_tarefa', '$custo_tarefa', '$data_limite', '$ordem_tarefa');";

                if(mysqli_query($connect,$sql)){	
                    header('Location: index.php');
                    $_SESSION['mensagem'] = "Sucesso ao incluir!";	
                }
                else{
                    $_SESSION['mensagem'] = "Erro ao incluir!";		
                    header('Location: incluir.php');
                }
            }
            else{
                $_SESSION['mensagem'] = "Nome da tarefa já existente.";		
                header('Location: incluir.php');
            }
        endif;
    endif;
    
?>
    <div class="incluir">
        <h2>INCLUIR TAREFA:</h2>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
        <label>Tarefa:</label><br> 
        <input type="text" name="nome" placeholder="Digite o nome da tarefa:"><br><br>

        <label>Custo:</label><br>
        <input type="number" step=".01" name="custo" placeholder="Digite o custo da tarefa:"><br><br>

        <label>Data Limite:</label><br> 
        <input type="date" name="data" placeholder="Digite a data limite(prazo) da tarefa:"><br><br>

        <button type="submit" name="action">INCLUIR</button><br>
        <h3><a href="index.php">Voltar a página inicial</a></h3>
        </form>
    </div>

<?php
    include_once 'includes/footer.php';
?>