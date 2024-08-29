<?php

namespace app\controllers;

use core\Controller;

class PostsController extends Controller{

	public function create(){
		$this->model->create();
		$this->view->render('Добавление поста');
		
	}

	public function full(){
		$result = $this->model->full();
		$comment = $this->model->showComments();
		$this->model->addComment();
		$vars = [
			'posts' => $result,
			'comment' => $comment
		];
		$this->view->render($result[0]['title'], $vars);
	}

	public function delete(){
		$this->model->delete();
		redirect('/');
	}

	public function edit(){
		$result = $this->model->getValues();
		$vars = [
			'posts' => $result,
		];
		$this->view->render($result[0]['title'], $vars);
	}

	public function update(){
		$this->model->edit();
	}
}