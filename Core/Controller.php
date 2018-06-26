<?php

namespace Core;

class Controller {

	protected $_render;
	protected $params;

	public function __construct()
	{
		$request = new Request();
		return $this->params = $request->getParams();
	}

	protected function render ($view, $scope = []) {
		extract($scope);

		$controller = basename(get_class($this));
		$controller = explode('\\', $controller);
		$controller = end($controller);

		$f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
		str_replace('Controller', '', $controller), $view]). '.php';


		if(file_exists($f)) {
			ob_start();
			include($f);
			$_render = ob_get_clean();

			include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
		}
		else{echo "error";}
	}

}
?>
