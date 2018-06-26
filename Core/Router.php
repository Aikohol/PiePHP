<?
namespace Core;

class Router {
    private static $routes;

    public static function connect ($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get ($url)
    {
		if(array_key_exists($url, self::$routes))
		{
			return self::$routes[$url];
		}
		else {
			// // Routeur Static
			// $staticURL = explode('/', $url);
			// array_shift($staticURL);
            //
			// $url = array('controller' => $staticURL[0], 'action' => $staticURL[1]);
            // if(file_exists("..\src\Controller\\".ucfirst($url['controller'])."Controller.php"))
			// {
			// 	if(class_exists("..\src\Controller\\".ucfirst($url['controller'])."Controller"))
			// 	{
			// 		if(method_exists("..\src\Controller\\".ucfirst($url['controller'])."Controller", $url['action']."Action")){
			// 			return $url;
			// 		}
			// 	}
			// }
			// else {
			return self::$routes["/404"];
			// }
        }
	}
}
