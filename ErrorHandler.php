<?php

class ErrorHandler {

	public static function error($num, $str, $file, $line, array $context = null) {
		self::exception(new ErrorException($str, 0, $num, $file, $line));
	}

	public static function exception(Exception $e) {
		echo 'HELLO THERE :D';
	}
}