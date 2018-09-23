<?php
namespace braga\project\layout;
use braga\project\base\Tags;
use braga\widgets\bootstrap\MessageView;

/**
 * Created on 19.06.2017 22:00:05
 * author Tomasz Gajewski
 * package frontoffice
 * error prefix
 */
class StartLayout extends Layout
{
	// -----------------------------------------------------------------------------------------------------------------
	public function out()
	{
		$msg = new MessageView();
		$retval = "";
		$retval .= Tags::div($this->content, "id='MainBox' class='container-fluid'");
		$retval .= Tags::div($msg->out(), "id='MsgBox' class='container-fluid'");
		$retval .= $this->addMenu();
		// Page::make($retval);
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
}