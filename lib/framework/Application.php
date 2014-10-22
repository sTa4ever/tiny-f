<?php

/***************************************************************************
 *
 * Copyright (c) 2013, Inc. All Rights Reserved
 *
 **************************************************************************/

/**
 * Web application entrance.
 * 
 * @package	Framework
 * @author	guanhua2011(guanhua2011@gmail.com)
 * @version	v1.0.0
 */
class Application 
{
	public function execute($actionControllerConfig, $request_uri)
	{
		$actionController = new ActionController();
		$actionController->initial($actionControllerConfig);
		return $actionController->execute($request_uri);
	}
	/**
	 * Start an application use the default setting.
	 * 
	 * @param array $actionController
	 * @param string $request_uri
	 * @return bool
	 */
	public static function start($actionControllerConfig){
		$app = new self();
		$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		return $app->execute($actionControllerConfig, $request_uri);
	}
}

/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */