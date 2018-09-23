<?php
namespace braga\project\base;

/**
 * Created on 3 maj 2015 14:58:06
 * error prefix
 * @author Tomasz Gajewski
 * @package
 *
 */
trait RetvalReturner
{
	// -----------------------------------------------------------------------------------------------------------------
	protected function getRetvalObject()
	{
		return new Retval();
	}
	// -----------------------------------------------------------------------------------------------------------------
}
?>