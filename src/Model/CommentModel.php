<?php
namespace src\Model;

class CommentModel extends Core\Entity {
	protected $table ='comments';
	private static $relations = ['hasOne' => 'articles'];

	public function getRelations()
	{
		return self::$relations;
	}
}
?>
