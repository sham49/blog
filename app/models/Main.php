<?php

namespace app\models;

use core\Model;
use core\Pagination;

class Main extends Model{

	public $pagination;

	public function getPagination(){
		return $this->pagination;
	}

	public function getAll(){
		$page = $_GET['page'] ?? 1;
		$per_page = 2;
		$total = $this->db->query('SELECT COUNT(*) FROM posts')->fetchColumn();
		$pagination = new Pagination((int)$page, $per_page, $total);
		$start = $pagination->getStart();
		$this->pagination = $pagination;


		$result = $this->db->query("SELECT * FROM posts LIMIT $start, $per_page")->fetchAll();
		return $result;
	}
}