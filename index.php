<?php
/** 
 * 执行上层传递过来的hooks
 * 1、验证并解析JSON
 * 2、处理对应的操作，目前支持PUSH及merge_request操作
 * 3、对应的branch进行处理分发
 */

header("Content-type: text/html; charset=utf-8");
define(LAI_ROOT, __DIR__);
require_once LAI_ROOT . "/core/Hooks.php";
$Hooks = new Hooks();
$Hooks->handle();