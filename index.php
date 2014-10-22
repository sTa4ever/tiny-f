<?php
/**
 * index.php
 * 
 * @package	dev-test
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */

require_once (dirname(__FILE__) . '/common/env_init.php');

require_once (APP_PATH.'/controller/uri_dispatch_rules.php');

Application::start(ActionControllerConfig::$config);
 
/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */	
