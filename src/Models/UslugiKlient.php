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
        $data['uslugi']=array();
        try{
            $stmt = $this->pdo->query('SELECT * FROM '.\Config\Database\DBConfig::$tableUslugiKlient.' 
				INNER JOIN '.\Config\Database\DBConfig::$tableModel.'
				ON '.\Config\Database\DBConfig::$tableUslugiKlient.'.'.\Config\Database\DBConfig\UslugiKlient::$Id_Model. ' = ' .\Config\Database\DBConfig::$tableModel.'.'.\Config\Database\DBConfig\Model::$id.'
				INNER JOIN '.\Config\Database\DBConfig::$tableUslugi.'
				ON '.\Config\Database\DBConfig::$tableUslugiKlient.'.'.\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi. ' = ' .\Config\Database\DBConfig::$tableUslugi.'.'.\Config\Database\DBConfig\Uslugi::$id.'
            INNER JOIN '.\Config\Database\DBConfig::$tableKlient.'
				ON '.\Config\Database\DBConfig::$tableUslugiKlient.'.'.\Config\Database\DBConfig\Uslugi::$Id_Klient. ' = ' .\Config\Database\DBConfig::$tableKlient.'.'.\Config\Database\DBConfig\Model::$id);


            $uslugi = $stmt->fetchAll();
            $stmt->closeCursor();
            if($uslugi && ! empty($uslugi))
                $data['uslugi']=$uslugi;
            else
                $data['uslugi'] = array();

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


    public function update($id,$Id_Model,$Id_Uslugi,$Id_Klient,$opis){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null || $Id_Model === null|| $Id_Uslugi === null|| $Id_Klient === null|| $opis === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableUslugiKlient.'` SET
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Model.'`=:Id_Model, 
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi.'`=:Id_Uslugi,
                `'.\Config\Database\DBConfig\UslugiKlient::$Id_Klient.'`=:Id_Klient,
                `'.\Config\Database\DBConfig\UslugiKlient::$opis.'`=:opis, 
                
                
                WHERE `'
                .\Config\Database\DBConfig\UslugiKlient::$id.'`=:IdUslugaKlient');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Model', $Id_Model, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Uslugi', $Id_Uslugi, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Klient', $Id_Klient, PDO::PARAM_INT);


            $stmt->bindValue(':opis', $opis, PDO::PARAM_STR);


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


