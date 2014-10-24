<?php
/**
 * indexAction.php
 * 
 * @package	dev-test
 * @author	guanhua(guanhua2011@gmail.com)
 * @version	v1.0.0
 */
class docAction extends BaseAction
{
	public function execute()
    {  	
    	$id = end(explode('/', $this->getUrlPath()));
    	ob_start();
    	if(is_numeric($id)){
    		$this->setTpl("doc/{$id}.tpl");
    	}else{
    		$this->setTpl("index.tpl");
    	}
    	$this->display();
    } 
}