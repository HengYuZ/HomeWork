<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 11:19
 */
namespace Register;

class ConnectDB
{
    private $host;
    private $user;
    private $password;
    private $connect;

    public function __construct($host, $user, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    public function getConnect()
    {
        return mysql_connect($this->host, $this->user, $this->password);
    }
}