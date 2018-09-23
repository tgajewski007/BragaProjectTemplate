<?php
namespace braga\project\base;
use braga\tools\html\BaseTags;
use braga\widgets\bootstrap\MessageView;
/**
 * Created on 05.09.2016 22:41:54
 * error prefix
 * @author Tomasz Gajewski
 * @package
 *
 */
class Retval extends \braga\tools\tools\Retval
{
	// -----------------------------------------------------------------------------------------------------------------
	protected function getFormatedMessage()
	{
		$m = new MessageView();
		return $m->out();
	}
	// -----------------------------------------------------------------------------------------------------------------
	public function getAjax()
	{
		$msg = $this->getFormatedMessage();
		$this->addChange($msg, "#MsgBox");

		$retval = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$retval .= BaseTags::custom("changes", $this->ajax, "date='" . date(PHP_DATETIME_FORMAT) . "'");
		return $retval;
	}
	// -----------------------------------------------------------------------------------------------------------------
}
?>