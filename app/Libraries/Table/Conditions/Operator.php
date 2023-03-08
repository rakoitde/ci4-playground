<?php

namespace App\Libraries\Table\Conditions;

class Operator
{
	public const EQUAL = '==';
	public const NOTEQUAL = '!=';
	public const IDENTICAL = '===';
	public const NOTIDENTICAL = '!==';
	public const GREATER = '>';
	public const LESS = '<';
	public const GREATEROREQUAL = '>=';
	public const LESSOREQUAL = '<=';
	public const BETWEEN = '><';
	public const NOTBETWEEN = '<>';
	public const CONTAINS = '%';
	public const NOTCONTAINS = '!%';
	public const STARTWITH = '';
	public const ENDWITH = '';
}