<?php
namespace src\Model;

class MovieModel extends \Core\Entity {
	protected $table = 'movies';
	private static $relations = ['hasMany' => 'comments', 'hasOne' => 'genres'];

	public function getRelations()
	{
		return self::$relations;
	}
}
?>
