<?php
namespace braga\project\base;
use braga\project\config\Config;
use braga\tools\html\Controler;
/**
 * Created on 17-10-2011 18:22:59
 * @author Tomasz Gajewski
 * @package system
 * error prefix EM:902
 */
class Page
{
	// -----------------------------------------------------------------------------------------------------------------
	protected static function getHead()
	{
		$title = "WfMag To Jpk Converter";
		$title .= " ver: " . Config::getVersion();
		$retval = Tags::meta("http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"");
		$retval = Tags::meta("name=\"viewport\" content=\"width=device-width, initial-scale=1\"");
		$retval .= Tags::title($title);
		$retval .= Tags::link("rel='shortcut icon' href='/favicon.ico'");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' crossorigin='anonymous'");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css' ");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css'");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css'");
		$retval .= Tags::link("rel='stylesheet' type='text/css' href='/css/style.css'");
		$retval .= "<style type='text/css' media='print'>body {display:none;visibility:hidden;}</style>";
		$retval .= self::getScripts();
		return Tags::head($retval);
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected static function getScripts()
	{
		$marker = urlencode(Config::getVersion());

		$retval = Tags::script("", "type='text/javascript' src='//code.jquery.com/jquery-1.12.4.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' crossorigin='anonymous'");
		$retval .= Tags::script("", "type='text/javascript' src='//tinymce.cachefly.net/4.3/tinymce.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://www.gstatic.com/charts/loader.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pl.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js'");
		$retval .= Tags::script("", "type='text/javascript' src='/js/system.js?" . $marker . "'");
		$retval .= Tags::script("", "type='text/javascript' src='/js/ajax.js?" . $marker . "'");
		$retval .= Tags::script("", "type='text/javascript' src='/js/cobrador.js?" . $marker . "'");

		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected static function getDocType()
	{
		$retval = "<!DOCTYPE html>\n";
		$retval .= "<!-- generated: " . date("D, d M Y H:i:s") . " -->\n";
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected static function sendHttpHeaders()
	{
		header("Expires:" . date("D, d M Y H:i:s") . "");
		header("Cache-Control: no-transform; max-age=0; proxy-revalidate ");
		header("Cache-Control: no-cache; must-revalidate; no-store; post-check=0; pre-check=0 ");
		header("Pragma: no-cache");
		header("Content-Type: text/html; charset=UTF-8");
		header('X-Frame-Options: SAMEORIGIN');
		header('X-XSS-Protection: 1; mode=block');
		header('X-Content-Type-Options: nosniff');
	}
	// -----------------------------------------------------------------------------------------------------------------
	static function make($bodyContent)
	{
		if(!headers_sent())
		{
			self::sendHttpHeaders();
			$page = self::getHead() . Tags::body($bodyContent, "id='Body' onselectstart='return false;' unselectable='on' ");
			$page = Tags::html($page);
			$page = self::getDocType() . $page;
			Controler::sendResponse($page);
		}
		else
		{
			exit();
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}
?>