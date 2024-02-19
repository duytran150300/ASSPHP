<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $conn;
    protected $sqlBuilder;
    protected $tableName;
    protected $primaryKey = 'id';
    protected $email = 'email';
    protected $username = 'username';
    protected $cate_id = 'cate_id';

    public function __construct()
    {
        $host = HOSTNAME;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $th) {
            echo "Lỗi kết nối cơ sở dữ liệu " . $th->getMessage();
        }
    }

    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    public static function find($id)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data = ["$model->primaryKey" => $id];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if (count($result) > 0) {
            return $result[0];
        }
        return $result;
    }
    public static function findByCategory($cate_id)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $model->cate_id=:$model->cate_id";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data = ["$model->cate_id" => $cate_id];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if (count($result) > 0) {
            return $result[0];
        }
        return $result;
    }
    public static function findBySomeThing($email)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $model->email=:$model->email";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data = ["$model->email" => $email];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if (count($result) > 0) {
            return $result[0];
        }
        return $result;
    }
    public static function findByUserName($username)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE $model->username=:$model->username";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data = ["$model->username" => $username];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if (count($result) > 0) {
            return $result[0];
        }
        return $result;
    }
    public static function getCategories()
    {
        $model = new static;

        $model->sqlBuilder = "SELECT category.* FROM $model->tableName
                JOIN category ON category.$model->primaryKey = $model->tableName.$model->cate_id";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function where($column, $condition, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $condition '$value'";
        return $model;
    }
    public function andWhere($column, $condition, $value)
    {
        $this->sqlBuilder .= "AND `$column` $condition '$value'";
        return $this;
    }
    public function orWhere($column, $condition, $value)
    {
        $this->sqlBuilder .= "OR `$column` $condition '$value'";
        return $this;
    }
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public static function insert($data)
    {
        $model = new static;
        $model->sqlBuilder = "INSERT INTO $model->tableName (";
        //    biến values nối các tham số cho value
        $values = "";
        foreach ($data as $column => $value) {
            $model->sqlBuilder .= "`{$column}`, ";
            $values .= ":$column ,";
        }
        // thực hiện dâu {,'};
        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ") . ") ";
        //  $values = "VALUES( " . rtrim($values, ", ") . ") ";  rtrim($values, ", ") đây là values chứ không phải model

        $values = "VALUES( " . rtrim($values, ", ") . ") ";

        // Nối sqlBuilder với values
        $model->sqlBuilder .= $values;
        // thực thi
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute($data);
        return $model->conn->lastInsertId();
    }

    public static function update($data, $id)
    {
        $model = new static;
        $model->sqlBuilder = "UPDATE $model->tableName SET ";
        $setValues = "";
        foreach ($data as $key => $value) {
            $setValues .= "`{$key}` = :{$key}, ";
        }
        $model->sqlBuilder .= rtrim($setValues, ", ");
        $model->sqlBuilder .= " WHERE `$model->primaryKey` = :$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data["$model->primaryKey"] = $id;
        return $stmt->execute($data);
    }
    public static function delete($id)
    {
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE `$model->primaryKey` = :$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $data = ["$model->primaryKey" => $id];
        return $stmt->execute($data);
    }
}
