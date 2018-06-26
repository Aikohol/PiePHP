<?php
namespace Core;

use \PDO;

class ORM {
	// private $table;
	private $bdd;

	public function __construct() {
		try
		{
			$this->bdd = new \PDO('mysql:host=localhost;dbname=PiePHP;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (PDOException $e)
		{
			die("Erreur !: " . $e->getMessage());
		}
	}

	public function create() {

		$fields = $this->getPublicVars();
		$table = $this->table;

		foreach($fields as $key => $value)
		{
			if(is_array($value))
				unset($fields[$key]);
		}

		$cols = '(';
		$value = '(';
		$i = 0;
		while($i < (count($fields)))
		{
			++$i;
			$cols .= ($i != count($fields)) ? "`" . key($fields) . "`, " : "`" . key($fields) . "`";
			$value .=($i != count($fields)) ? ":" . key($fields) . ", " : ":" . key($fields) . "";
			next($fields);
		}
		$value .= ")";
		$cols .= ") ";
		$req = "INSERT INTO $table $cols VALUES $value";
		$create = $this->bdd->prepare($req);

		reset($fields);

		// array_pop($fields);
		foreach ($fields as $key => $value) {
			$create->bindValue(":" . $key, $value);
		}

		if($create->execute()){
			return $this->bdd->lastInsertId();
		}
		else {
			echo "SQL Error, check table or fields.";
		}
	}

	public function read($id){

		$table = $this->table;

		$req = "SELECT * FROM $table WHERE id = :id";

		$read = $this->bdd->prepare($req);


		$read->bindParam(':id', $id);

		$read->execute();

		return $read->fetch();
	}

	public function update() {

		$fields = $this->getPublicVars();
		$table = $this->table;

		foreach($fields as $key => $value)
		{
			if(is_array($value))
				unset($fields[$key]);
		}

		$req = "UPDATE $table SET ";

		$i = 0;
		while($i < count($fields))
		{
			$req .= key($fields) . " = " . ':' . current($fields) . ", ";
			next($fields);
			$i++;
		}
		$req = substr($req, 0, -2);

		$req .= ' WHERE id = :id';
		$update = $this->bdd->prepare($req);

		$i = 0;
		reset($fields);
		while($i < count($fields))
		{
			++$i;
			$tmp = current($fields);
			$update->bindParam(":" . current($fields), $tmp);
			$update->bindParam(":id", $id);
			next($fields);
		}

		return $update->execute();
	}

	public function delete() {

		$table = $this->table;

		$delete = $this->bdd->prepare("DELETE FROM $table WHERE id = :id");

		$delete->bindParam(':id', $this->id);

		return $delete->execute();
	}

	public function find($params = ['WHERE' => ['1', ''], 'ORDER BY' => 'id ASC', 'LIMIT' => ''], $table = null) {

		if(!isset($table))
		{
			$table = $this->table;
		}
		$req = "SELECT * FROM $table ";

		$req .= (array_key_exists('WHERE', $params) && ($params['WHERE'][0] && $params['WHERE'][1])) ? 'WHERE ' . $params['WHERE'][0] . ' = :' . $params['WHERE'][0] : ' ';
		$req .= (array_key_exists('ORDER BY', $params) && isset($params['ORDER BY'])) ? ' ORDER BY ' . $params['ORDER BY'] : '';
		$req .= (array_key_exists('LIMIT', $params)) && !empty($params['LIMIT'])? ' LIMIT ' . $params['LIMIT'] : '';
		$find = $this->bdd->prepare($req);
		if(array_key_exists('WHERE', $params) && ($params['WHERE'][0] || $params['WHERE'][1]))
		{
			$find->bindParam(':' . $params['WHERE'][0], $params['WHERE'][1]);
		}
		// if(array_key_exists('WHERE', $params)  && count($params['WHERE']) > 1)
		// {
		// 	$req .= 'WHERE ' . $params['WHERE'][0] . ':' . $params['WHERE'][0] . ' ';
		// }
        //
		// if(array_key_exists('ORDER BY', $params))
		// {
		// 	$req .= "ORDER BY " . $params['ORDER BY'] . " ";
		// }
		// if(array_key_exists('LIMIT', $params))
		// {
		// 	$req .= "LIMIT " . $params['LIMIT'] . ':'. $params['LIMIT'];
		// }


		// $test =$params['WHERE'][1];
		// $find->bindParam(':'.$params['WHERE'][0], $test);

		$find->execute();

		return $find->fetchAll();
	}
	public function getPublicVars () {
		if(!function_exists('core\get')) {
		{
			function get($objet) {
				return get_object_vars($objet);
			}
		}
        return get($this);
    }
	}
}
?>
