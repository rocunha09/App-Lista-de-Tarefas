<?php

class tarefaService {
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir(){

    }

    public function recuperar(){

    }

    public function atualizar(){

    }

    public function remover(){

    }
}


?>