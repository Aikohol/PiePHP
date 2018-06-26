<?php
namespace src\Model;

// use \PDO;

class UserModel extends \Core\Entity {
	protected $table = 'users';
	private static $relations = ['hasMany' => 'comments'];

	public function getRelations()
	{
		return self::$relations;
	}

}

	// public function __construct ($params) {
	// 	$this->params = $params;
	// }

	// public function test(){
	// 	// $orm = new \Core\ORM();
	// 	// $orm->find('users', ['WHERE' => 'id = 45', 'ORDER BY' => 'id ASC', 'LIMIT' => '5']);
	// 	// $test = new \Core\Entity(45);
	// }
	// public function connect() {
    //
	// 	$email = $_POST['email'];
	// 	$pwd = $_POST['password'];
    //
	// 	$requete = $this->bdd->prepare("SELECT * FROM users WHERE email LIKE :email;");
    //
	// 	$requete->bindParam(':email', $email);
    //
    //     $requete->execute();
    //
	// 	while($user = $requete->fetch())
    //     {
	// 		return $user;
	// 	}
	// }
	// public function save () {
    //
	// 	unset($this->params['password2']);
    //
	// 	$orm = new \Core\ORM();
	// 	$orm->create($this->params);
    //
	// 	// $email = $_POST['email'];
	// 	// $password = $_POST['password'];
    //     //
    //     //
	// 	// $req = "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)";
    //     //
	// 	// $save = $this->bdd->prepare($req);
    //     //
	// 	// $save->bindParam(':email', $email);
	// 	// $save->bindParam(':password', $pwd);
    //     //
	// 	// $save->execute();
	// }
	// public function saveEmail ($email) {
	// 	$ret = false;
	// 	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	// 	{
	// 		$ret = true;
    //
	// 		$verif = $this->bdd->prepare("SELECT email FROM `users` WHERE email = :email");
    //
	// 		$verif->bindParam(':email', $email);
    //
	// 		$verif->execute();
    //
	// 		while($emailValid = $verif->fetch())
	// 		{
	// 			$ret = false;
	// 		}
	// 	}
	// 	return $ret;
	// }
	// public function savePassword ($password) {
	// 	if(isset($_POST['password']) && isset($_POST['password2']))
    //     {
    //         $passe2 = $_POST['password2'];
    //         $passe1 = $_POST['password'];
    //
    //         if($passe1 === $passe2)
    //         {
    //             if(strlen($passe1) >= 5 && strlen($passe1) <= 25)
    //             {
    //                 $password = password_hash($passe1, PASSWORD_BCRYPT);
	// 				return $password;
    //             }
    //         }
    //     }
    //     else
    //     {
    //         echo "Un probleme est survenue, veuillez recommencer";
    //         return false;
    //     }
