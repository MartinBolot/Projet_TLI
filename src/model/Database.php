<?php

class Database
{
	private $_db;
	private $_q;

	public function setDb($db){
		$this->_db = $db;
	}

	public function setQuery($q){
		$this->_q = $q;
	}

	public function __construct(){
		$db =  new PDO('pgsql:host=localhost;dbname=acu_db', 'postgres', 'linux');
		$this->setDb($db);
  	}

	public function select($fields, $tableName){
		$fields = implode(",", $fields);

		$this->setQuery("SELECT $fields FROM $tableName");

		return $this;
	}

	public function selectDistinct($fields, $tableName){
		$fields = implode(",", $fields);

		$this->setQuery("SELECT DISTINCT $fields FROM $tableName");

		return $this;
	}

	public function where($condition){
		$this->_q .= " WHERE $condition ;";

		return $this;
	}

	public function toArray(){
		$query = $this->_db->prepare($this->_q);
		$query->execute();
		return $query->fetchAll();
	}

	public function getDetails($idPatho){
		$query = $this->_db->prepare(
			"SELECT symptome.description
				FROM symptome, patho, symptPatho
				WHERE symptome.idS=symptPatho.idS
					AND patho.idP=symptPatho.idP
					AND patho.idP=?;"
		);

		$query->execute([$idPatho]);
		$result = $query->fetchAll();
		return $result;
	}

	public function getPatho($idPatho) {
			$query = $this->_db->prepare(
				"SELECT *
					FROM patho
					WHERE patho.idP = ?;"
			);

			$query->execute([$idPatho]);
			return $query->fetch();
	}

	public function getPathosFromKeyword($keyword) {
			$query = $this->_db->prepare(
				"SELECT *
					FROM patho p
						JOIN symptPatho sp ON sp.idP = p.idP
						JOIN symptome s ON s.idS = sp.idS
						JOIN keySympt ks ON ks.idS = s.idS
						JOIN keywords k ON k.idK = ks.idK
					WHERE k.name LIKE '%?%';"
			);

			$query->execute([$keyword]);
			return $query->fetchAll();
	}

}


// $db = new Database();
// $pathos = $db->select(["idp", "type"], "patho")->where("type = 'me' OR type = 'mi'")->toArray();
// $pathos = $db->select(["*"], "patho")->toArray();
// foreach ($pathos as $patho) {
// 	echo $patho["description"]."<br>";
// }
// var_dump($patho);
// var_dump($patho->fetchAll());
// $patho
// while ($reponse = $patho->fetch())
// {
// 	var_dump($reponse);
// }
// foreach ($patho as $test) {
// 	var_dump($test);
// 	# code...
// }
// <?php
// $data = ['a'=>'foo','b'=>'bar'];
// $keys = array_keys($data);
// $fields = '`'.implode('`, `',$keys).'`';
// #here is my way
// $placeholder = substr(str_repeat('?,',count($keys)),0,-1);
// $pdo->prepare("INSERT INTO `baz`($fields) VALUES($placeholder)")->execute(array_values($data));

?>
