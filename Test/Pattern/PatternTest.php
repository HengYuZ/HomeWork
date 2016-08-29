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
use Register\RegisterTree;
use Register\ConnectDB;

include '../../DesignPattern/Observer/Subject.php';
include '../../DesignPattern/RegisterTree/RegisterTree.php';

class PatternTest
{
    public function observerTest()
    {
        $subject = new Subject();
        echo '观察者模式测试<br/>';
        $subject->setPrice(9000);
        $subject->registerObserver(new Subscriber1('我是买房的'));
        $subject->registerObserver(new Subscriber2('我是卖房的'));
        $subject->trigger();
    }

    public function registerTest()
    {
        $register = new RegisterTree();
        $register->set('db1', new ConnectDB('127.0.0.1', 'root', '123456'));
        echo '<br/>注册树模式测试<br/>';
        var_dump($register->get('db1'));
    }
}

$patternTest = new PatternTest();
$patternTest->observerTest();
$patternTest->registerTest();