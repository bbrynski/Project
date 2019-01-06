<?php


namespace Models;
use pdo;

class Lakier extends Model
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
        $data['SamochodLakier'] = array();
        try	{

            $stmt = $this->pdo->prepare('SELECT * FROM  '.\Config\Database\DBConfig::$tableLakier);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $wartosc = $stmt->fetchAll();
            $stmt->closeCursor();


            if($wartosc && !empty($wartosc))
                $data['SamochodLakier'] = $wartosc;

            // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

}