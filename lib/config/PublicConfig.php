<?php
/**
 * PublicConfig
 * 
 * @package	framework
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */

define('PUBLIC_LIB', dirname(__FILE__).'/../');

class PublicLibManager
{
    private $arrClasses;

	private static $instance;

	public static function getInstance()
	{
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct()
	{
		$this->arrClasses = array(
			'ActionControllerConfig' => PUBLIC_LIB.'framework/ActionControllerConfig.php',
			'Application'		=> PUBLIC_LIB . 'framework/Application.php',
			'ActionController'	=> PUBLIC_LIB . 'framework/ActionController.php',
			'BaseAction'		=> PUBLIC_LIB . 'framework/BaseAction.php',		
		
			'dbConfig'			=> PUBLIC_LIB . 'config/dbConfig.php',
			'dbProxy'			=> PUBLIC_LIB . 'dbproxy/dbProxy.php',
		
			'memcache'			=> PUBLIC_LIB . 'memcache/memcache.php',
		);
	}
	
	public function getPublicClassNames()
	{
		return $this->arrClasses;
	}

	public function RegisterMyClassName($className, $classPath)
	{
		$this->arrClasses[$className] = $classPath;
	}

	public function RegisterMyClasses(array $classes)
	{
		$this->arrClasses = array_merge($this->arrClasses, $classes);
	}
}

/**
 * Register user defined class into phplib's autoloader
 * @param string $className	Name of user defined class
 * @param string $classPath	File path of user defined class
 */
function RegisterMyClassName($className, $classPath)
{
	$PublicClassName = PublicLibManager::getInstance();
	$PublicClassName->RegisterMyClassName($className, $classPath);
}

/**
 * Register User defined classes into phplib's autoloader
 * @param array $classes	Class infos, use format: array(classname => class file path, ...)
 */
function RegisterMyClasses(array $classes)
{
	$PublicClassName = PublicLibManager::getInstance();
	$PublicClassName->RegisterMyClasses($classes);
}

function PublicLibAutoLoader($className)
{
	global $g_appIncludePath;
	$PublicClassName = PublicLibManager::getInstance();
	$arrPublicClassName = $PublicClassName->getPublicClassNames();
	if (array_key_exists($className, $arrPublicClassName)) {
		require_once($arrPublicClassName[$className]);
	} else {
		$classFile = $className .'.php';
		//如果有多个autoloader的话，这个地方会报很多的warning。
		//所以不直接用include_once，需要改写include_path的作用逻辑。
		//对性能会有少许的影响。
		//不能error_reporting(0),会使类文件里的语法等错误无法报出，影响排错。
		$include_path = explode(':', $g_appIncludePath);
		foreach ($include_path as $path_dir) {
			$real_path = rtrim($path_dir, '/') . '/' .$classFile;
			if (file_exists($real_path)) {
				require_once($real_path);
			}
		}
	}
}

spl_autoload_register('PublicLibAutoLoader');