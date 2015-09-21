<?php

class ErrorHandler {

	public static function error($code, $message, $file, $line, array $context = null) {
		// echo '<pre>'.print_r(func_get_args(),1).'</pre>';die();
		self::exception(new ErrorException($message, $code, 0, $file, $line));
	}

	public static function exception(Exception $e) {
		echo $e->getMessage().'<br />';
		if (!(error_reporting() & $e->getCode())) {
			// This error code is not included in error_reporting
			return;
		}



		switch ($e->getCode()) {
		case E_USER_ERROR:
			echo "<b>My ERROR</b> [".$e->getCode()."] ".$e->getMessage()."<br />\n";
			echo "  Fatal error on line $e->getLine() in file $e->getFile()";
			echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			echo "Aborting...<br />\n";
			exit(1);
			break;

		case E_USER_WARNING:
			echo "<b>My WARNING</b> [".$e->getCode()."] ".$e->getMessage()."<br />\n";
			break;

		case E_USER_NOTICE:
			echo "<b>My NOTICE</b> [".$e->getCode()."] ".$e->getMessage()."<br />\n";
			break;

		default:
			echo "Unknown error type: [".$e->getCode()."] ".$e->getMessage()."<br />\n";
			break;
		}

		/* Don't execute PHP internal error handler */
		return true;
	}
}