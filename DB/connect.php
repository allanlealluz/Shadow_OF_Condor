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

    function addFicha(
        $name,
        $health,
        $strength,
        $dexterity,
        $intelligence,
        $precision,
        $vigor,
        $items,
        $skills,
        $defense,
        $image
    ) {
        $encodedItems = json_encode($items);
        $encodedSkills = json_encode($skills);

        $query = 'INSERT INTO fichas (nome, vitalidade, forca, inte, agi, pre, vigor, itens, pericias, defesa, img)
        VALUES (:name, :health, :strength, :dexterity, :intelligence, :precision, :vigor, :encodedItems, :encodedSkills, :defense, :image)';

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':health', $health);
        $stmt->bindValue(':strength', $strength);
        $stmt->bindValue(':dexterity', $dexterity);
        $stmt->bindValue(':intelligence', $intelligence);
        $stmt->bindValue(':precision', $precision);
        $stmt->bindValue(':vigor', $vigor);
        $stmt->bindValue(':encodedItems', $encodedItems);
        $stmt->bindValue(':encodedSkills', $encodedSkills);
        $stmt->bindValue(':defense', $defense);
        $stmt->bindValue(':image', $image);
        $stmt->execute();
    }

    function getFichas() {
        $stmt = $this->pdo->prepare('SELECT * FROM fichas');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    function Cadastrar($nome,$email,$senha){
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) values (:n,:e,:s)");
        $stmt->bindValue(':n', $nome);
        $stmt->bindValue(':e', $email);
        $stmt->bindValue(':s', hash('sha256',$senha));
        $stmt->execute();

    }
    function Login($nome,$senha){
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome = :n and senha = :s");
        $stmt->bindValue(':n', $nome);
        $stmt->bindValue(':s', hash('sha256',$senha));
        $stmt->execute();
        $user = $stmt->fetch();
        return $user? true : false;

}
}
                                                                                                                                                                                         