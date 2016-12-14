<?php
/**
 *  时间工具类
 *
 *  @author zsg <xxx@qq.com>
 *
 */
/**
 *  时间工具类
 *
 *  @author zsg <xxx@qq.com>
 */
namespace Tools;
use Tools;
class Time
{    
    /**
     * 转换时间戳为n天/小时/分/秒前
     *
     * @param unknown $timestamp 时间戳
     *
     * @return string
     */
    public static function convert2timeago($timestamp, $formate="Y-m-d")
    {
        $nowtime = time();
        $tmp = $nowtime - $timestamp;
        $day_num = intval($tmp / (3600*24));          //天数
    
        if ($day_num > 30) {
            return date($formate, $timestamp);
        }
        
        if ($day_num > 0) {
            return $day_num . '天前';
        }
    
        $remain_hour = $tmp % (3600*24);        //除去天数之后剩余秒数
        $hour_num = intval($remain_hour/3600);  //小时数
    
        if ($hour_num>0) {
            return $hour_num . '小时前';
        }
    
        $remain_minute = $remain_hour % 3600;   //除去小时数之后剩余秒数
        $minute_num = intval($remain_minute / 60);  //分种数
    
        if ($minute_num>0) {
            return $minute_num . '分钟前';
        }
    
        $remain_second = $remain_minute % 60;    //秒数
    
        return $remain_second . '秒前';
    }
    
    /**
     * 时间差转为年/天/时/分/秒
     * 
     * @param int    时间差
     * @param string 精确至 默认分
     * 
     * @return void
     */
    public static function timeTransfer($timeleft, $type='min')
    {
        $strarr = array();
        $year = $timeleft / (365*86400);
        if (intval($year)) {
            $strarr[] = intval($year).'年';
        } else {
            $strarr[] ='';
        }
        
        $yearleft = $timeleft % (365*86400);
        $day = $yearleft / 86400;
        if (intval($day)) {
            $strarr[] = intval($day).'天';
        } else {
            $strarr[] ='';
        }
        
        $dayleft = $yearleft % 86400;
        $hour = $dayleft / 3600;
        if (intval($hour)) {
            $strarr[] = intval($hour).'小时';
        } else {
            $strarr[] ='';
        }
        
        $hourleft = $dayleft % 3600;
        $min = $hourleft / 60;
        if (intval($min)) {
            $strarr[] = intval($min).'分';
        } else {
            $strarr[] ='';
        }
        switch ($type) {
            case 'min':
                $newarr = array_slice($strarr, 0, 4);
                break;
            case 'hour':
                $newarr = array_slice($strarr, 0, 3);
                break;
            case 'day':
                $newarr = array_slice($strarr, 0, 2);
                break;
            case 'year':
                $newarr = array_slice($strarr, 0, 1);
                break;
        }
        return implode('', $newarr);
    }
    
    /**
     * 	计算剩余时间
     * 
     * 	@param int $timeStamp 时间戳
     * 
     * 	@return array
     */
    public static function overTime($timeStamp)
    {
        $now = time();
        $ret = array('d' => 0, 'h' => 0, 'm' => 0, 's' => 0);
        $rule = array('d' => 86400, 'h' => 3600, 'm' => 60, 's' => 1);
        $diff = $timeStamp - $now;
        if ($diff < 0)
            return $ret;
        foreach ($rule as $t => $l) {
            $ret[$t] = (int) ($diff / $l);
            $diff -= $ret[$t] * $l;
        }
        return $ret;
    }
}
