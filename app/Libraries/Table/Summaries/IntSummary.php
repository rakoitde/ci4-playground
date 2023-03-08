<?php

namespace App\Libraries\Table\Summaries;

class IntSummary extends Summary
{

	private array $result;

	public function calculate(array $values): self
	{
		$values = array_map('intval', $values);

		$this->result =  [
	        'average' => array_sum($values)/count($values),
	        'count'   => count($values),
	        'sum'     => array_sum($values),
	        'max'     => max($values),
	        'min'     => min($values),
		];

        return $this;
	}

	public function __toString()
	{

		$innerhtml = '';
		foreach ($this->result as $key => $value) {

			$classes = $key==$this->default_summary ? '' : ' class="d-none"';
			$text = ucfirst($key).': '.$value;

			$summary  = $this->theme->intsummary['summary'];
			$summary  = str_replace("{classes}", $classes, $summary);
			$innerhtml.= str_replace("{innerhtml}", $text, $summary);

		}
		$view = $this->theme->intsummary['view'];
		$html = str_replace('{innerhtml}', $innerhtml, $view);

		return $html;

	}

}