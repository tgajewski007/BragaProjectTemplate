<?php
namespace braga\project\controllers;

/**
 * Created on 6 paź 2017 18:05:43
 * @author Tomasz Gajewski
 * package controllers
 * error prefix CB:291
 */
class SuperController
{
	// -----------------------------------------------------------------------------------------------------------------
	public function doAction()
	{
		$serviceName = null;
		if(isset($_REQUEST["serice_name"]))
		{
			$serviceName = $_REQUEST["serice_name"];
		}
		switch($serviceName)
		{
			default :
				// InteriorSsoPerms::pageOpen();
				$d = new StartController();
				$d->doAction();
				break;
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}