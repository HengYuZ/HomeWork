<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 9:27
 */

namespace Observer;

use Observer;

include 'Observerable.php';

class Subscriber1 implements Observerable
{
    //观察者身份
    private $feature;

    function __construct($feature)
    {
        $this->feature = $feature;
    }

    public function update($price)
    {
        if ($price > 8000)
            echo $this->feature . ',房价又涨了, Oh No!<br/>';
    }
}

class Subscriber2 implements Observerable
{
    //观察者身份
    private $feature;

    function __construct($feature)
    {
        $this->feature = $feature;
    }

    public function update($price)
    {
        if ($price > 8000)
            echo $this->feature . ',房价涨了，Oh nice!<br/>';
    }
}