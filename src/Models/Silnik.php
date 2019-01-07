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

           // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function getAll2(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }


        $data = array();
        $data['SamochodParametry'] = array();
        try	{

            $stmt = $this->pdo->query('SELECT * FROM '.\Config\Database\DBConfig::$tableJednostkaNapedowa);


            $SamochodParametry = $stmt->fetchAll();
            $stmt->closeCursor();


            if($SamochodParametry && !empty($SamochodParametry))
                $data['SamochodParametry'] = $SamochodParametry;

            // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }


    public function SelectSilnik(){


        $data = $this->getAll2();
        $silniki = array();

        if(!isset($data['error']))

            foreach($data['SamochodParametry'] as $silnik) {
                $opcja = $silnik['pojemnosc'] . 'l ' . $silnik['silnik'] . ' ' . $silnik['moc'] . 'KM'. ' ' . $silnik['skrzynia'];
                $silniki[$silnik[\Config\Database\DBConfig\JednostkaNapedowa::$id_JednostkaNapedowa]] = $opcja;
            }

        //var_dump($silniki);
        return $silniki;
    }


    public function add($pojemnosc, $rodzaj, $moc, $skrzynia, $cena){

        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($pojemnosc === null || $rodzaj == null || $moc == null || $skrzynia == null || $cena == null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableJednostkaNapedowa.'` 
                (
                    `'.\Config\Database\DBConfig\JednostkaNapedowa::$pojemnosc.'`,
                    `'.\Config\Database\DBConfig\JednostkaNapedowa::$silnik.'`,
                    `'.\Config\Database\DBConfig\JednostkaNapedowa::$moc.'`,
                    `'.\Config\Database\DBConfig\JednostkaNapedowa::$skrzynia.'`,
                    `'.\Config\Database\DBConfig\JednostkaNapedowa::$cena.'`
                  
                    
                ) VALUES (:1, :2, :3, :4, :5)');

            $stmt->bindValue(':1', $pojemnosc, PDO::PARAM_STR);
            $stmt->bindValue(':2', $rodzaj, PDO::PARAM_STR);
            $stmt->bindValue(':3', $moc, PDO::PARAM_STR);
            $stmt->bindValue(':4', $skrzynia, PDO::PARAM_STR);
            $stmt->bindValue(':5', $cena, PDO::PARAM_STR);


            $result = $stmt->execute();

            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$noadd;
            else
                $data['message'] = \Config\Database\DBMessageName::$addok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }


    public function add2($id_zbior_modeli, $id_jednostka_napedowa){

        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id_zbior_modeli === null || $id_jednostka_napedowa == null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableSamochodParametry.'` 
                (
                    `'.\Config\Database\DBConfig\SamochodParametry::$id_ZbiorModeli.'`,
                    `'.\Config\Database\DBConfig\SamochodParametry::$id_JednostkaNapedowa.'`                                            
                ) VALUES (:id1, :id2)');

            $stmt->bindValue(':id1', $id_zbior_modeli, PDO::PARAM_INT);
            $stmt->bindValue(':id2', $id_jednostka_napedowa, PDO::PARAM_INT);

            $result = $stmt->execute();

            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$noadd;
            else
                $data['message'] = \Config\Database\DBMessageName::$addok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function delete($id){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableSamochodParametry.'` 
                WHERE  `'.\Config\Database\DBConfig\SamochodParametry::$id_SamochodParametry.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$deleteok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
}