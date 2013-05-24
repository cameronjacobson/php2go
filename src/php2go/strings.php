<?php

namespace php2go;

class strings
{
	public static function Contains($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return strpos($s, $t) !== false;
	}

	public static function Count($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return substr_count($s, $t);
	}

	public static function EqualFold($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return (string)strtolower($s) === (string)strtolower($t);
	}

	public static function Fields($s){
		$s = is_string($s) ? $s : (string)$s;
		return array_filter(preg_split("|\s|", $s), function($v){
			return !empty($v);
		});
	}

	public static function FieldsFunc($s, callable $f){
		$s = is_string($s) ? $s : (string)$s;
		$len = strlen($s);
		$fields = array();
		$buffer = '';
		for($x=0;$x<$len;$x++){
			switch($f($s[$x])){
				case true:
					$fields[] = $buffer;
					$buffer = '';
					break;
				case false:
				default:
					$buffer .= $s[$x];
					break;
			}
		}
		if(!empty($buffer)){
			$fields[] = $buffer;
		}
		return $fields;
	}

	public static function HasPrefix($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return strpos($s, $t) === 0;
	}

	public static function HasSuffix($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return strrpos($s, $t) === strlen($s)-strlen($t);
	}

	public static function Index($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return strpos($s ,$t);
	}

	public static function IndexAny($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		$substr = strpbrk($s, $t);
		return strpos($s, $substr);
	}

	public static function IndexFunc($s, callable $f){
		$s = is_string($s) ? $s : (string)$s;
		$len = strlen($s);
		for($x=0;$x<$len;$x++){
			if($f($s[$x])){
				return $x;
			}
		}
		return false;
	}

	public static function Join(array $xs, $t){
		$t = is_string($t) ? $t : (string)$t;
		return implode($t,$xs);
	}

	public static function LastIndex($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		return strrpos($s,$t);
	}

	public static function LastIndexAny($s, $t){
		$s = is_string($s) ? $s : (string)$s;
		$t = is_string($t) ? $t : (string)$t;
		$lent = strlen($t);
		for($x=0;$x<$lent;$x++){
			if(false !== $pos = strrpos($s,$t[$x])){
				return $pos;
			}
		}
		return -1;
	}

	public static function LastIndexFunc($s, callable $f){
		$s = is_string($s) ? $s : (string)$s;
		$len = strlen($s)-1;
		for($x=$len;$x>=0;$x--){
			if($f($s[$x]) === true){
				return $x;
			}
		}
		return -1;
	}

	public static function Map(callable $f, $t){
		$t = is_string($t) ? $t : (string)$t;
		$len = strlen($t);
		for($x=0;$x<$len;$x++){
			if(($replacement = $f($t[$x])) < 0){
				continue;
			}
			$t[$x] = $replacement;
		}
		return $t;
	}

	public static function Repeat($s, $i){
		$s = is_string($s) ? $s : (string)$s;
		$i = is_int($i) ? $i : (int)$i;
		return str_repeat($s, $i);
	}
}
