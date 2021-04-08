<?php
    require '../../App-Lista-de-Tarefas/Tarefa.model.php';
    require '../../App-Lista-de-Tarefas/tarefa.service.php';
    require '../../App-Lista-de-Tarefas/conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
    
        if(isset($_POST['tarefa']) && $_POST['tarefa'] != ''){
            $tarefa->__set('tarefa', $_POST['tarefa']);
        }

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();

        header('Location: nova_tarefa.php?inclusao=1');

    }
    
    if($acao == 'recuperar'){
        $conexao = new Conexao();
        $tarefa = new Tarefa();
        
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
        
    }

    if($acao == 'atualizar'){
        $tarefa = new Tarefa();
        
        if(isset($_POST['tarefa']) && isset($_GET['id']) && isset($_GET['id']) != ''){
            $tarefa->__set('tarefa', $_POST['tarefa']);
            $tarefa->__set('id', $_GET['id']);
        }

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->atualizar()){
            header('Location: todas_tarefas.php?acao=recuperar&atualizacao=1');

        } else {
            header('Location: todas_tarefas.php?acao=recuperar&atualizacao=2');
        }
        
    }
    
    


?>