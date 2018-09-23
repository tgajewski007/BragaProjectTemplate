<?php
namespace braga\project\controllers;
use braga\project\base\Page;
use braga\project\base\RetvalReturner;
use braga\project\layout\StartLayout;
use braga\tools\html\Controler;
use braga\tools\tools\PostChecker;

/**
 * Created on 13 lip 2013 14:17:27
 * @author Tomasz Gajewski
 * @package controllers
 * error prefix CB:290
 */
class StartController extends Controler
{
	use RetvalReturner;
	// -----------------------------------------------------------------------------------------------------------------
	public function doAction()
	{
		switch(PostChecker::get("action"))
		{
			// ---------------------------
			case "GetStartPage":
			case "":
				$this->getDefaultPage();
				break;
			default :
				addAlert("CB:29001 " . PostChecker::get("action") . " nie jest obsługiwane");
				break;
		}
		$this->page();
	}
	// -----------------------------------------------------------------------------------------------------------------
	private function getDefaultPage()
	{
		try
		{
			$retval = "";
			$this->setLayOut(new StartLayout());
			$this->layOut->setContent($retval);
			$retval = $this->layOut->out();
			if($this->isXhr())
			{
				$this->r->addChange($retval, "#Workspace");
			}
			else
			{
				Page::make($retval);
			}
		}
		catch(\Exception $e)
		{
			addAlert($e->getMessage());
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}
?>