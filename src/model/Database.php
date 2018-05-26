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