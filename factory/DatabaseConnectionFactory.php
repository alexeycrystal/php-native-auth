<?php

namespace Factory;


class DatabaseConnectionFactory
{
    protected $provider = null;
    protected $connection = null;

    public function __construct(callable $provider)
    {
        $this->provider = $provider;
    }

    public function create($name)
    {
        if ($this->connection === null) {
            $this->connection = call_user_func($this->provider);
        }
        return new $name($this->connection);
    }
}