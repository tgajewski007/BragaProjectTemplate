<?php
namespace braga\project\layout;
use braga\project\base\Tags;
use braga\tools\html\HtmlComponent;
use braga\widgets\bootstrap\MessageView;

/**
 * Created on 13 lip 2013 16:24:56
 * @author Tomasz Gajewski
 * @package frontoffice
 * error prefix
 */
class Layout extends HtmlComponent
{
	// -----------------------------------------------------------------------------------------------------------------
	public function out()
	{
		$msg = new MessageView();
		$retval = "";
		$retval .= Tags::div("", "id='LeftMenu'  class='col-xs-6 col-sm-4 col-md-4 col-lg-3'");
		$retval .= Tags::div($this->content, "id='MainBox'  class='col-xs-6 col-sm-8 col-md-8 col-lg-9'");
		$retval = Tags::div($retval, "class='row'");
		$retval = Tags::div($retval, "class='container-fluid'");

		$retval .= Tags::div($msg->out(), "id='MsgBox' class='container-fluid'");
		$retval .= $this->addMenu();
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function addMenu()
	{
		$retval = "";
		$menu = "";
		// foreach(Modul::getAll() as $m)
		// /** @var Modul $m */
		// {
		// if(Uzytkownik::getCurrent()->czyPosiadaPrawo($m))
		// {
		// if($m->isWidoczny())
		// {
		// $menu .= $this->addMenuTab($m);
		// }
		// }
		// }
		$retval .= Tags::ul($menu, "class='nav navbar-nav'");
		$retval .= $this->addLogoutTab();

		$retval = Tags::div($retval, 'class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"');

		$retval = Tags::div($this->getSmallMenuButton() . $retval, "class='container-fluid'");
		$retval = Tags::nav($retval, "class='navbar navbar-fixed-top navbar-inverse' id='Menu'");
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function getSmallMenuButton()
	{
		return '<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Start</a>
		</div>';
	}
	// -----------------------------------------------------------------------------------------------------------------
	// protected function addMenuTab(Modul $m)
	// {
	// if(Modul::getCurrent()->getIdModul() == $m->getIdModul())
	// {
	// $retval = Tags::li(Tags::ajaxLink("/" . $m->getFolder() . "/", Tags::span($m->getNazwa(), "onclick='window.history.pushState(null, \"" . $m->getNazwa() . "\", \"/" . $m->getFolder() . "/\");' class=''")), "class='active'");
	// }
	// else
	// {
	// $retval = Tags::li(Tags::ajaxLink("/" . $m->getFolder() . "/", Tags::span($m->getNazwa(), "onclick='window.history.pushState(null, \"" . $m->getNazwa() . "\", \"/" . $m->getFolder() . "/\");' class=''")), "class=''");
	// }
	// return $retval;
	// }
	// -----------------------------------------------------------------------------------------------------------------
	protected function addLogoutTab()
	{
		$buttonMenu = faIcon("fa-fw fa-lg fa-user-circle-o") . "Witaj "; // . Uzytkownik::getCurrent()->getFullName();
		$buttonMenu .= Tags::span("", "class='caret'");
		$buttonMenu = Tags::a($buttonMenu, 'href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"');

		$menu = Tags::li(Tags::ajaxLink("/?action=ChangePassForm", faIcon("fa-fw fa-lg fa-key") . "Zmień hasło"));
		$menu .= Tags::li(Tags::ajaxLink("/zgloszenia/", Tags::span(faIcon("fa-fw fa-lg fa-bug") . "Moje zgłoszenia", "onclick='window.history.pushState(null, \"Moje zgłoszenia\",  \"/zgloszenia/\");'")));
		$menu .= Tags::li(Tags::ajaxLink("/zgloszenia/?action=GetNewIssuePopupForm", faIcon("fa-fw fa-lg fa-plus") . "Dodaj zgłoszenie"));
		$menu .= Tags::li(Tags::a(faIcon("fa-fw fa-lg fa-sign-out") . "Wyloguj", "href='#' onclick=logOutKeyCloak(); return false;"));
		$menu = Tags::ul($menu, "class='dropdown-menu'");

		$retval = Tags::li($buttonMenu . $menu, "class='dropdown'");
		$retval = Tags::ul($retval, "class='nav navbar-nav navbar-right'");
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function addStartTab()
	{
		$retval = Tags::div(Tags::a("Start", "href='/' class='navbar-brand'"), "class='navbar-header'");
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function addStartTabActive()
	{
		$retval = Tags::div(Tags::a("Start", "href='/' class='navbar-brand'"), "class='navbar-header active'");
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
}
?>