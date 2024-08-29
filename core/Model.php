<?php

namespace core;

use core\Db;

class Model{

	public $db;

	public function __construct(){
		$this->db = new Db;
	}
}