<?php
/**
 * Created by PhpStorm.
 * User: zimo
 * Date: 2017/8/4
 * Time: 17:49
 */

/**
 * 归并操作
 * @param $array1
 * @param $array2
 * array1，array2为已排序好的两个数组
 * @return array
 */
function merge($array1, $array2){
    $array3 = [];//新建数组array3
    while (!empty($array1) && !empty($array2)){//两个数组都不为空是，比较两个数组当前元素的值，把较小的值放在array3中
        $array3[] = $array1[0] <= $array2[0] ? array_shift($array1) : array_shift($array2);
    }
    //将array1或者array2中剩余的元素，接到array3后面
    $array3 = array_merge($array3,$array1,$array2);
    return $array3;
}

/**
 * 归并排序
 * @param $array
 * @return array
 */
function mergeSort($array){
    if (count($array) <= 1) return $array;

    //取数组的长度的中值，将数组分为左右两个部分
    $mid = intval(count($array)/2);
    $left = array_slice($array,0,$mid);
    $right = array_slice($array,$mid);

    //继续队数组进行分操作，直到数组长度为1，进行归并操作。
    return merge(mergeSort($left),mergeSort($right));
}

$arr = [6,8,5,3,2,9,8,5,5,5,5,5,5,5,5];
print_r(mergeSort($arr));

/**
 * array_shift 将数组开头的单元移出数组
 * array_merge 合并一个或多个数组
 * array_slice 从数组中取出一段
 */