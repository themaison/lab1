<?php

namespace app\core;

use PDO;

abstract class BaseActiveRecord {
    public static $pdo;

    protected static $tablename;
    protected static $dbfields = array();

    public function __construct() {
        if (!static::$tablename){
            return ;
        }
        static::setupConnection();
        static::getFields();
    
    }
    public static function getFields() {
        $stmt = static::$pdo->query("SHOW FIELDS FROM ".static::$tablename);
        while ($row = $stmt->fetch()) {
            static::$dbfields[$row['Field']] = $row['Type'];
        }
    }

    public function getDbFields() {
        return static::$dbfields;
    }

    public static function setupConnection() {
        if (!isset(static::$pdo)) {
            $eror = false;
            try {
                static::$pdo = new PDO("mysql:dbname=lab1db; host=localhost; charset=utf8", "root", "");
            } catch (PDOException $ex) {
                die("Ошибка подключения к БД: $ex");
            }
        }
    }

    public static function find($id){
        $sql = "SELECT * FROM ".static::$tablename." WHERE id=$id";
        $stmt = static::$pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $ar_obj = new static();
        foreach ($row as $key => $value) {
            $ar_obj ->$key = $value;
        }
        return $ar_obj;
    }

    public function save() {
        $fields_list = array();
        foreach (static::$dbfields as $field => $field_type) {
            $value = $this->$field;
            if (strpos($field_type,'int')===false) $value = "'$value'";
            $fields_list[] = "$field = $value";
        }
        $sql = "INSERT INTO ".static::$tablename." SET ".join(', ',$fields_list);
       
        $stmt = static::$pdo->prepare($sql);
        $stmt->execute();

        return $this;
    }
    
    
    public static function findAll() {
        $sql = "SELECT * FROM ".static::$tablename;
        $stmt = static::$pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$rows) {
            return null;
        }
        $ar_objects = array();
        foreach ($rows as $row) {
            $ar_obj = new static();
            foreach ($row as $key => $value) {
                $ar_obj->$key = $value;
            }
            $ar_objects[] = $ar_obj;
        }
        return $ar_objects;
    }

    public function delete(){
        $sql = "DELETE FROM ".static::$tablename." WHERE ID=".$this->id;
        $stmt = static::$pdo->query($sql);
        if($stmt){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else{
            print_r(static::$pdo->errorInfo());
        }
    }
}
    
