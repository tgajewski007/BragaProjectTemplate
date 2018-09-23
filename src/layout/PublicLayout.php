<?php
namespace braga\project\layout;
use braga\project\base\Page;
use braga\project\base\Tags;
use braga\tools\html\HtmlComponent;
use braga\widgets\bootstrap\MessageView;

/**
 * Created on 13 lip 2013 13:58:25
 * @author Tomasz Gajewski
 * @package frontoffice
 * error prefix
 */
class PublicLayout extends HtmlComponent
{
	// -----------------------------------------------------------------------------------------------------------------
	public function out()
	{
		$msg = new MessageView();
		$retval = "";
		$retval .= Tags::div($this->content, "id='MainBox'  class='col-xs-12 col-sm-12 col-md-12 col-lg-12'");
		$retval = Tags::div($retval, "class='row'");
		$retval = Tags::div($retval, "class='container-fluid'");
		$retval .= Tags::div($msg->out(), "id='MsgBox' class='container-fluid'");
		Page::make($retval);
		// return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
}