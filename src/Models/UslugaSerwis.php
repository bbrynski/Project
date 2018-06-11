<?php

namespace Models;

use \PDO;

class UslugaSerwis extends Model
{

    public function getAll()
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['serwis'] = array();
        try {
            $stmt = $this->pdo->query('SELECT * FROM `' . \Config\Database\DBConfig::$tableUslugaSerwis . '`
                INNER JOIN `' . \Config\Database\DBConfig::$tableKlient . '`
                    ON `' . \Config\Database\DBConfig::$tableUslugaSerwis . '`.`' . \Config\Database\DBConfig\UslugaSerwis::$idKlient . '`=`' . \Config\Database\DBConfig::$tableKlient . '`.`' . \Config\Database\DBConfig\Klient::$id . '`
                ORDER BY `' . \Config\Database\DBConfig::$tableUslugaSerwis . '`.`' . \Config\Database\DBConfig\UslugaSerwis::$zrealizowano.'` ASC
                ');
            $serwis = $stmt->fetchAll();
            $stmt->closeCursor();


            if ($serwis && !empty($serwis))
                $data['serwis'] = $serwis;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

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
        $data['serwis'] = array();
        try	{
            $query='SELECT * FROM '.\Config\Database\DBConfig::$tableUslugaSerwis.'
            WHERE '.\Config\Database\DBConfig::$tableUslugaSerwis.'.'.\Config\Database\DBConfig\UslugaSerwis::$id.'='.$id;

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $serwis = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if($serwis && !empty($serwis))
                $data['serwis'] = $serwis;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function add($idKlient, $idUslugi, $dataUslugi)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($idKlient === null || $idUslugi == null || $dataUslugi == null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $dataUslugi2 = strtotime($dataUslugi);
        $dataDzisiejsza = date("Y-m-d");
        $dataDzisiejsza = strtotime($dataDzisiejsza);

        if($dataUslugi2 < $dataDzisiejsza){
            $data['error'] = 'Nieprawidłowa data';
            return $data;
        }
        $data = array();

        $check = $this->checkCount($dataUslugi);

            if ($check['dataUslugi']['Ilosc'] < 3)
               {
                   try {
                       $stmt = $this->pdo->prepare('INSERT INTO `' . \Config\Database\DBConfig::$tableUslugaSerwis . '` 
                (
                    `' . \Config\Database\DBConfig\UslugaSerwis::$idKlient . '`,
                    `' . \Config\Database\DBConfig\UslugaSerwis::$data . '`,
                    `' . \Config\Database\DBConfig\UslugaSerwis::$idUslugi . '`,
                    `' . \Config\Database\DBConfig\UslugaSerwis::$zrealizowano . '`
                ) VALUES (:idKlient, :dataUslugi, :idUslugi, :zrealizowano)');

                       $stmt->bindValue(':idKlient', $idKlient, PDO::PARAM_INT);
                       $stmt->bindValue(':dataUslugi', $dataUslugi, PDO::PARAM_STR);
                       $stmt->bindValue(':idUslugi', $idUslugi, PDO::PARAM_INT);
                       $stmt->bindValue(':zrealizowano', 0, PDO::PARAM_INT);

                       $result = $stmt->execute();
                       $stmt->closeCursor();


                       if (!$result)
                           $data['error'] = \Config\Database\DBErrorName::$noadd;
                       else
                           $data['message'] = \Config\Database\DBMessageName::$addok;

                   } catch (\PDOException $e) {
                       $data['error'] = \Config\Database\DBErrorName::$query;
                   }

               }else
                $data['error'] = 'Usluga w tym terminie jest niemożliwa';
            return $data;
        }

    public function checkCount($dataUslugi)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT  COUNT(*) AS ` Ilosc` FROM  `' . \Config\Database\DBConfig::$tableUslugaSerwis . '`
                 WHERE  `' . \Config\Database\DBConfig\UslugaSerwis::$data . '`=:dataUslugi');
            $stmt->bindValue(':dataUslugi', $dataUslugi, PDO::PARAM_STR);
            $result = $stmt->execute();
            $dataUslugi = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if ($dataUslugi && !empty($dataUslugi))
                $data['dataUslugi'] = $dataUslugi;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;

    }

    public function update($id, $klient, $dataUslugi, $idUslugi){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id == null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableUslugaSerwis.'` SET
                    `'.\Config\Database\DBConfig\UslugaSerwis::$idKlient.'`=:idKlient,
                    `'.\Config\Database\DBConfig\UslugaSerwis::$data.'`=:data,
                    `'.\Config\Database\DBConfig\UslugaSerwis::$idUslugi.'`=:idUslugi,
                    `'.\Config\Database\DBConfig\UslugaSerwis::$zrealizowano.'`=:zrealizowano
               
                 WHERE `'.\Config\Database\DBConfig\UslugaSerwis::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':idKlient', $klient, PDO::PARAM_INT);
            $stmt->bindValue(':data', $dataUslugi, PDO::PARAM_STR);
            $stmt->bindValue(':idUslugi', $idUslugi, PDO::PARAM_STR);
            $stmt->bindValue(':zrealizowano', 1, PDO::PARAM_INT);

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
