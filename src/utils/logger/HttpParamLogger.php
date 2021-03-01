<?php
namespace braga\project\utils\logger;
use braga\graylogger\Factory;
use braga\tools\tools\PostLogger;
class HttpParamLogger implements PostLogger
{
	// -----------------------------------------------------------------------------------------------------------------
	public function save(array $post)
	{
		if(isset($post["action"]))
		{
			if(isset($post["password"]))
			{
				$post["password"] = "********";
			}
			$log = Factory::getInstance("request");
			$message = $post["action"];
			$context = array();
			$context["uri"] = $_SERVER["REQUEST_URI"];
			$context["method"] = $_SERVER["REQUEST_METHOD"];
			if(isset($_SERVER["HTTP_REFERER"]))
			{
				$context["http_referer"] = $_SERVER["HTTP_REFERER"];
			}
			$context["request_raw_data"] = json_encode($_REQUEST, JSON_PRETTY_PRINT);
			$context["request_clear_data"] = json_encode($post, JSON_PRETTY_PRINT);

			$context["action"] = $post["action"];
			$log->info($message, $context);
		}
	}
	// -----------------------------------------------------------------------------------------------------------------
}

