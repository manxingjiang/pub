<?php
/**
 *  ʱ�乤����
 *
 *  @author zsg <xxx@qq.com>
 *
 */
/**
 *  ʱ�乤����
 *
 *  @author zsg <xxx@qq.com>
 */
namespace Tools;
use Tools;
class Time
{    
    /**
     * ת��ʱ���Ϊn��/Сʱ/��/��ǰ
     *
     * @param unknown $timestamp ʱ���
     *
     * @return string
     */
    public static function convert2timeago($timestamp, $formate="Y-m-d")
    {
        $nowtime = time();
        $tmp = $nowtime - $timestamp;
        $day_num = intval($tmp / (3600*24));          //����
    
        if ($day_num > 30) {
            return date($formate, $timestamp);
        }
        
        if ($day_num > 0) {
            return $day_num . '��ǰ';
        }
    
        $remain_hour = $tmp % (3600*24);        //��ȥ����֮��ʣ������
        $hour_num = intval($remain_hour/3600);  //Сʱ��
    
        if ($hour_num>0) {
            return $hour_num . 'Сʱǰ';
        }
    
        $remain_minute = $remain_hour % 3600;   //��ȥСʱ��֮��ʣ������
        $minute_num = intval($remain_minute / 60);  //������
    
        if ($minute_num>0) {
            return $minute_num . '����ǰ';
        }
    
        $remain_second = $remain_minute % 60;    //����
    
        return $remain_second . '��ǰ';
    }
    
    /**
     * ʱ���תΪ��/��/ʱ/��/��
     * 
     * @param int    ʱ���
     * @param string ��ȷ�� Ĭ�Ϸ�
     * 
     * @return void
     */
    public static function timeTransfer($timeleft, $type='min')
    {
        $strarr = array();
        $year = $timeleft / (365*86400);
        if (intval($year)) {
            $strarr[] = intval($year).'��';
        } else {
            $strarr[] ='';
        }
        
        $yearleft = $timeleft % (365*86400);
        $day = $yearleft / 86400;
        if (intval($day)) {
            $strarr[] = intval($day).'��';
        } else {
            $strarr[] ='';
        }
        
        $dayleft = $yearleft % 86400;
        $hour = $dayleft / 3600;
        if (intval($hour)) {
            $strarr[] = intval($hour).'Сʱ';
        } else {
            $strarr[] ='';
        }
        
        $hourleft = $dayleft % 3600;
        $min = $hourleft / 60;
        if (intval($min)) {
            $strarr[] = intval($min).'��';
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
     * 	����ʣ��ʱ��
     * 
     * 	@param int $timeStamp ʱ���
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
