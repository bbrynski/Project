<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 12:25
 */

namespace Models;
use \PDO;

class Kola extends Model
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
        $data['kola'] = array();
        try	{
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableSamochodKola.'` 
            
                                            INNER JOIN `'.\Config\Database\DBConfig::$tableKola.'`
                                            ON `'.\Config\Database\DBConfig::$tableSamochodKola.'`.`'. \Config\Database\DBConfig\SamochodKola::$id_Kola . '`
                                            =`' . \Config\Database\DBConfig::$tableKola . '`.`' . \Config\Database\DBConfig\Kola::$id_Kola . '`
                                    
                                            
            
                                            WHERE  `'.\Config\Database\DBConfig\SamochodKola::$id_ZbiorModeli.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();

            $kola = $stmt->fetchAll();
            $stmt->closeCursor();
            if($kola && !empty($kola))
                $data['kola'] = $kola;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }



       return $data;
    }


}