<?php
namespace braga\project\controller;
use Monolog\Logger;
use braga\project\utils\logger\MainLogger;
use braga\tools\api\BaseRestController;
use braga\tools\tools\RequstUrl;

/**
 * Created on 6 paź 2017 18:05:43
 * @author Tomasz Gajewski
 * package controllers
 * error prefix CB:291
 */
class SuperController extends BaseRestController
{
	// -----------------------------------------------------------------------------------------------------------------
	public function doAction()
	{
		$this->setLoggerClassNama(MainLogger::class);
		try
		{
			$modul = RequstUrl::get(1);
			switch($modul)
			{
			}
		}
		catch(\Throwable $e)
		{
			$this->sendError($e);
			MainLogger::exception($e, Logger::ERROR);
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}