<?php
if (defined('LAI_ROOT') === false) die("Hacked");

class Hooks
{    
    private $_config     = array();
    private $_json_data  = array();
    private $_users_info = array();
    /**
     * 构造函数
     */
    public function __construct() {
        $config = include_once (LAI_ROOT . '/config.php');
        if (!is_array($config))
            $this->_logerror("Config File is Error~");
        $this->_config = $config;
    }

    /**
     * 处理逻辑
     */
    public function handle() {
        $parse_res = $this->_parseJson();
        if ($parse_res === false)
            $this->_logerror('[ Hanle ]Object is Error~'.trim(file_get_contents('php://input')));
        if(isset($this->_json_data['object_kind'])){
            $this->_eventMergeRequest();
        }else if(isset($this->_json_data['before']) && isset($this->_json_data['after'])){
            $this->_eventPushRequest();
        }
        echo 'Done';
    }
    /**
     * 解析GitLab传递过来的JSON对象
     */
    private function _parseJson() {
        $str  = trim(file_get_contents('php://input'));
        $json = json_decode($str, true);
        //对象无法解析，或者不正确直接返回
        if (!is_array($json)) 
            return false;
        $this->_json_data = $json;
        return true;
    }
    /**
     * Push 事件推送
     * @return [type] [description]
     */
    private function _eventPushRequest(){
        //todo
    }
    /**
     * merge_request 事件操作
     * @return [type]
     */
    private function _eventMergeRequest() {
        
        $attrs = $this->_json_data['object_attributes'];
        if (!$attrs) 
            return false;
        //todo 
    }

    /**
     * CURL
     * @param  [type] $url    [description]
     * @param  string $method [description]
     * @return [type]         [description]
     */
    private function _curl($url, $method = 'get'){
           $ch = curl_init();  
           curl_setopt($ch, CURLOPT_URL, $url);  
           curl_setopt($ch, CURLOPT_HEADER, false);
           curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
           curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
           $filecontent=curl_exec($ch);  
           curl_close($ch);
           return $filecontent;
    }
}

