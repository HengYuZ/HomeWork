<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 9:19
 */
namespace Observer;

interface Observerable
{
    public function update($price);
}
