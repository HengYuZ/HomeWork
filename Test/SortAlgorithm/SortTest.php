<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/28 0028
 * Time: 下午 8:59
 */
namespace Test\SortAlgorithm;

use HomeWork\SortAlgorithm;

include '../../SortAlgorithm/Sort.php';

class SortTest
{
    public function test()
    {
        $sort = new SortAlgorithm\Sort();
        $arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
        var_dump($sort->selectionSort($arr));
        echo "<br/>";
        var_dump($sort->insertionSort($arr));
        echo "<br/>";
        var_dump($sort->bubbleSort($arr));
        echo "<br/>";

        //传了数组的引用
        $sort->qSort($arr, 0, count($arr) - 1);
        var_dump($arr);
        echo "<br/>";

        $arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
        $tmp = array();
        $sort->mergeSort($arr, $tmp, 0, count($arr) - 1);
        var_dump($arr);
    }
}

$sortTest = new SortTest();
$sortTest->test();