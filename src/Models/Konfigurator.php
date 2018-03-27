<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;
use \PDO;

class Konfigurator extends Model
{
    public function addConfig($id){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if(!isset($id)){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();

        //sprawdzenie unikatowego numeru
        $numer=$this->randomNumber();
        $sprawdzenie=$this->getNumber($numer);

        if(isset($sprawdzenie['error'])){
            $flaga=false;
        }else
            $flaga=true;

        //d($sprawdzenie);
        while($flaga){
            $numer=$this->randomNumber();
            $sprawdzenie=$this->getNumber($numer);
            if(isset($sprawdzenie['error'])){
                $flaga=false;
            }
        }


        try	{

            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableKonfigurator.'` (`'.\Config\Database\DBConfig\Konfigurator::$idModel.'`,`'.\Config\Database\DBConfig\Konfigurator::$numer.'`) VALUES(:IdModel, :Numer)');
            $stmt -> bindValue(':IdModel', $id, PDO::PARAM_INT);
            $stmt -> bindValue(':Numer', $numer, PDO::PARAM_INT);

            $result = $stmt -> execute();
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

    public function randomNumber(){

        $znaki = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $dlugoscZnaki = strlen($znaki);
        $numer = '';
        for ($i = 0; $i < 5; $i++) {
            $numer .= $znaki[rand(0, $dlugoscZnaki - 1)];
        }
        return $numer;

    }

    public function getNumber($numer){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($numer === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        $data = array();
        $data['config'] = array();
        try	{








            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableKonfigurator.'` WHERE  `'.\Config\Database\DBConfig\Konfigurator::$numer.'`=:numer');
            $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);
            $result = $stmt->execute();
            $numerBaza = $stmt->fetchAll();
            $stmt->closeCursor();
            if($numerBaza && !empty($numerBaza))
                $data['numerBaza'] = $numerBaza;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;

    }

    public function getConfig($numer){
        $query = 'SELECT * FROM `'.\Config\Database\DBConfig::$tableKonfigurator.'` 
				INNER JOIN '.\Config\Database\DBConfig::$tableModel.' 
				ON '.\Config\Database\DBConfig::$tableKonfigurator.'.'.\Config\Database\DBConfig\Konfigurator::$idModel.' = '.\Config\Database\DBConfig::$tableModel.'.'.\Config\Database\DBConfig\Model::$id.'
				INNER JOIN '.\Config\Database\DBConfig::$tableWyposazenie.' 
				ON '.\Config\Database\DBConfig::$tableModel.'.'.\Config\Database\DBConfig\Model::$Id_Wyposazenie.' = '.\Config\Database\DBConfig::$tableWyposazenie.'.'.\Config\Database\DBConfig\Wyposazenie::$id;
        $query .= ' WHERE ';
        $query .= \Config\Database\DBConfig::$tableProdukt.'.'.\Config\Database\DBConfig\Produkt::$IDProdukt.'='.$id;

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $products = $stmt->fetchAll();
        $stmt->closeCursor();

    }


}