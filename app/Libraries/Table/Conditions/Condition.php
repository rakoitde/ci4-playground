<?php

namespace App\Libraries\Table\Conditions;

#use App\Libraries\Table\Conditions\Operator;

class Condition
{

	private $value;

	private $operator;

	private $values;

	public function __construct($value, $operator, ...$values)
	{

		$this->value    = $value;
		$this->operator = $operator;
		$this->values   = $values;
	}

	public function is()
	{

		switch ($this->operator) {
			case Operator::GREATER: $is = ($this->value > $this->values[0]); break;
			case Operator::LESS:    $is = ($this->value < $this->values[0]); break;
			case Operator::BETWEEN: $is = ($this->value > $this->values[0] && $this->value < $this->values[1]); break;

			default: $is = false; break;
		}

		#d($this->value, $this->operator, $this->values[0], $is);
		return $is;
	}
}