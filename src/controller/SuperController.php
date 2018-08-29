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
		$idModul = null;
		if(isset($_REQUEST["modul"]))
		{
			$idModul = $_REQUEST["modul"];
		}
		switch($idModul)
		{
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}