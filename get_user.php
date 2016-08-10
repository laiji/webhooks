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
$user_str = file_get_contents(LAI_ROOT . '/core/users.json');
$users = json_decode($user_str, true);
$new_user = array();
foreach ($users as $user) {
    $name = $user['name'];
    $id = $user['id'];
    $username = $user['username'];
    $new_users[$id] = array('username' => $username, 'name' => $name);
}
$new_user_str=json_encode($new_users);
file_put_contents(LAI_ROOT.'/core/new_user.json', $new_user_str);

//$Hooks = new Hooks();
//$Hooks->handle();

