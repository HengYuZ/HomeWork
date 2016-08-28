<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/28 0028
 * Time: 下午 8:08
 */
namespace HomeWork\SortAlgorithm;
class Sort
{

    /**
     * 选择排序
     * @param array $arr
     */
    public function selectionSort($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            $lowIndex = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($arr[$j] < $arr[$lowIndex]) {
                    $lowIndex = $j;
                }
            }
            $tmp = $arr[$i];
            $arr[$i] = $arr[$lowIndex];
            $arr[$lowIndex] = $tmp;
        }
        return $arr;
    }

    /**
     * 插入排序
     * @param array $arr
     */
    public function insertionSort($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i; $j > 0; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j - 1];
                    $arr[$j - 1] = $tmp;
                }
            }
        }
        return $arr;
    }

    /*
     * 冒泡排序
     * @param array $arr
     */
    public function bubbleSort($arr)
    {
        //计算数组长度
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $len - 1; $j > $i; $j--) {
                if ($arr[$j] < $arr[$j - 1]) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    /**
     * 返回pivot值
     * @param array $arr
     * @param int $left
     * @param int $right
     */
    private function Partition(&$arr, $left, $right)
    {
        //选择数组的第一个值作为参照值
        $pivot = $arr[$left];
        while ($left < $right) {
            //循环处理比 $pivot大的值，右边的游标往左边移一个
            while ($left < $right && $pivot < $arr[$right]) {
                $right--;
            }
            //右边值比$pivot大，把右边值赋给$left(左边游标)下标的数组元素。
            //并且左边游标往右移动一个
            if ($left < $right) {
                $arr[$left] = $arr[$right];
                $left++;
            }
            //循环处理比 $pivot小的值，左边的游标往右边移一个
            while ($left < $right && $pivot > $arr[$left]) {
                $left++;
            }
            //左边值比$pivot大，把左边值赋给$right下标(右边游标)的数组元素。
            //并且右边游标往左移动一个
            if ($left < $right) {
                $arr[$right] = $arr[$left];
                $right--;
            }
        }
        //因为是把数组弄为比$pivot大的在右边，比$pivot小的在左边
        //而最外层while循环完后，$Left与$right重合，也就是$pivot在数组的位置
        $arr[$left] = $pivot;
        //返回$pivot的下标
        return $left;
    }

    /**
     * 快速排序
     * @param array $arr
     * @param int $left
     * @param int $right
     */
    public function qSort(&$arr, $left, $right)
    {
        //设置递归出口
        if ($left > $right)
            return;
        else {
            //获取参照值位置
            $pivotLoc = $this->Partition($arr, $left, $right);
            $this->qSort($arr, $left, $pivotLoc - 1);
            $this->qSort($arr, $pivotLoc + 1, $right);
        }
    }

    /**
     * 归并排序
     * @param array $arr
     * @param int $tmp
     * @param int $left
     * @param int $right
     */
    public function mergeSort(&$arr, &$tmp, $left, $right)
    {
        //设置递归出口，当递归到只有一个数组元素时，返回。
        if ($left == $right)
            return;
        //获取一半的数组长度,向下取整。这里需要与C++区分开来，不然会出现递归没法结束。
        $mid = floor(($left + $right) / 2);
        $this->mergeSort($arr, $tmp, $left, $mid);
        $this->mergeSort($arr, $tmp, $mid + 1, $right);
        //把$arr数组的值存放到临时数组$tmp中
        for ($i = $left; $i <= $right; $i++)
            $tmp[$i] = $arr[$i];
        //第一段数组的起始位置
        $i1 = $left;
        //第二段数组的起始位置
        $i2 = $mid + 1;
        for ($curr = $left; $curr <= $right; $curr++) {
            //当$i1 = $mid+1,证明左边的已经没有了，只需把右边的全部赋值给$arr数组就可以了
            if ($i1 == $mid + 1) {
                $arr[$curr] = $tmp[$i2++];
            } //当$i2 > $right;证明右边的已经没有值，只需把左边赋值给$arr就可以了
            elseif ($i2 > $right) {
                $arr[$curr] = $tmp[$i1++];
            }
            //比较左右两段数组的元素大小，只把两个数组中最小的值赋值$arr
            //这样可以保证$arr的值是升序排序。当递归完成后，$arr也是有序的了
            elseif ($tmp[$i1] < $tmp[$i2]) {
                $arr[$curr] = $tmp[$i1++];
            } else {
                $arr[$curr] = $tmp[$i2++];
            }
        }
    }
}