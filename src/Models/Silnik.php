<?php


namespace Models;
use \PDO;

class Silnik extends Model
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
        $data['SamochodParametry'] = array();
        try	{

            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableSamochodParametry.'` 
            
                                            INNER JOIN `'.\Config\Database\DBConfig::$tableJednostkaNapedowa.'`
                                            ON `'.\Config\Database\DBConfig::$tableSamochodParametry.'`.`'. \Config\Database\DBConfig\SamochodParametry::$id_JednostkaNapedowa . '`
                                            =`' . \Config\Database\DBConfig::$tableJednostkaNapedowa . '`.`' . \Config\Database\DBConfig\JednostkaNapedowa::$id_JednostkaNapedowa . '`
                                    
                                            
            
                                            WHERE  `'.\Config\Database\DBConfig\SamochodParametry::$id_ZbiorModeli.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $SamochodParametry = $stmt->fetchAll();
            $stmt->closeCursor();


            if($SamochodParametry && !empty($SamochodParametry))
                $data['SamochodParametry'] = $SamochodParametry;

            d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    /*
    public function getAllForSelect(){
        $data = $this->getAll();
        $silniki = array();

        if(!isset($data['error']))

            foreach($data['silniki'] as $silnik) {
                $opcja = $silnik['TypSilnika'] . ' ' . $silnik['Pojemnosc'] . 'L ' . $silnik['MaksymalnaMoc'] . 'KM';
                $silniki[$silnik[\Config\Database\DBConfig\Silnik::$id]] = $opcja;
            }

        return $silniki;
    }
    */

}