<?php
namespace braga\project\base;

/**
 * Created on 2 lis 2013 11:49:32
 * @author Tomasz Gajewski
 * @package frontoffice
 * error prefix
 */
class PageNavi
{
	// -------------------------------------------------------------------------
	protected $ajax = false;
	protected $href;
	protected $iloscRecordow;
	protected $itemsPerPage;
	protected $iloscStron;
	protected $strona;
	protected $previewText = "&laquo;";
	protected $nextText = "&raquo;";
	protected $pageString = "%_PAGE_NO_STRING_%";

	// -------------------------------------------------------------------------
	public function setAjax($ajax)
	{
		$this->ajax = $ajax;
	}
	// -------------------------------------------------------------------------
	public function setHref($href)
	{
		$this->href = $href;
	}
	// -------------------------------------------------------------------------
	public function setIloscRecordow($iloscRecordow)
	{
		$this->iloscRecordow = $iloscRecordow;
	}
	// -------------------------------------------------------------------------
	public function setItemsPerPage($itemsPerPage)
	{
		$this->itemsPerPage = $itemsPerPage;
	}
	// -------------------------------------------------------------------------
	public function setIloscStron($iloscStron)
	{
		$this->iloscStron = $iloscStron;
	}
	// -------------------------------------------------------------------------
	public function setStrona($strona)
	{
		$this->strona = $strona;
	}
	// -------------------------------------------------------------------------
	public function setPreviewText($previewText)
	{
		$this->previewText = $previewText;
	}
	// -------------------------------------------------------------------------
	public function setNextText($nextText)
	{
		$this->nextText = $nextText;
	}
	// -------------------------------------------------------------------------
	public function setPageString($pageString)
	{
		$this->pageString = $pageString;
	}
	// -------------------------------------------------------------------------
	public function getAjax()
	{
		return $this->ajax;
	}
	// -------------------------------------------------------------------------
	public function getHref()
	{
		return $this->href;
	}
	// -------------------------------------------------------------------------
	public function getIloscRecordow()
	{
		return $this->iloscRecordow;
	}
	// -------------------------------------------------------------------------
	public function getItemsPerPage()
	{
		return $this->itemsPerPage;
	}
	// -------------------------------------------------------------------------
	public function getIloscStron()
	{
		return $this->iloscStron;
	}
	// -------------------------------------------------------------------------
	public function getStrona()
	{
		return $this->strona;
	}
	// -------------------------------------------------------------------------
	public function getPreviewText()
	{
		return $this->previewText;
	}
	// -------------------------------------------------------------------------
	public function getNextText()
	{
		return $this->nextText;
	}
	// -------------------------------------------------------------------------
	public function getPageString()
	{
		return $this->pageString;
	}
	// -------------------------------------------------------------------------
	public function out()
	{
		$this->init();

		if($this->getIloscStron() > 1)
		{
			$retval = $this->getPreviewPage();
			if($this->getIloscStron() > 10)
			{
				$retval .= $this->getBodyFragment();
			}
			else
			{
				$retval .= $this->getBodyFull();
			}
			$retval .= $this->getNextPage();

			$retval = Tags::ul($retval, "class='pagination zPrawej'");
			$retval = Tags::nav(Tags::span("Znaleziono: " . $this->getIloscRecordow(), "class='zLewej' style='padding-top:30px'") . $retval);
			// $retval = ;
			return $retval;
		}
	}
	// -------------------------------------------------------------------------
	protected function getBodyFragment()
	{
		$retval = "";
		if($this->getStrona() < 6)
		{
			$startDot = "";
			$endDot = Tags::li(Tags::a("...", "href='#'"));
			$href = $this->getHrefTranslated($this->iloscStron);
			if($this->getAjax())
			{
				$endDot .= Tags::li(Tags::ajaxLink($href, $this->iloscStron));
			}
			else
			{
				$endDot .= Tags::li(Tags::a($this->iloscStron, "href='" . $href . "'"));
			}
			$fromCount = 1;
			$endCount = 7;
		}
		elseif($this->getStrona() > ($this->getIloscStron() - 5))
		{
			$href = $this->getHrefTranslated(1);
			if($this->getAjax())
			{
				$startDot = Tags::li(Tags::ajaxLink($href, "1"));
			}
			else
			{
				$startDot = Tags::li(Tags::a("1", "href='" . $href . "'"));
			}
			$startDot .= Tags::li(Tags::a("...", "href='#'"));
			$endDot = "";
			$fromCount = $this->getIloscStron() - 5;
			$endCount = $this->getIloscStron();
		}
		else
		{
			$href = $this->getHrefTranslated(1);
			if($this->getAjax())
			{
				$startDot = Tags::li(Tags::ajaxLink($href, "1"));
			}
			else
			{
				$startDot = Tags::li(Tags::a("1", "href='" . $href . "'"));
			}
			$startDot .= Tags::li(Tags::a("...", "href='#'"));
			$endDot = Tags::li(Tags::a("...", "href='#'"));
			$href = $this->getHrefTranslated($this->iloscStron);
			if($this->getAjax())
			{
				$endDot .= Tags::li(Tags::ajaxLink($href, $this->iloscStron));
			}
			else
			{
				$endDot .= Tags::li(Tags::a($this->iloscStron, "href='" . $href . "'"));
			}
			$fromCount = $this->getStrona() - 2;
			$endCount = $this->getStrona() + 2;
		}
		$retval .= $startDot;
		for($a = $fromCount; $a <= $endCount; $a++)
		{
			if($a == $this->getStrona())
			{
				$retval .= Tags::li(Tags::a($a, "href='#'"), "class='active'");
			}
			else
			{
				$href = $this->getHrefTranslated($a);

				if($this->getAjax())
				{
					$retval .= Tags::li(Tags::ajaxLink($href, $a));
				}
				else
				{
					$retval .= Tags::li(Tags::a($a, "href='" . $href . "'"));
				}
			}
		}
		$retval .= $endDot;
		return $retval;
	}
	// -------------------------------------------------------------------------
	protected function getBodyFull()
	{
		$retval = "";
		for($a = 1; $a <= $this->getIloscStron(); $a++)
		{
			if($a != $this->getStrona())
			{
				$href = $this->getHrefTranslated($a);
				if($this->ajax)
				{
					$retval .= Tags::li(Tags::ajaxLink($href, $a));
				}
				else
				{
					$retval .= Tags::li(Tags::a($a, "href='" . $href . "'"));
				}
			}
			else
			{
				$retval .= Tags::li(Tags::a($a, "href='#'"), "class='active'");
			}
		}
		return $retval;
	}
	// -------------------------------------------------------------------------
	protected function getNextPage()
	{
		if($this->getStrona() != $this->getIloscStron())
		{
			$href = $this->getHrefTranslated($this->getStrona() + 1);
			if($this->getAjax())
			{
				return Tags::li(Tags::ajaxLink($href, $this->getNextText()));
			}
			else
			{
				return Tags::li(Tags::a($this->getNextText(), "href='" . $href . "'"));
			}
		}
		else
		{
			return Tags::li(Tags::a($this->getNextText(), "href='#'"));
		}
	}
	// -------------------------------------------------------------------------
	protected function getPreviewPage()
	{
		if($this->getStrona() != 1)
		{
			$href = $this->getHrefTranslated($this->getStrona() - 1);
			if($this->getAjax())
			{
				return Tags::li(Tags::ajaxLink($href, $this->getPreviewText()));
			}
			else
			{
				return Tags::li(Tags::a($this->getPreviewText(), "href='" . $href . "'"));
			}
		}
		else
		{
			return Tags::li(Tags::a($this->getPreviewText(), "href='#'"));
		}
	}
	// -------------------------------------------------------------------------
	protected function getHrefTranslated($strona)
	{
		return str_replace($this->getPageString(), $strona, $this->href);
	}
	// -------------------------------------------------------------------------
	protected function init()
	{
		if(is_null($this->getIloscStron()))
		{
			$this->setIloscStron(ceil($this->getIloscRecordow() / $this->getItemsPerPage()));
		}
		if(strpos($this->getHref(), $this->getPageString()) === false)
		{
			$this->setHref($this->getHref() . "&amp;page=" . $this->getPageString());
		}
	}
	// -------------------------------------------------------------------------
}
?>