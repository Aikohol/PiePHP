<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='webroot/css/style.css'>
		<meta charset='utf-8'>
		<title>PiePHP</title>
	</head>
	<body>
		<header>
			<nav>
				<h1>My_Cinema</h1>
				<div>
					<a href='profile'>Profile</a>
					<a href='films'>Films</a>
					<a href='addFilm'>Ajouter un Film</a>
					<a href='login'>Se connecter</a>
					<a href='register'>Creer un compte</a>
				</div>
			</nav>
		</header>
		<div class='content'>
			<?= $_render ?>
		</div>
	</body>
</html>
