<?php

namespace Models;
use pdo;

class Wyposazenie extends Model
{
    public function getAll($id){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }

        $data = array();
        $data['SamochodWyposazenie'] = array();
        try	{

            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableSamochodWyposazenie.'` 
            
                                            INNER JOIN `'.\Config\Database\DBConfig::$tableWyposazenie.'`
                                            ON `'.\Config\Database\DBConfig::$tableSamochodWyposazenie.'`.`'. \Config\Database\DBConfig\SamochodWyposazenie::$id_SamochodWyposazenie . '`
                                            =`' . \Config\Database\DBConfig::$tableWyposazenie . '`.`' . \Config\Database\DBConfig\Wyposazenie::$id_Wyposazenie . '`
                                    
                                            
            
                                            WHERE  `'.\Config\Database\DBConfig\SamochodParametry::$id_ZbiorModeli.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $wartosc = $stmt->fetchAll();
            $stmt->closeCursor();


            if($wartosc && !empty($wartosc))
                $data['SamochodWyposazenie'] = $wartosc;

            // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

}