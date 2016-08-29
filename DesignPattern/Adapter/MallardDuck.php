<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 14:19
 */
namespace Adapter;

use Adapter;

include '../../DesignPattern/Adapter/Duck.php';

class MallardDuck implements Duck
{
    public function quack()
    {
        echo 'Quack!'."<br/>";
    }

    public function fly()
    {
        echo 'I am flying'."<br/>";
    }
}