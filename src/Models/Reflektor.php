<?php


namespace Models;
use pdo;

class Reflektor extends Model
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
        $data['SamochodSwiatla'] = array();
        try	{

            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableSamochodSwiatla.'` 
            
                                            INNER JOIN `'.\Config\Database\DBConfig::$tableSwiatla.'`
                                            ON `'.\Config\Database\DBConfig::$tableSamochodSwiatla.'`.`'. \Config\Database\DBConfig\SamochodSwiatla::$id_Swiatla . '`
                                            =`' . \Config\Database\DBConfig::$tableSwiatla . '`.`' . \Config\Database\DBConfig\Swiatla::$id_Swiatla . '`
                                    
                                            
            
                                            WHERE  `'.\Config\Database\DBConfig\SamochodSwiatla::$id_ZbiorModeli.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $wartosc = $stmt->fetchAll();


            $stmt->closeCursor();


            if($wartosc && !empty($wartosc))
                $data['SamochodSwiatla'] = $wartosc;

            // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

}