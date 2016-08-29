<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 10:20
 */
namespace Pattern;

use Adapter\DuckAdapter;
use Adapter\MallardDuck;
use Adapter\WildTurkey;

use Observer\Subject;
use Observer\Subscriber1;
use Observer\Subscriber2;

use Register\RegisterTree;
use Register\ConnectDB;

include '../../DesignPattern/Observer/Subject.php';
include '../../DesignPattern/RegisterTree/RegisterTree.php';

include '../../DesignPattern/Adapter/MallardDuck.php';
include '../../DesignPattern/Adapter/WildTurkey.php';
include '../../DesignPattern/Adapter/DuckAdapter.php';


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

    public function adapterTest()
    {
        echo "<br/>"."<br/>".'适配器测试：'."<br/>";
        //先创建一个鸭子和一个火鸡
        $duck = new MallardDuck();
        $turkey = new WildTurkey();
        //把一个鸭装进鸭子适配器中，让它像一个火鸡
        $turkeyAdapter = new DuckAdapter($duck);
        //测试鸭子
        echo 'The duck says ...';
        $duck->quack();
        $duck->fly();
        //测试火鸡
        echo 'The turkey says...';
        $turkey->gobble();
        $turkey->fly();
        //测试一个假装是火鸡的鸭子
        echo 'The TurkeyAdapter says...';
        $turkeyAdapter->gobble();
        $turkeyAdapter->fly();
    }
}

$patternTest = new PatternTest();
$patternTest->observerTest();
$patternTest->registerTest();
$patternTest->adapterTest();