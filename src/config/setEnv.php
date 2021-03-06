<?php
namespace braga\project\config;
/**
 * Created on 22 sty 2018 10:39:20
 * error prefix
 * @author Tomasz Gajewski
 * @package
 *
 */
use braga\graylogger\Factory;
use braga\graylogger\GrayLoggerConfig;
use braga\project\utils\logger\HttpParamLogger;
use braga\project\utils\logger\PHPLogger;
use braga\tools\tools\PostChecker;
mb_internal_encoding("utf8");
ini_set("max_execution_time", "1800");
date_default_timezone_set("Europe/Warsaw");

if(file_exists(__DIR__ . "/devEnv.php"))
{
	require_once __DIR__ . "/devEnv.php";
}
/* DB CONFIGURACTION */
define("DB_CONNECTION_STRING", \braga\project\config\Config::getDbConnectionString());
define("DB_SCHEMA", \braga\project\config\Config::getDbSchema());
define("DB_USER", \braga\project\config\Config::getDbUser());
define("DB_PASS", \braga\project\config\Config::getDbPassword());

/* PHP DATE FORMAT DEFAULT */
define("PHP_DATE_FORMAT", "Y-m-d");
define("PHP_TIME_FORMAT", "H:i:s");
define("PHP_DATETIME_FORMAT", PHP_DATE_FORMAT . " " . PHP_TIME_FORMAT);

Factory::setStartupConfig(new GrayLoggerConfig("CB", Config::getGelfHost(), Config::getGelfPort(), Config::getLogLevel(), Config::getLogFile()));

PostChecker::setLogger(new HttpParamLogger());

set_error_handler([
				PHPLogger::class,
				"handleError" ]);
set_exception_handler([
				PHPLogger::class,
				"handleException" ]);