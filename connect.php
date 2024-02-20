<?php
class conect {
    private $pdo;
    private $host = "localhost";
    private $dbname = "scondor";
    private $user = "root";
    private $pass = "";

    function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host,$this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function addFicha($nome,$vitalidade,$força,$agi,$int,$pre,$vigor,$itens,$pericia,$defesa){
        $stmt = $this->pdo->prepare('INSERT INTO fichas (nome, vitalidade, forca, inte, agi, pre, vigor, itens, pericias, defesa) VALUES (:n, :v, :f, :i, :a, :p, :v, :itens, :pe, :def)');
        $stmt->bindValue(':n',$nome);
        $stmt->bindValue(':v',$vitalidade);
        $stmt->bindValue(':f',$força);
        $stmt->bindValue(':i',$int);
        $stmt->bindValue(':a',$agi);
        $stmt->bindValue(':p',$pre);
        $stmt->bindValue(':v',$vigor);
        $stmt->bindValue(':itens',$itens);
        $stmt->bindValue(':pe',$pericia);
        $stmt->bindValue(':def',$defesa);
        $stmt->execute();
    }

    function getFichas() {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM fichas');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
}
