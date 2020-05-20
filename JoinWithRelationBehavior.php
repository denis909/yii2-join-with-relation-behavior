<?php

namespace denis909\yii;

class JoinWithRelationBehavior extends \yii\base\Behavior
{

	protected $_joinWithRelation = [];

	public function joinWithRelation($name, $key = null)
	{
		if (is_array($name))
		{
			foreach($name as $key => $value)
			{
				$this->owner->joinWithRelation($name, $key);
			}

			return $this;
		}

		if (array_key_exists($name, $this->_joinWithRelation))
		{
			return $this;
		}

		$this->_joinWithRelation[$name] = $key;

		return $this->owner->joinWith($key ? ($name . ' ' . $key) : $name);
	}

}