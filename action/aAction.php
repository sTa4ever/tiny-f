<?php
/**
 * aAction.php
 * 
 * @package	dev-test
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class aAction extends BaseAction
{
    public function execute()
    {
    	$params = $this->getRequestParams();
    	$cache = memcache::getInstance('appid846cagrris');
    	$cache->set('testkey', json_encode($params));
    	echo $cache->get('testkey');
    } 
}