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
        $result = $stmt->execute();

        return $result;
    }

    public function recuperar(){
        //é necessário fazer um left join para que o status fique de acordo com a descrição da tb_status
        $sql = '
        select 
            t.id, s.status, t.tarefa
        from 
            tb_tarefas as t 
        left join 
            tb_status as s 
        on 
            (t.id_status = s.id)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar(){
        $sql = "update tb_tarefas set tarefa = :tarefa where id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $result = $stmt->execute();
        
        return $result;
    }

    public function remover(){
        $sql = 'delete from tb_tarefas where id = :id';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $result = $stmt->execute();

        return $result;
    }

    public function check(){
        $sql = "update tb_tarefas set id_status = :status where id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':status', $this->tarefa->__get('id_status'));
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $result = $stmt->execute();
        
        return $result;
    }
}


?>