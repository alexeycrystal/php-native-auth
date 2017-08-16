<?php


namespace Dao;


interface GenericDao
{
    function get(int $id): object;

    function isExists(int $id): bool;

    function save(object $obj): bool;

    function delete(object $obj): bool;

    function listAll(): array;
}