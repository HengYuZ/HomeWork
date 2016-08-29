<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 14:22
 */

namespace Adapter;

use Adapter;

include 'Turkey.php';

class WildTurkey implements Turkey
{
    public function gobble()
    {
        echo 'Gobble gobble'."<br/>";
    }

    public function fly()
    {
        echo 'I am flying a short distance'."<br/>";
    }
}