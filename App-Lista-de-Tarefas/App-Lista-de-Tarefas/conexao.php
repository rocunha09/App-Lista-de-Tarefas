<?php
class Conexao {
    private $host = 'localhost';
    private $db = 'php_tarefas';
    private $username = 'root';
    private $password = '';

    public function conectar(){
        try {
            $conexao = new PDO("mysql:hostname=$this->host;dbname=$this->db", "$this->username", "$this->password");
                           
            return $conexao; 
            //echo '<p>Conexão realizada com sucesso.</p>';

        } catch (PDOException $e) {
            echo '<p>Erro: </p>' . $e->getCode();
            echo '<p>Mensagem: </p>' . $e->getMessage();
        }
    }
}
?>