<?php
$system_path = "system";

if (($_temp = realpath($system_path)) !== FALSE)
{
	$system_path = $_temp.'/';
}
else
{
	// Ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';
}

// Is the system path correct?
if ( ! is_dir($system_path))
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3); // EXIT_CONFIG
}
define('BASEPATH', str_replace('\\', '/', $system_path));

//打印方法  暂时性的  s
if(! function_exists("p"))
{
	function p($data,$falg = 1)
	{
		if($falg != 1)
		{
			var_dump($data);exit;
		}
		else
		{
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			exit;
		}
	}
}
//  end
//时区
date_default_timezone_set('Asia/Shanghai');
// Startup
require_once(BASEPATH . 'startup.php');

//项目目录
$application_config = 'application';

// Application
require_once(BASEPATH . 'framework.php');