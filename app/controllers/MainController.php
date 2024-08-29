<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller{

	public function showPosts(){
		$result = $this->model->getAll();
		$res_pagination = $this->model->getPagination();
		$vars = [
			'posts' => $result,
			'pagination' => $res_pagination
		];
		$this->view->render('Главная страница', $vars);
	}
}