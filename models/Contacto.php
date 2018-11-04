<?php

include '../lib/Dbpdo.php';
include '../Validaciones.php';

class Contacto extends Dbpdo
{

	public $table = 'contactos';

	public function setTable($table)
	{
		$this->table = $table;
	}

	public function insert($params)
	{
		return parent::insert($params);
	}

	private function validateParams($params)
	{
		// Se validan los parametros
		$valida = new Validaciones();

		$params = $valida->validar($params);

		return $params;
	}
}