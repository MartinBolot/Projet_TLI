<?php

class Database
{
	private $_db;

	public function setDb($db){
		$this->_db = $db;
	}

	// public function getDb(){
	// 	return $this->
	// }

	public function __construct(){
		// include 'indent.php';
		$db =  new PDO('pgsql:host=localhost;dbname=acu_db', 'postgres', 'linux');
		$this->setDb($db);
  	}

	public function select($tableName, $fields){
		$fields = implode(",", $fields);

		$q = $this->_db->prepare("SELECT ($fields) FROM $tableName;");

		// $q->bindParam(':type', $fields, PDO::PARAM_STR, 12);
  		// $q->bindValue(':tableName', $tableName, PDO::PARAM_INT);
		$q->execute();

		return $q;
	}

	public function where($condition){
		$this->_db = $this->_db + 1;
		echo $this->_db;
	}

	public function get()
	{

	}
}

$db = new Database();
$patho = $db->select("patho", ["idp", "type"])->where(id=10);

// var_dump($patho->fetchAll());

// $patho

while ($reponse = $patho->fetch())
{
	var_dump($reponse);
}
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