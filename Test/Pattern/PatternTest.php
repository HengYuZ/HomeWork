<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 10:20
 */
namespace Pattern;

use Observer\Subject;
use Observer\Subscriber1;
use Observer\Subscriber2;

include '../../DesignPattern/Observer/Subject.php';

class PatternTest
{
    public function test()
    {
        $subject = new Subject();
        $subject->setPrice(9000);
        $subject->registerObserver(new Subscriber1('我是买房的'));
        $subject->registerObserver(new Subscriber2('我是卖房的'));
        $subject->trigger();
    }
}

$patternTest = new PatternTest();
$patternTest->test();