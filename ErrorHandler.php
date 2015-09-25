<?php

abstract class ErrorHandler {

	public static function error($code, $message, $file, $line, array $context = null) {
		// echo '<pre>'.print_r(func_get_args(),1).'</pre>';die();
		static::exception(new ErrorException($message, $code, 0, $file, $line));
	}

	abstract public static function exception(Exception $e);
}