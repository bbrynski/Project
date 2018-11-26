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
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` GROUP BY  '.\Config\Database\DBConfig\ZbiorModeli::$nazwa);

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

    public function getAll2()
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
            $stmt = $this->pdo->query('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                               INNER JOIN '.\Config\Database\DBConfig::$tableWersja. '
                                ON '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'
                                ='.\Config\Database\DBConfig::$tableWersja.'.'.\Config\Database\DBConfig\Wersja::$id_Wersja);
            
            $result = $stmt->execute();
            $ZbiorModeli = $stmt->fetchAll();

           // d($ZbiorModeli);

            $stmt->closeCursor();
            if($ZbiorModeli && !empty($ZbiorModeli))
                $data['ZbiorModeli'] = $ZbiorModeli;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function WyborWersji($nazwaModelu)
    {
        if($this->pdo === null)
        {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        if($nazwaModelu === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }

        $data = array();
        $data['WyborWersji'] = array();

        try
        {
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                               INNER JOIN '.\Config\Database\DBConfig::$tableWersja. ' 
                                ON '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'
                                ='.\Config\Database\DBConfig::$tableWersja.'.'.\Config\Database\DBConfig\Wersja::$id_Wersja.'
            
                                            WHERE  '.\Config\Database\DBConfig::$tableZbiorModeli.'.'.\Config\Database\DBConfig\ZbiorModeli::$nazwa.'=:nazwa');
            $stmt->bindValue(':nazwa', $nazwaModelu, PDO::PARAM_STR);
            $result = $stmt->execute();

            $WyborWersji = $stmt->fetchAll();

            $stmt->closeCursor();
            if($WyborWersji && !empty($WyborWersji))
                $data['WyborWersji'] = $WyborWersji;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
}