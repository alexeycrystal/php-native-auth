<?php

namespace Dao;

use PDO;

abstract class AbstractDaoImpl implements AbstractDao
{
    private $dbName = 'php_auth_task';
    private $dbHost = 'localhost';
    private $dbUsername = 'root';
    private $dbUserPassword = '111111';

    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    private static $connection = null;

    public function connect(): PDO
    {
        $this->connection = new PDO("mysql:host=" . $this->dbHost . ";" . "dbname=" . $this->dbName,
            $this->dbUsername,
            $this->dbUserPassword,
            $this->options);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->connection;
    }

    public function disconnect()
    {
        $this->connection = null;
    }
}