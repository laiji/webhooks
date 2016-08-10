<?php
/**
 * 核心配置文件
 */
if (defined('LAI_ROOT') === false) die("Hacked");
return array(
	'52' => array(
		'repository' => 'skylar_web_code', //仓库名称，如skylar_web_code
		'branches' => array('develop' => 'skylar_develop.sh'), //对应的分支执行不同的shell脚本,支持多个分支
		'emails' => 'lailaiji@360.cn',
		'title' => '[G-qiyeban-webdev] [ 天擎6 合并分支] [www]'
		),	
	'51' => array(
		'repository' => 'skylar_server_code', //仓库名称
		'branches' => array(), //对应的分支执行不同的shell脚本,支持多个分支
		'emails' => 'lailaiji@360.cn',
		'title' => '[g-qiyeban-serverdev] [ 天擎6 合并分支] [server]'
		)
	);

