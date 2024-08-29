<?php

namespace core;

class Router{

	public $routes = [];

	public function __construct(){
		$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		$pos = strpos($uri[0], '?');
		if(empty($uri[0]) || $pos === 0){
			$this->routes['controller'] = 'main';
			$this->routes['action'] = 'showPosts';
			$path = 'app\controllers\MainController';
			$controller = new $path($this->routes);
			$controller->showPosts();
		}else{
			$this->routes['controller'] = $uri[0];
			$controllerName = 'app\controllers\\' . ucfirst($uri[0]) . 'Controller';
			if(class_exists($controllerName)){
				if(!empty($uri[1])){
					$this->routes['action'] = $uri[1];
					$methodName = $uri[1];
					$controller = new $controllerName($this->routes);
					if(method_exists($controller, $methodName)){
						$controller->$methodName();
					}
				}
			}else{
				echo "Страница не найдена";
			}
		}

		
	}


}