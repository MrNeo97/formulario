<?php 

class Dbpdo
{
	// Datos de la conexión
	private $host = 'mysql';
	private $user = 'root';
	private $pass = 'root';
	private $dbname = 'formulario';

	// Contendrá el error en caso de que haya
	public $errors = false;

	// Conexión con la BD
	public $db;

	// Indica si estamos en modo desarrollo o producción
	public $modeDEV = true;

	// Indica si queremos una conexión persistente o no
	private $persistent = true;

	private function connection()
	{
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

		$options = [PDO::ATTR_PERSISTENT => $this->persistent,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		try {

			return new PDO($dsn, $this->user, $this->pass, $options);

		} catch (PDOException $e) {

			$this->errors = $e->getMessage();

			if ($this->modeDEV) {

				print_r($this->errors);

			} else {
				echo "Hay problemas con el acceso a la BD. Prueba más tarde";
			}

		}
	}

	public function __construct()
	{
		$this->db = $this->connection();
	}

	public function getConnection()
	{
		return $this->db;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
		$this->connection();
	}

	public function setHost($hos)
	{
		$this->host = $host;
		$this->connection();
	}

	public function setUser($user)
	{
		$this->user = $user;
		$this->connection();
	}

	public function setDbname($dbname)
	{
		$this->dbname = $dbname;
		$this->connection();
	}

	public function setDB ($data)
	{
		$this->dbname = $data['dbname'];
		$this->host = $data['host'];
		$this->user = $data['user'];
		$this->pass = $data['pass'];

		$this->connection();
	}

	public function all($limit = 250)
	{
		$prepare = $this->db->prepare('SELECT * FROM ' . $this->table . ' LIMIT ' . $limit);

		$prepare->execute();

		//$this->setQuery($prepare);

		return $prepare->fetchAll(PDO::FETCH_ASSOC);
	}

	public function consultar($email, $clave)
	{

		$comprobarEmail = $this->consultaEmail($email);


		if ($comprobarEmail) {

			if ($comprobarEmail[0]['clave'] == $clave) {

				$user = $comprobarEmail[0];

				//echo "El usuario " . $user['nombre'] . " es correcto<br>";

				$_SESSION['user'] = $user;

				return true;

			} else {

				echo "El usuario NO es correcto<br>";

			}

		} else {

			throw new Exception('el email no existe');

		}

	}

	public function mostrar($id)
	{

		$prepare = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE usuario_id = \'' . $id. '\'');

		$prepare->execute();

		//$this->setQuery($prepare);

		$resultado = $prepare->fetchAll(PDO::FETCH_ASSOC);

		return $resultado;

	}

	protected function consultaEmail($email)
	{

		$prepare = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE email = \'' . $email. '\'');

		$prepare->execute();

		//$this->setQuery($prepare);

		$resultado = $prepare->fetchAll(PDO::FETCH_ASSOC);

		return $resultado;

	}

	public function insert($params)
	{
		if ( ! empty($params) ) {

				$fields = '(' . implode(',', array_keys($params)) . ')';

				$values = "(:" . implode(",:", array_keys($params)) . ")";

				$prepare = $this->db->prepare('INSERT INTO ' . $this->table . ' ' . $fields . ' VALUES ' . $values);

				$prepare->execute($this->normalizePrepareArray($params));

				//$this->setQuery($prepare);

				return $this->db->lastInsertId();			

		} else {

			throw new Exception('Los parametros están vacios');

		}
	}

	public function setQuery($sql)
	{
		if ($this->modeDEV) $sql->debugDumpParams(); //devuelve la consulta sql
	}

	public function lastQuery()
	{
		return $this->lastQuery; //aqui mostramos la consulta sql
	}

	private function normalizePrepareArray($params)
	{
		foreach ($params as $key => $value) {

			$params[':' . $key] = $value;
			unset($params[$key]); //borra las claves sin los :

		}

		return $params;
	}

	public function update($params, $where)
	{
		if ( ! empty($params)) {

			$fields = '';

			foreach ($params as $key => $value) {

				$fields .= $key . ' = :' . $key . ',';

			}

			$fields = rtrim($fields, ',');

			$key = key($where); //esto es id

			$value = $where[$key]; //el valor de id

			//sentencia sql
			$ssql = 'UPDATE ' . $this->table . ' SET ' . $fields . ' WHERE ' . $key . '=' . $value;

			$prepare = $this->db->prepare($ssql);

			$prepare->execute($this->normalizePrepareArray($params));

			//$this->setQuery($prepare); //para ver la consulta
			
		} else {

			throw new Exception('Los parametros están vacios');

		}
	}

	public function delete($param)
	{
		if ( ! empty($param)) {

			$key = key($param);

			$ssql = 'DELETE FROM ' . $this->table . ' WHERE ' . $key . '= :' . $key;

			$prepare = $this->db->prepare($ssql);

			$prepare->execute($this->normalizePrepareArray($param));

			$this->setQuery($prepare);

		} else {
			throw new Exception('Los parametros están vacios');
		}
	}

}
