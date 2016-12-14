<?php
// +----------------------------------------------------------------------
// | FINDLAW [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://china.findlaw.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: mxj <xxx@gmail.com>
// +----------------------------------------------------------------------

$prize_arr = array( 
    '0' => array('id'=>1,'min'=>1,'max'=>29,'prize'=>'一等奖','v'=>2), 
    '1' => array('id'=>2,'min'=>302,'max'=>328,'prize'=>'二等奖','v'=>10), 
    '2' => array('id'=>3,'min'=>242,'max'=>268,'prize'=>'三等奖','v'=>13), 
    '3' => array('id'=>4,'min'=>182,'max'=>208,'prize'=>'四等奖','v'=>15), 
    '4' => array('id'=>5,'min'=>122,'max'=>148,'prize'=>'五等奖','v'=>20), 
    '5' => array('id'=>6,'min'=>62,'max'=>88,'prize'=>'六等奖','v'=>30), 
    '6' => array('id'=>7,'min'=>array(32,92,152,212,272,332), 
'max'=>array(58,118,178,238,298,358),'prize'=>'七等奖','v'=>10) 
);
 
function getRand($proArr) 
{ 
    $result = ''; 
    //概率数组的总概率精度 
    $proSum = array_sum($proArr); 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur; 
        } 
    } 
    unset ($proArr); 
 
    return $result; 
} 

foreach ($prize_arr as $key => $val) { 
    $arr[$val['id']] = $val['v']; 
} 
$rid = getRand($arr); //根据概率获取奖项id 
$res = $prize_arr[$rid-1]; //中奖项 
$min = $res['min']; 
$max = $res['max']; 
if($res['id']==7){ //七等奖 
    $i = mt_rand(0,5); 
    $result['angle'] = mt_rand($min[$i],$max[$i]); 
}else{ 
    $result['angle'] = mt_rand($min,$max); //随机生成一个角度 
} 
$result['prize'] = $res['prize']; 
echo json_encode($result); 
/*
die;
$prize_arr = array( 
    '1' => array('money'=>1000,'v'=>2), 
    '2' => array('money'=>800,'v'=>5), 
    '3' => array('money'=>600,'v'=>8), 
    '4' => array('money'=>500,'v'=>10), 
    '5' => array('money'=>300,'v'=>15), 
    '6' => array('money'=>200,'v'=>20), 
    '7' => array('money'=>100,'v'=>30), 
    '8' => array('money'=>0,'v'=>10)
);
//概率计算函数
function getRand($proArr) 
{ 
    $result = ''; 
    //概率数组的总概率精度 
    $proSum = 100; 
    //概率数组循环 
    foreach ($proArr as $key => $proCur) { 
        $randNum = mt_rand(1, $proSum); 
        if ($randNum <= $proCur['v']) { 
            $result = $key; 
            break; 
        } else { 
            $proSum -= $proCur['v']; 
        } 
    } 
    unset ($proArr); 
    return $result; 
} 
//调用方法
$rid = getRand($prize_arr);
//得到结果
echo json_encode($prize_arr[$rid]);*/