<?php

namespace Models;

use \PDO;

class Odbior extends Model
{

    public function getAll()
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['odbiory'] = array();
        try {
            $stmt = $this->pdo->query('SELECT * FROM `' . \Config\Database\DBConfig::$tableOdbior . '`
                INNER JOIN `' . \Config\Database\DBConfig::$tableKlient . '`
                    ON `' . \Config\Database\DBConfig::$tableOdbior . '`.`' . \Config\Database\DBConfig\Odbior::$idKlient . '`=`' . \Config\Database\DBConfig::$tableKlient . '`.`' . \Config\Database\DBConfig\Klient::$id . '`
                ORDER BY `' . \Config\Database\DBConfig::$tableOdbior . '`.`' . \Config\Database\DBConfig\Odbior::$odebrano.'` ASC
                ');
            $odbiory = $stmt->fetchAll();
            $stmt->closeCursor();


            if ($odbiory && !empty($odbiory))
                $data['odbiory'] = $odbiory;
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
        $data['odbior'] = array();
        try	{
            $query='SELECT * FROM '.\Config\Database\DBConfig::$tableOdbior.'
            WHERE '.\Config\Database\DBConfig::$tableOdbior.'.'.\Config\Database\DBConfig\Odbior::$id.'='.$id;

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            $odbior = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if($odbior && !empty($odbior))
                $data['odbior'] = $odbior;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function add($idKlient, $numer, $dataOdbioru)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($idKlient === null || $numer == null || $dataOdbioru == null) {
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $dataOdbioru2 = strtotime($dataOdbioru);
        $dataDzisiejsza = date("Y-m-d");
        $dataDzisiejsza = strtotime($dataDzisiejsza);

        if($dataOdbioru2 < $dataDzisiejsza){
            $data['error'] = 'Nieprawidłowa data';
            return $data;
        }
        $data = array();

        $check = $this->checkCount($dataOdbioru);

            if ($check['dataOdbior']['Ilosc'] < 3)
               {
                   try {
                       $stmt = $this->pdo->prepare('INSERT INTO `' . \Config\Database\DBConfig::$tableOdbior . '` 
                (
                    `' . \Config\Database\DBConfig\Odbior::$idKlient . '`,
                    `' . \Config\Database\DBConfig\Odbior::$data . '`,
                    `' . \Config\Database\DBConfig\Odbior::$numerZamowienia . '`,
                    `' . \Config\Database\DBConfig\Odbior::$odebrano . '`
                ) VALUES (:idKlient, :dataOdbioru, :numer, :odebrano)');

                       $stmt->bindValue(':idKlient', $idKlient, PDO::PARAM_INT);
                       $stmt->bindValue(':dataOdbioru', $dataOdbioru, PDO::PARAM_STR);
                       $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);
                       $stmt->bindValue(':odebrano', 0, PDO::PARAM_INT);

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
                $data['error'] = 'Odbiór w tym terminie jest niemożliwy';
            return $data;
        }

    public function checkCount($dataOdbioru)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT  COUNT(*) AS ` Ilosc` FROM  `' . \Config\Database\DBConfig::$tableOdbior . '`
                 WHERE  `' . \Config\Database\DBConfig\Odbior::$data . '`=:dataOdbioru');
            $stmt->bindValue(':dataOdbioru', $dataOdbioru, PDO::PARAM_STR);
            $result = $stmt->execute();
            $dataOdbior = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if ($dataOdbior && !empty($dataOdbior))
                $data['dataOdbior'] = $dataOdbior;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;

    }

    public function update($id, $klient, $dataOdbioru, $numer){
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
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableOdbior.'` SET
                    `'.\Config\Database\DBConfig\Odbior::$idKlient.'`=:idKlient,
                    `'.\Config\Database\DBConfig\Odbior::$data.'`=:data,
                    `'.\Config\Database\DBConfig\Odbior::$numerZamowienia.'`=:numer
               
                 WHERE `'.\Config\Database\DBConfig\Odbior::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':idKlient', $klient, PDO::PARAM_INT);
            $stmt->bindValue(':data', $dataOdbioru, PDO::PARAM_STR);
            $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);

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

    public function changeStatus($id){
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
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableOdbior.'` SET
                    `'.\Config\Database\DBConfig\Odbior::$odebrano.'`=:odebrano
               
                 WHERE `'.\Config\Database\DBConfig\Odbior::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':odebrano', 1, PDO::PARAM_INT);

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
