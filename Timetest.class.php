<?php
/**
 *  ��⺯��ִ��ʱ�乤����
 *
 *  @author mxj <745139633@qq.com>
 *
 */

namespace Tools;
use Tools;
/**
 *  ��⺯��ִ��ʱ�乤����
 *
 *  @author mxj <745139633@qq.com>
 */
class Timetest
{
    static $exec_start_time;
    /**
     * ���ʱ��
     * 
     * @param string $str Ĭ�Ϸ�
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
     * ��ȡ����ʼִʱ��
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
     * ��ȡ����ִ�н���ʱ��
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
     * ��ȡ����ִ��ʱ��
     * 
     * @param int $stop  ����ʱ��
     * @param int $start ��ʼʱ��
     * 
     * @return int tm
     */
    public static function get_exec_end($stop, $start)
    {
        return bcsub($stop, $start, 6);
    }
}
