<?php
namespace braga\project\base;
use braga\project\config\Config;

/**
 * Created on 23.07.2017 16:15:21
 * @author Tomasz Gajewski
 * package frontoffice
 * error prefix
 */
trait AddPageNavi
{
	// -----------------------------------------------------------------------------------------------------------------
	/**
	 * @var PageNavi
	 */
	protected $pageNavi;
	// -----------------------------------------------------------------------------------------------------------------
	public function outNavi($content)
	{
		return $this->pageNavi->out() . $content . $this->pageNavi->out();
	}
	// -----------------------------------------------------------------------------------------------------------------
	protected function initPageNavi($strona, $iloscRekordow, $href)
	{
		$this->pageNavi = new PageNavi();
		$this->pageNavi->setStrona($strona);
		$this->pageNavi->setIloscRecordow($iloscRekordow);
		$this->pageNavi->setItemsPerPage(Config::getPageLimit());
		$this->pageNavi->setHref($href);
		$this->pageNavi->setAjax(true);
		$this->lpCounter = ($strona - 1) * Config::getPageLimit() + 1;
	}
	// -----------------------------------------------------------------------------------------------------------------
}