<?php

namespace src\Controller;

	class UserController extends \Core\Controller {

		public function registerAction() {
			if(!empty($_POST))
			{
				unset($this->params['password2']);
				$register = new \src\Model\UserModel($this->params);
				$register->create();
				header('Location: login');
			}
			else {
				$this->render('register');
			}
		}
		public function loginAction() {
			if(!empty($_POST))
			{
				$model = new \src\Model\UserModel($this->params);
				if($user = $model->find(['WHERE' => ['password', $this->params['password']], 'LIMIT' => '1']))
				{
					$_SESSION['id'] = $user[0]['id'];
					$_SESSION['email'] = $user[0]['email'];
					header('Location: /PiePHP');
				}
				else{
					echo "error";
				}
			}
			else{
				$this->render('login');
			}
		}
		public function profileAction()
		{
			if(!empty($_SESSION))
			{
				$profile = new \src\Model\UserModel($this->params);
				$scope = $profile->read($_SESSION['id']);
				$this->render('profile', $scope);
			}
			else
			{

			}
		}
	}
?>
