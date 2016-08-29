<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 12:30
 */
namespace Adapter;

class DuckAdapter implements Turkey
{
    private $duck;

    public function __construct($duck)
    {
        $this->duck = $duck;
    }

    public function gobble()
    {
        $this->duck->quack();
    }

    public function fly()
    {
        //鸭子平均五次才飞一次
        if (mt_rand(0, 5) == 0) {
            $this->duck->fly();
        }
    }
}