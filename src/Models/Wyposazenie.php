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


    public function add2($id_zbior_modeli, $id_wyposazenie, $id_opcja){

        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id_zbior_modeli === null || $id_wyposazenie == null || $id_opcja == null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableSamochodWyposazenie.'` 
                (
                    `'.\Config\Database\DBConfig\SamochodWyposazenie::$id_ZbiorModeli.'`,
                    `'.\Config\Database\DBConfig\SamochodWyposazenie::$id_Wyposazenie.'`,
                    `'.\Config\Database\DBConfig\SamochodWyposazenie::$id_Opcja.'`                                                     
                ) VALUES (:id1, :id2, :id3)');

            $stmt->bindValue(':id1', $id_zbior_modeli, PDO::PARAM_INT);
            $stmt->bindValue(':id2', $id_wyposazenie, PDO::PARAM_INT);
            $stmt->bindValue(':id3', $id_opcja, PDO::PARAM_INT);

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
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableSamochodWyposazenie.'` 
                WHERE  `'.\Config\Database\DBConfig\SamochodWyposazenie::$id_SamochodWyposazenie.'`=:id');
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

    public function getAll2(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }


        $data = array();
        $data['SamochodWyposazenie'] = array();
        try	{

            $stmt = $this->pdo->query('SELECT * FROM '.\Config\Database\DBConfig::$tableWyposazenie);


            $SamochodParametry = $stmt->fetchAll();
            $stmt->closeCursor();


            if($SamochodParametry && !empty($SamochodParametry))
                $data['SamochodWyposazenie'] = $SamochodParametry;

            // d($data);
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function SelectWyposazenie()
    {

        $data = $this->getAll2();
        $wyposazenie = array();

        //d($data);

        if(!isset($data['error']))

            foreach($data['SamochodWyposazenie'] as $swiatlo) {
                $opcja = $swiatlo['nazwa'];
                $wyposazenie[$swiatlo[\Config\Database\DBConfig\Wyposazenie::$id_Wyposazenie]] = $opcja;
            }

        //var_dump($silniki);
        return $wyposazenie;
    }


}