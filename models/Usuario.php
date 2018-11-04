<?php 

include 'lib/Dbpdo.php';
include 'Validaciones.php';

class Usuario extends Dbpdo
{

	public $table = 'usuarios';

	public function setTable($table)
	{
		$this->table = $table;
	}

	public function insert($params)
	{

		$compruebaEmail = $this->consultaEmail($params['email']);


		if ( ! $compruebaEmail) {

			return parent::insert($this->validateParams($params));

		} else {

			throw new Exception('el email ya existe');

		}
	}

	private function validateParams($params)
	{
		// Se validan los parametros
		$valida = new Validaciones();

		$params = $valida->validar($params);

		return $params;
	}
}