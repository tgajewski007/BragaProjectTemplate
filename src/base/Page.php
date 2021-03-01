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
		$title = "System";
		$title .= " ver: " . Config::getVersion();
		$retval = Tags::meta("http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"");
		$retval = Tags::meta("name=\"viewport\" content=\"width=device-width, initial-scale=1\"");
		$retval .= Tags::title($title);
		$retval .= Tags::link('href="data:image/png;base64,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" rel="icon" type="image/png"');
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
			$bodyContent = Tags::div($bodyContent, "id='Workspace'");
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