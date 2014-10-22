<?php
/**
 * ActionController
 * 
 * @package	framework
 * @author	guanhua2011(guanhua2011@gmail.com)
 * @version	v1.0.0
 */
class ActionController
{
	private $ruleConfig = array();
	private $hashMapping = array();
	private $prefixMapping = array();
	private $regexMapping = array();
	
	private function getDispatchedAction($request_uri){
		if(!empty($this->hashMapping[$request_uri])){
			return $this->hashMapping[$request_uri];
		}
		foreach($this->prefixMapping as $k => $v){
			if(strpos($request_uri, $k) === 0){
				return $v;
			}
		}
		foreach($this->regexMapping as $k => $v){
			if(preg_match($k, $request_uri)){
				return $v;
			}
		}
		return false;
	}
	
   	public function initial($config)
   	{
   		if(!empty($config['rule_config'])) {
   			$this->ruleConfig = $config['rule_config'];
   		}
   		if(!empty($config['hash_mapping'])){
   			$this->hashMapping = $config['hash_mapping'];
   		}
   		if(!empty($config['prefix_mapping'])) {
   			$this->prefixMapping = $config['prefix_mapping'];
   		}
   		if(!empty($config['hash_mapping'])){
   			$this->regexMapping = $config['regex_mapping'];
   		}
   	}
   	
   	public function execute($request_uri)
   	{
   		$action = $this->getDispatchedAction($request_uri);
   		if ($action){
   			$ins = new $action();
   			return $ins->execute();
   		}
   		return false;
   	}
}