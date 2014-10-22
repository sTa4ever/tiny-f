<?php
/**
 * env_init.php
 * 
 * @package	tiny-f
 * @author	guanhua2011(guanhua2011@gmail.com)
 * @version	v1.0.0
 */

define('APP_PATH', dirname(__FILE__) .'/..');



/** We will use autoloader instead of include path. */
$g_appIncludePath = APP_PATH .'/action/:'.
				  APP_PATH .'/model/:' .
				  APP_PATH .'/config/:' .
                  APP_PATH .'/lib/:' .

require_once APP_PATH . '/lib/config/PublicConfig.php';