<?php
namespace braga\project\controllers;
use braga\project\base\RetvalReturner;
use braga\project\base\Tags;
use braga\project\layout\PublicLayout;
use braga\tools\html\Controler;
use braga\widgets\bootstrap\BS;
/**
 * Created on 31 sty 2018 22:35:34
 * error prefix
 * @author Tomasz Gajewski
 * @package
 *
 */
class PublicController extends Controler
{
	use RetvalReturner;
	// -----------------------------------------------------------------------------------------------------------------
	public function doAction()
	{
		$this->setLayOut(new PublicLayout());
		$this->getDefault();
		$this->page();
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function getDefault()
	{
		// $retval = Tags::p(Tags::input("name='u' id='u' type='text' value='' class='c b' style='color:gray; background-color: transparent; border:none; font-size:11pt; width:229px;'"), "style='padding-top:147px; padding-left:284px;'");
		// $retval .= Tags::p(Tags::input("name='p' id='p' type='password' value='' class='c b' style='color:gray; background-color: transparent; border:none; font-size:11pt; width:229px;'"), "style='padding-top:17px; padding-left:284px;'");
		// $retval .= Tags::p(Tags::input("type='button' value='' onclick='loginCobrador(\$(\"#u\").val(), \$(\"#p\").val());' class='' style='background-color: transparent; top:-83px; border:none; height:75px; width:87px; position:relative'"), "style='padding-top:0px;padding-left:528px;'");
		// $retval = Tags::div($retval, "style='width:700px; margin: 0px auto 0 auto;'");
		// $retval = Tags::div($retval, "style='width:100%;height:600px;background-position:top center;background-repeat:no-repeat;background-image:url(\"/img/splash.jpg\");'");
		$retval = Tags::div(BS::button("Zaloguj z Piechocki.ID", "onclick='loginKeyCloak();'", "btn-success btn-lg"), "class='c'");

		if($this->isXhr())
		{
			$this->r->addChange($retval, "#Workspace");
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}