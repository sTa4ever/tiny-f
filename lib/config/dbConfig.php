<?php
/**
 * dbConfig.php
 * 
 * @package	config
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class dbConfig
{
    public static $dbConfigArr = array(
    	'eNOCPlztKslnWPEPKktG' => array(
    		'host' 		=> 'sqld.duapp.com',#getenv('HTTP_BAE_ENV_ADDR_SQL_IP'),
    		'port' 		=> '4050',#getenv('HTTP_BAE_ENV_ADDR_SQL_PORT'),
    		'user' 		=> 'Gl7SX5iSM5h9K6UlAME9IwNW',#getenv('HTTP_BAE_ENV_AK'),
    		'password' 	=> '0w46FtAeAQHbNIDasDPiMot9OTfNzIg1',#getenv('HTTP_BAE_ENV_SK'),
    		'try_num'	=> 2,
    		'charset'	=> 'utf8',
    	),
    );
}