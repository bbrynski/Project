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

    public function add($id_zbior_modeli, $id_SamochodKola, $id_opcja){

        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id_zbior_modeli === null || $id_SamochodKola == null || $id_opcja == null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableSamochodKola.'` 
                (
                    `'.\Config\Database\DBConfig\SamochodKola::$id_ZbiorModeli.'`,
                    `'.\Config\Database\DBConfig\SamochodKola::$id_Kola.'`,
                    `'.\Config\Database\DBConfig\SamochodKola::$id_Opcja.'`
                  
                    
                ) VALUES (:1, :2, :3)');

            $stmt->bindValue(':1', $id_zbior_modeli, PDO::PARAM_INT);
            $stmt->bindValue(':2', $id_SamochodKola, PDO::PARAM_INT);
            $stmt->bindValue(':3', $id_opcja, PDO::PARAM_INT);



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

    public function getAll2(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }


        $data = array();
        $data['kola'] = array();
        try	{

            $stmt = $this->pdo->query('SELECT * FROM '.\Config\Database\DBConfig::$tableKola);


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



    public function SelectKola(){


        $data = $this->getAll2();
        $kola = array();



        if(!isset($data['error']))

            foreach($data['kola'] as $war) {
                $opcja = $war['nazwa'];
                $kola[$war[\Config\Database\DBConfig\Kola::$id_Kola]] = $opcja;
            }


        return $kola;
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
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableSamochodKola.'` 
                WHERE  `'.\Config\Database\DBConfig\SamochodKola::$id_SamochodKola.'`=:id');
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