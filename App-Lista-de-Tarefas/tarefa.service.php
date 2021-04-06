<?php

class tarefaService {
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir(){
        $sql = 'insert into tb_tarefas(tarefa) values(:tarefa)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
    }

    public function recuperar(){

    }

    public function atualizar(){

    }

    public function remover(){

    }
}


?>