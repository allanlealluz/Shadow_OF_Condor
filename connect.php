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

    function addFicha($nome,$vitalidade,$forca,$agi,$int,$pre,$vigor,$itens,$pericia,$defesa){
        $itens_json = json_encode($itens);
        $pericia_json = json_encode($pericia);
    
        $stmt = $this->pdo->prepare('INSERT INTO fichas (nome, vitalidade, forca, inte, agi, pre, vigor, itens, pericias, defesa) VALUES (:n, :v, :f, :i, :a, :p, :vg, :itens, :pe, :def)');
        $stmt->bindValue(':n',$nome);
        $stmt->bindValue(':v',$vitalidade);
        $stmt->bindValue(':f',$forca);
        $stmt->bindValue(':i',$int);
        $stmt->bindValue(':a',$agi);
        $stmt->bindValue(':p',$pre);
        $stmt->bindValue(':vg',$vigor);
        $stmt->bindValue(':itens',$itens_json);
        $stmt->bindValue(':pe',$pericia_json);
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
    function updateFicha($id, $nome, $vitalidade, $forca, $agi, $int, $pre, $vigor, $itens, $pericia, $defesa){
        $stmt = $this->pdo->prepare('UPDATE fichas SET nome = :nome, vitalidade = :vitalidade, forca = :forca, agi = :agi, inte = :int, pre = :pre, vigor = :vigor, itens = :itens, pericias = :pericia, defesa = :defesa WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':vitalidade', $vitalidade);
        $stmt->bindValue(':forca', $forca);
        $stmt->bindValue(':agi', $agi);
        $stmt->bindValue(':int', $int);
        $stmt->bindValue(':pre', $pre);
        $stmt->bindValue(':vigor', $vigor);
        $stmt->bindValue(':itens', $itens);
        $stmt->bindValue(':pericia', $pericia);
        $stmt->bindValue(':defesa', $defesa);
        $stmt->execute();
    }
    function deleteFicha($id) {
        $stmt = $this->pdo->prepare('DELETE FROM fichas WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}
