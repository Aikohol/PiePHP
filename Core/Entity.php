<?php
namespace Core;

class Entity extends \Core\ORM {

	public function __construct ($attributes) {
		parent::__construct();
		if(is_array($attributes))
		{
			foreach($attributes as $key => $value)
			{
				$this->{$key} = $value;
			}
		}
		elseif(is_int($attributes))
		{
			$user = $this->read($attributes);

			foreach($user as $key => $value)
			{
				$this->{$key} = $value;
			}
			$relations = $this->getRelations();
			if(array_key_exists('hasOne', $relations))
			{
				foreach($relations as $relation)
				{
					$this->{substr($relation, 0, -1)} = $this->read([$this->id]);
				}
			}
			if(array_key_exists('hasMany', $relations))
			{
				foreach($relations as $relation)
				{
					$this->{$relation} = $this->find(['WHERE' => [substr($this->table, 0, -1) . '_id', $this->id]], $relation);
				}
			}
		}
	}
}
?>
