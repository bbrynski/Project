<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-20
 * Time: 11:00
 */

namespace Models;
use \PDO;

class UslugiKlient extends Model{
    public function getAll(){
        if($this->pdo ===null){
            $data['error']= \config\Database\DBErrorName::$connection;
            return $data;
        }//if
        $data['uslugiKlient']=array();
        try{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableUslugiKlient.'`');
            $uslugiKlient = $stmt->fetchAll();
            $stmt->closeCursor();
            if($uslugiKlient && ! empty($uslugiKlient))
                $data['uslugiKlient'] = $uslugiKlient;
            else
                $data['uslugiKlient'] = array();

        }//try
        catch(\PDOException $e) {
            $data['error']=\Config\Database\DBErrorName::$query;
        }//catch
        return $data;
    }//getAll



    public function add($Id_Model,$Id_Uslugi,$Id_Klient,$Opis){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($Id_Model === null||$Id_Uslugi === null||$Id_Klient === null||$Opis === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableUslugiKlient.'` (
                `' .\Config\Database\DBConfig\UslugiKlient::$Id_Model.'`,
                `' .\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi.'`,
                `' .\Config\Database\DBConfig\UslugiKlient::$Id_Klient.'`,
                `' .\Config\Database\DBConfig\UslugiKlient::$Opis.'`
                
                ) VALUES (:Id_Model,:Id_Uslugi,:Id_Klient,:Opis)');

            $stmt->bindValue(':Id_Model', $Id_Model, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Uslugi', $Id_Uslugi, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Klient', $Id_Klient, PDO::PARAM_INT);
            $stmt->bindValue(':Opis', $Opis, PDO::PARAM_STR);
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
    }     //add


    public function getOne($id){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        $data = array();
        $data['UslugiKlient'] = array();
        try	{
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableUslugiKlient.'` WHERE  `'.\Config\Database\DBConfig\UslugiKlient::$id.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $UslugiKlient = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if($UslugiKlient && !empty($UslugiKlient))
                $data['UslugiKlient'] = $UslugiKlient;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
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
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableUslugiKlient.'` WHERE  `'.\Config\Database\DBConfig\UslugiKlient::$id.'`=:id');
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


    public function update($id,$Id_Model,$Id_Uslugi,$Id_Klient,$Opis){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null || $Id_Model === null|| $Id_Uslugi === null|| $Id_Klient === null|| $Opis === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableUslugiKlient.'` SET
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Model.'`=:Id_Model, 
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi.'`=:Id_Uslugi,
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Klient.'`=:Id_Klient,
                `'.\Config\Database\DBConfig\UslugiKlient::$Opis.'`=:opis
                
                
                WHERE `' .\Config\Database\DBConfig\UslugiKlient::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Model', $Id_Model, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Uslugi', $Id_Uslugi, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Klient', $Id_Klient, PDO::PARAM_INT);
            $stmt->bindValue(':opis', $Opis, PDO::PARAM_STR);


            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$updateok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }



}


