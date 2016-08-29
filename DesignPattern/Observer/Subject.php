<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 9:18
 */
namespace Observer;

use Observer;

include 'Subscriber.php';

class Subject
{
    //存放观察者
    private $Objects = array();

    //楼价
    private $price;

    //改变楼市价格
    public function setPrice($price)
    {
        $this->price = $price;
        echo '房价最新为'.$this->price.'<br/>';
    }

    //注册观察者
    public function registerObserver($observer)
    {
        $this->Objects[] = $observer;
    }

    public function trigger()
    {

        foreach ($this->Objects as $object) {
            $object->update($this->price);
        }
    }
}