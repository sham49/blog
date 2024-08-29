<?php

namespace core;

use core\View;

class Controller{

	public $routes = [];
	public $view;

	public function __construct($route){
		$this->routes = $route;
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name){
		$path = 'app\models\\' . ucfirst($name);
		if(class_exists($path)){
			return new $path;
		}
	}
}