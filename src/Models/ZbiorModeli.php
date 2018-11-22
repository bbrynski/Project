<?php

namespace Models;
use \PDO;

class ZbiorModeli extends Model
{
    public function getAll()
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        $data = array();
        $data['ZbiorModeli'] = array();

        try
        {
            $query='SELECT * FROM '.\Config\Database\DBConfig::$tableZbiorModeli;

            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();
            $ZbiorModeli = $stmt->fetchAll();

            $stmt->closeCursor();
            if($ZbiorModeli && !empty($ZbiorModeli))
                $data['ZbiorModeli'] = $ZbiorModeli;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
}