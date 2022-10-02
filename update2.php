<?php
    include_once 'includes/header.php';
    include_once 'includes/connect_bd.php';
    include_once 'session/mensagem.php';

    if(isset($_POST['update_action'])){
        $erros = array();

        $id_tarefa=($_POST['id']);
        $nome_tarefa=($_POST['nome']);
        $custo_tarefa=($_POST['custo']);
        $data_limite=($_POST['data']);
        $ordem = mysqli_query($connect, "SELECT id_tarefa FROM tarefas;");
        $i = 0; 
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
            $sqlcustoantigo = mysqli_query($connect,"SELECT tarefas.custo_tarefa FROM tarefas WHERE id_tarefa = '$id_tarefa';");
            $sqldataantiga = mysqli_query($connect,"SELECT tarefas.data_limite FROM tarefas WHERE id_tarefa = '$id_tarefa';");
            $resultadonome = mysqli_query($connect,"SELECT tarefas.nome_tarefa FROM tarefas WHERE nome_tarefa = '{$nome_tarefa}';");
            if(mysqli_num_rows($resultadonome)>0){
                if($sqlcustoantigo == $custo_tarefa){
                    if($sqldataantiga == $data_limite){
                        $bollnome = false;
                    }
                }
                else{
                    $bollnome = true;
                }
            };   

            if($bollnome == true){
                $sql = "UPDATE tarefas SET  nome_tarefa = '$nome_tarefa', custo_tarefa = '$custo_tarefa', data_limite = '$data_limite', ordem_tarefa = '$ordem_tarefa' WHERE id_tarefa = '$id_tarefa';";

                $resultado = mysqli_query($connect, $sql);

                if($resultado){
                    $_SESSION['mensagem'] = "Sucesso ao alterar os dados da tarefa";		
                    header('Location: index.php');
                }
                else{
                    $_SESSION['mensagem'] = "Erro ao alterar os dados da tarefa!";		
                    header('Location: index.php');
                }
            }
            else{
                $_SESSION['mensagem'] = "Nome da tarefa já existente.";		
                header('Location: index.php');
            }
        endif;

        
    }

    include_once 'includes/footer.php';
?>