<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 10:46
 */
namespace Register;

use Register;

include 'ConnectDB.php';

class RegisterTree
{
    //用于保存注册对象
    protected static $objects;

    //注册对象
    public static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }

    //获取对象
    public static function get($alias)
    {
        return self::$objects[$alias];
    }

    //注销对象
    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}