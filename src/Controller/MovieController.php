<?php

namespace src\Controller;

class MovieController extends \Core\Controller {

	public function indexAction()
	{
		$movie = new \src\Model\MovieModel($this->params);
		$allMovie = $movie->find();
		$this->render('index', $allMovie);
	}
	public function addAction()
	{
		if(!empty($_POST))
		{
			$add = new \src\Model\MovieModel($this->params);
			$add->create();
			header('Location: /PiePHP');
		}
		else
		{
			$this->render('addMovie');
		}
	}
	public function patateAction()
	{
		$this->render('patate');
	}
}
?>
