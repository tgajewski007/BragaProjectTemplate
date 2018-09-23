<?php
namespace braga\project\base;
use braga\tools\html\BaseTags;
use braga\widgets\bootstrap\BS;

/**
 * @package system
 * @author Tomasz.Gajewskis
 * Created on 2010-06-16 14:24:41
 * klasa gromadząca statyczne metody tworzące tragi HTML
 * error prefix EM:904
 */
class Tags extends BaseTags
{
	// -------------------------------------------------------------------------
	static function hr($attributes = "class='ui-widget-content'")
	{
		return parent::hr($attributes);
	}
	// -------------------------------------------------------------------------
	static function formNonAjax($innerHTML, $attributes = "action='./' role='form' data-toggle='validator' method='post'")
	{
		return Tags::form($innerHTML, $attributes);
	}
	// -------------------------------------------------------------------------
	static function formularz($retval, $modul = null)
	{
		$id = getRandomStringLetterOnly(5);
		return Tags::form($retval, "action='" . ($modul == null ? "." : "/" . $modul) . "/' id='" . $id . "' role='form' data-toggle='validator' method='post' onsubmit='if(!$(this).data(\"bs.validator\").validate().hasErrors()) {ajax.go(this);} return false;'") . Tags::script("$('#" . $id . "').validator()");
	}
	// -------------------------------------------------------------------------
	static function fileFormularz($innerHTML)
	{
		$id = getRandomStringLetterOnly(5);
		$marker = getRandomStringLetterOnly(5);
		$attrib = "action='./' id='" . $id . "' target='FileFrame' method='post' onsubmit='if(!$(this).data(\"bs.validator\").validate().hasErrors()) {ajax.showLoading(\"" . $marker . "\");}' role='form' data-toggle='validator'  enctype='multipart/form-data'";
		return Tags::form($innerHTML . self::iframe("", "name='FileFrame' src='about:blank' onload='ajax.hideLoading(\"" . $marker . "\");AfterUploadFile(this)' class='h'"), $attrib) . Tags::script("$('#" . $id . "').validator()");
	}
	// -------------------------------------------------------------------------
	static function downloadFormularz($innerHTML)
	{
		$id = getRandomStringLetterOnly(5);
		return Tags::form($innerHTML . self::iframe("", "id='downloadFileFrame' name='downloadFileFrame' src='about:blank' onload='AfterUploadFile(this)' class='h'"), "action='./' id='" . $id . "' role='form' data-toggle='validator' target='downloadFileFrame' method='post' onsubmit=''") . Tags::script("$('#" . $id . "').validator()");
	}
	// -------------------------------------------------------------------------
	static function downloadIframe()
	{
		return self::iframe("", "id='downloadFileFrame' name='downloadFileFrame' src='about:blank' onload='AfterUploadFile(this)' class='h'");
	}
	// -------------------------------------------------------------------------
	static function formularzNonAjax($innerHTML)
	{
		return Tags::formNonAjax($innerHTML);
	}
	// -------------------------------------------------------------------------
	static function ajaxLink($href, $content, $tooltip = null)
	{
		if(null != $tooltip)
		{
			return self::a($content, "onclick='return ajax.go(this)' href='" . $href . "' " . BS::getToolTip($tooltip));
		}
		else
		{
			return self::a($content, "onclick='return ajax.go(this)' href='" . $href . "'");
		}
	}
	// -------------------------------------------------------------------------
}
?>