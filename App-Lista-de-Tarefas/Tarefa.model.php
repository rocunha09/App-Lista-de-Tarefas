<?php

class Tarefa {
    private $id;
    private $id_status;
    private $tarefa;
    private $data_cadastrado;


    public __get($atributo){
        return $this->$atributo;
    }

    public __set($atributo, $valor){
        return $this->$atributo = $valor;
    }
    
}


?>