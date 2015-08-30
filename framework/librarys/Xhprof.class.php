<?php
class Xhprof
{
    
    private static $is_start =false;    /*表示是否已启动xhprof*/

    private static function isOpen()
    {
        return Config::get('xhprof.is_open');
    }

    public static function start()
    {
        if ( !self::isOpen()) {
            return false;
        }

        if(self::$is_start === true){
            return false;
        }
        //XHPROF_FLAGS_NO_BUILTINS 是否跳过内部函数
        function_exists('xhprof_enable') && xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
        self::$is_start = true;
    }

    public static function end()
    {
        if (self::$is_start) {
            if (function_exists('xhprof_disable')) {
                $xhprof_data = xhprof_disable();
                include(SYSPATH.'librarys/xhprof/xhprof_lib/utils/xhprof_lib.php');
                include(SYSPATH.'librarys/xhprof/xhprof_lib/utils/xhprof_runs.php');
                $save_path = Config::get('xhprof.save_path') ?:''; 
                $xhprof_runs = new XHProfRuns_Default($save_path);
                $type = str_replace('/', '.', Router::getUri())?:'index';
                $run_id = $xhprof_runs->save_run($xhprof_data, $type, Date('YmdHis'));
                $url = "http://www.xhprof.me/xhprof_html/index.php?run={$run_id}&source={$type}&path=".urlencode(base64_encode($save_path));
                echo '<div><a target="_blank"  href="'.$url.'">xhprof性能分析</a>';
            }            
        }
    }
}
