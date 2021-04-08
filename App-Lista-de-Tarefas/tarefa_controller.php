<?php
    require '../../App-Lista-de-Tarefas/Tarefa.model.php';
    require '../../App-Lista-de-Tarefas/tarefa.service.php';
    require '../../App-Lista-de-Tarefas/conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : $pagina;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
    
        if(isset($_POST['tarefa']) && $_POST['tarefa'] != ''){
            $tarefa->__set('tarefa', $_POST['tarefa']);
        }

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $result = $tarefaService->inserir();
        //header('Location: nova_tarefa.php?inclusao=1');
        
        if($result){
            header('Location: nova_tarefa.php?inclusao=1');

        } else {
            header('Location: nova_tarefa.php?inclusao=2');
        }
        

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
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=1');

        } else {
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=2');
        }
        
    }

    if($acao == 'remover'){
        $tarefa = new Tarefa();
        
        if(isset($_GET['id']) && isset($_GET['id']) != ''){
            $tarefa->__set('id', $_GET['id']);
        }

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->remover()){
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=3');

        } else {
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=2');
        }
        
    }

    if($acao == 'check'){
        $tarefa = new Tarefa();
        
        if(isset($_GET['id']) && isset($_GET['id']) != ''){
            $tarefa->__set('id_status', 2);
            $tarefa->__set('id', $_GET['id']);
        }

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->check()){
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=4');

        } else {
            header('Location: ' . $pagina .'.php?acao=recuperar&atualizacao=2');
        }
        
    }
    
    


?>