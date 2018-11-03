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

		return parent::insert($this->validateParams($params));
	}

	private function validateParams($params)
	{
		// Se validan los parametros
		$valida = new Validaciones();

		$params = $valida->validar($params);

		return $params;
	}
}