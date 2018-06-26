	<?php

use Core\Router;

Router::connect('/', ['controller' => 'movie', 'action' => 'index']);
Router::connect('/404', ['controller' => 'error', 'action' => 'error']);

Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
// Router::connect('/registerConfirm', ['controller' => 'user', 'action' => 'register']);

Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/profile', ['controller' => 'user', 'action' => 'profile']);

Router::connect('/addFilm', ['controller' => 'movie', 'action' => 'add']);
Router::connect('/echoPatate', ['controller' => 'movie', 'action' => 'patate']);
// Router::connect('/loginConfirm', ['controller' => 'user', 'action' => 'login']);

?>
