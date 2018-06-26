<?php

namespace Core;

class Core {
	public function run() {

		include_once 'routes.php';

		// echo __CLASS__ . " [OK]" . PHP_EOL;
		$url = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI));

		$path = Router::get($url);

		$controller = '\src\Controller\\' . ucfirst($path['controller']) . 'Controller';
		$action = $path['action'] . 'Action';

		$call = new $controller();
		$call->$action();
	}
}
?>
