<?php
/**
 *  检测函数执行时间工具类
 *
 *  @author mxj <xxx@qq.com>
 *
 */

namespace Tools;
use Tools;
/**
 *  检测函数执行时间工具类
 *
 *  @author mxj <xxx@qq.com>
 */
class Timetest
{
    static $exec_start_time;
    /**
     * 输出时间
     * 
     * @param string $str 默认分
     * 
     * @return void
     */
    public static function print_time($str)
    {
        if ($_GET['test']) {
            echo "<!--";
            echo "module: ".$str." : time :".self::get_exec_end(self::exec_stop(), self::$exec_start_time)."\r\n";
            echo "-->"; 
        }
    }
        /**
     * 获取程序开始执时间
     * 
     * @return int tm
     */    
    public static function exec_start()
    {
        $runtime_start = microtime();
        $runtime_start = explode(' ', $runtime_start);
        self::$exec_start_time = substr($runtime_start[1], -3).substr($runtime_start[0], 1, 7);
        return  substr($runtime_start[1], -3).substr($runtime_start[0], 1, 7);    
    }

    /**
     * 获取程序执行结束时间
     * 
     * @return int tm
     */    
    public static function exec_stop()
    {
        $runtime_stop = microtime();
        $runtime_stop = explode(' ', $runtime_stop);
        return substr($runtime_stop[1], -3).substr($runtime_stop[0], 1, 7);  
    }

    /**
     * 获取程序执行时间
     * 
     * @param int $stop  结束时间
     * @param int $start 开始时间
     * 
     * @return int tm
     */
    public static function get_exec_end($stop, $start)
    {
        return bcsub($stop, $start, 6);
    }
}
