<?php
    require '../../App-Lista-de-Tarefas/Tarefa.model.php';
    require '../../App-Lista-de-Tarefas/tarefa.service.php';
    require '../../App-Lista-de-Tarefas/conexao.php';

    $tarefa = new Tarefa();
    
    if(isset($_POST['tarefa']) && $_POST['tarefa'] != ''){
        $tarefa->__set('tarefa', $_POST['tarefa']);
    }
    
    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
   
    echo '<pre>';
    print_r($tarefaService);
    echo '</pre>';
    
?>