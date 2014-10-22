<?php
/**
 * BaseAction.php
 * 
 * @package	framework
 * @author	guanhua01(guanhua01@baidu.com)
 * @version	v1.0.0
 */
class BaseAction
{
	//模板名称
	protected $tpl;
	//模板数据
	protected $tpl_data;
	
    /**
     * Constructor: initialize the BaseAction instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->tpl_data = array();
    }
    
    protected function getRequestParams()
    {
    	return array_merge($_GET, $_POST);
    }
    
    /**
     * 设置模板
     * @param string $tpl
     */
    protected function setTpl($tpl)
    {
    	$this->tpl = $tpl;
    }
    
    /**
     * 设置模板数据
     * @param array $data
     */
    protected function setTplData($data)
    {
    	$this->tpl_data = $data;
    }
    
    /**
     * 展示页面
     */
    protected function display()
    {
    	ob_start();
    	$tpl_data = $this->tpl_data;
    	$file = dirname(__FILE__).'/../../templates/'.$this->tpl;
    	if(file_exists($file)){
    		include($file);
    	}else{
    		echo 'NOT FOUND';
    	}
    	$ret = ob_get_contents();
    	ob_end_clean();
    	echo $ret;
    }
    
	/**
     * 获取url path
     * 
     * @return string
     */
    protected function getUrlPath()
    {
    	return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}