<?php

require_once(dirname(__FILE__) . '/Mustache.php');

abstract class JOFB_Base {
    protected $defaultConfig = array();
    protected $config;
    
    protected function renderTemplate($template, $view){
        $m = new Mustache;
        return $m->render($template, $view);
    }
    
    protected function setConfig($config){
        $this->config = array_merge($this->defaultConfig, $config);
    }
}

class JOFB_Counter {
    public $counter = 0;
    
    public function __constructor($start=0){
        $this->counter = (int) $start;
    }
    
    public function get(){
        $this->counter++;
        return $this->counter;
    }
}

if(!function_exists('print_rr')){
    function print_rr($array, $exit=true){
        echo '<pre>';
        var_export($array);
        echo '</pre>';
        
        if($exit){
            exit;
        }
    }
}

if(!function_exists('elv')){
    function elv($v){
        error_log(var_export($v, true));
    }
}

if(!function_exists('array_walk_recursive_full')){
    function array_walk_recursive_full(&$array, $func){
        $array = call_user_func($func, $array);
        
        foreach($array as &$value){
            if(!is_array($value)){
                continue;
            }
            
            $value = call_user_func($func, $value);
            
            array_walk_recursive_full($value, $func);
        }
    }
}