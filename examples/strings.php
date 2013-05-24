<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

use php2go\strings;

var_dump(strings::Contains('test','t')); // true
var_dump(strings::Contains('test','b')); // false

var_dump(strings::Count('test','t')); // 2
var_dump(strings::Count('test','b')); // 0

var_dump(strings::Fields("a\t\nb  c\r")); // ['a','b','c']

var_dump(strings::FieldsFunc("a:b:c", function($char){
	return $char === ':';
})); // ['a','b','c']

var_dump(strings::HasPrefix('abc','a')); // true
var_dump(strings::HasPrefix('abc','b')); // false

var_dump(strings::HasSuffix('abc','c')); // true
var_dump(strings::HasSuffix('abc','b')); // false


var_dump(strings::IndexAny('this is a test', ' si'));
