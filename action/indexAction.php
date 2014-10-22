<?php
/**
 * indexAction.php
 * 
 * @package	dev-test
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class indexAction extends BaseAction
{
	public function execute()
    {
    	/*echo 'IP'.getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
    	echo 'port'.getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
    	echo 'user'.getenv('HTTP_BAE_ENV_AK');
    	echo 'password'.getenv('HTTP_BAE_ENV_SK');*/
    	
    	ob_start();
    	$this->setTpl('index.tpl');
    	$this->setTplData(array('baidu'=>'baidu'));
    	$this->display();
    	#$aaa = 'testetst';
    	#include(dirname(__FILE__)."/../templates/index.tpl");
    	#echo 'aaaa';
    	#$out = ob_get_contents();
    	#ob_end_clean();
    	#echo $out;
    } 
}