<?php

namespace core;

class Db{

	protected $db;


	public function __construct(){
		$config = require 'config/db.php';
		$this->db = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password'], $config['options']);
	}

	public function query($query, $params = []){
		$stmt = $this->db->prepare($query);
		$stmt->execute($params);
		return $stmt;
	}
}