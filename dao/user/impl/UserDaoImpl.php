<?php

namespace Dao\User\Impl;


use Dao\AbstractDaoImpl;
use Dao\User\UserDao;
use Entity\User;
use Exception;
use PDOStatement;

class UserDaoImpl extends AbstractDaoImpl implements UserDao
{
    private const SELECT_USER_BY_ID = 'SELECT * FROM :dbTable WHERE id=:id;';
    private const SELECT_USER_BY_LOGIN_OR_EMAIL = '
    SET @loginOrEmail = :loginOrEmail 
    SELECT * FROM :dbTable
       WHERE ( username = @loginOrEmail OR email = @loginOrEmail) 
       AND password = :password';
    private const IS_USERNAME_EXISTS = 'SELECT * FROM :dbTable WHERE username=:username;';
    private const IS_EMAIL_EXISTS = 'SELECT * FROM :dbTable WHERE email=:email;';
    private const INSERT_NEW_USER = 'INSERT INTO :dbTable (id, username, email, password, active) 
      VALUES (:id, :username, :email, :password, :active);';
    private const UPDATE_USER = 'UPDATE :dbTable 
      SET username=:username, email=:email, password=:password, active=:active
      WHERE id=:id;';
    private const REMOVE_USER = 'DELETE FROM :dbTable WHERE id=:id;';
    private const LIST_ALL_USERS = 'SELECT * FROM :dbTable;';

    private $dbTable;
    private $columnNames;

    public function getColumnNames(): array
    {
        return $this->columnNames;
    }

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

    public function get(int $id): User
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::SELECT_USER_BY_ID);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $this->fetchUser($stmt);
            }
        } finally {
            $this->disconnect();
        }
        return null;
    }

    private function fetchUser(PDOStatement $stmt): User
    {
        $user = New User();
        $user->setId($stmt->fetchColumn(0));
        $user->setUserName($stmt->fetchColumn(1));
        $user->setPassword($stmt->fetchColumn(2));
        $user->setEmail($stmt->fetchColumn(3));
        $stmt = null;
        return $user;
    }

    public function save(User $user): int
    {
        $id = -1;
        $pdo = null;
        try {
            $pdo = $this->connect();
            $pdo->beginTransaction();
            $stmt = $pdo->prepare($user->getId() > 0 ? self::UPDATE_USER : self::INSERT_NEW_USER);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->bindParam(':id', $user->getId());
            $stmt->bindParam(':username', $user->getUserName());
            $stmt->bindParam(':email', $user->getEmail());
            $stmt->bindParam(':password', $user->getPassword());
            $stmt->bindParam(':active', $user->getActive());
            $stmt->execute();
            $id = $pdo->lastInsertId();
        } catch (Exception $e) {
            $pdo->rollBack();
        } finally {
            $this->disconnect();
        }
        return $id;
    }

    public function delete(User $user): bool
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::REMOVE_USER);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->bindParam(':id', $user->getId());
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $this->fetchUser($stmt);
            }
        } finally {
            $this->disconnect();
        }
        return null;
    }

    public function listAll(): array
    {
        $users = array();
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::LIST_ALL_USERS);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll();
                foreach ($result as $row) {
                    $user = New User();
                    $user->setId($row['id']);
                    $user->setUserName($row['username']);
                    $user->setEmail($row['email']);
                    $user->setPassword($row['password']);
                    $user->setActive($row['active']);
                    $users[] = $user;
                }
                return $this->fetchUser($stmt);
            }
        } finally {
            $this->disconnect();
        }
        return $users;
    }

    public function getByLoginOrEmail(string $loginOrEmail, string $password): User
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::SELECT_USER_BY_LOGIN_OR_EMAIL);
            $stmt->bindParam(':loginOrEmail', $loginOrEmail);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $this->fetchUser($stmt);
            }
        } finally {
            $this->disconnect();
        }
        return null;
    }

    function isUserNameExists(string $username): bool
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::IS_USERNAME_EXISTS);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } finally {
            $this->disconnect();
        }
        return false;
    }

    function isEmailExists(string $email): bool
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare(self::IS_EMAIL_EXISTS);
            $stmt->bindParam(':dbTable', $this->dbTable);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } finally {
            $this->disconnect();
        }
        return false;
    }
}