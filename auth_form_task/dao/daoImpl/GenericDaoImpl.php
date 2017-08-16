<?php

namespace Dao\DaoImpl;

use Dao\GenericDao;

abstract class GenericDaoImpl extends AbstractDaoImpl implements GenericDao
{
    private $dbTable;
    private $columnNames;

    /**
     * @return mixed
     */
    public function getColumnNames(): array
    {
        return $this->columnNames;
    }

    /**
     * @param mixed $columnNames
     */
    public function setColumnNames(array $columnNames)
    {
        $this->columnNames = $columnNames;
    }

    public function getDbTable(): string
    {
        return $this->dbTable;
    }

    public function setDbTable(string $dbTable)
    {
        $this->dbTable = $dbTable;
    }

    function get(int $id): object
    {
        $pdo = $this->connect();
        $stmt = $pdo->prepare('SELECT * FROM :dbTable WHERE id=:id;');
        $stmt->bindParam('dbTable', $this->dbTable);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {

            return null;
        } else {
            return null;
        }
    }

    function isExists(int $id): bool
    {
        return false;
    }

    function save(object $obj): bool
    {
        return true;
    }

    function delete(object $obj): bool
    {
        return true;
    }

    function listAll(): array
    {
        return array();
    }
}