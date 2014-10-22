<?php
// Following is the default setting, usally you needn't to modify it
//ActionControllerConfig::$config['rule_config'] = array('begindex' => 0);

// Following is the has mapping rules, which are always dispatched first
ActionControllerConfig::$config['hash_mapping'] = array(
	'/aaa' => 'aAction',
);

// Following is the prefix mapping rules, which are dispatched as the second choice
//ActionControllerConfig::$config['prefix_mapping'] = array();
ActionControllerConfig::$config['prefix_mapping'] = array(
 	'/bbb' => 'bAction',
 	'/doc' => 'docAction',
);

// Following is the regex mapping rules, which are always dispatched as the last choice
ActionControllerConfig::$config['regex_mapping'] = array(
	'/.*/' => 'indexAction',
);
