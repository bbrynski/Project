<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;
use \PDO;

class Samochod extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['samochody'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableModel.'`');
            $samochody = $stmt->fetchAll();
            $stmt->closeCursor();
            if($samochody && !empty($samochody))
                $data['samochody'] = $samochody;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }



    public function add($nazwaModel, $cena,$silnik,$skrzynia,$naped,$pojemnosc,$moc,$kolor,$typLakier,$img){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($nazwaModel==null && $cena==null && $silnik==null && $skrzynia==null && $naped==null && $pojemnosc==null && $moc==null && $kolor==null && $typLakier==null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $image=base64_encode(file_get_contents(addslashes($img)));
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableModel.'`
                (
                    `'.\Config\Database\DBConfig\Model::$nazwaModel.'`,
                    `'.\Config\Database\DBConfig\Model::$cena.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Silnik.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Skrzynia.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Naped.'`,
                    `'.\Config\Database\DBConfig\Model::$pojemnosc.'`,
                    `'.\Config\Database\DBConfig\Model::$MaxMoc.'`,
                    `'.\Config\Database\DBConfig\Model::$Foto.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Wyposazenie.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Lakier.'`,
                    `'.\Config\Database\DBConfig\Model::$LakierNadwozia.'`
                    
                ) VALUES (:nazwaModel, :cena,:Id_Silnik,:Id_Skrzynia,:Id_Naped,:pojemnosc,:MaxMoc,:Foto, :Id_Wyposazenie,:Id_Lakier,:LakierNadwozia)');
            $stmt->bindValue(':nazwaModel', $nazwaModel, PDO::PARAM_STR);
            $stmt->bindValue(':cena', $cena, PDO::PARAM_STR);
            $stmt->bindValue(':Id_Silnik', $silnik, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Skrzynia', $skrzynia, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Naped', $naped, PDO::PARAM_INT);
            $stmt->bindValue(':pojemnosc', $pojemnosc, PDO::PARAM_STR);
            $stmt->bindValue(':MaxMoc', $moc, PDO::PARAM_INT);
            $stmt->bindValue(':Foto', $image, PDO::PARAM_STR);
            $stmt->bindValue(':Id_Wyposazenie', "standard", PDO::PARAM_STR);
            $stmt->bindValue(':Id_Lakier', $kolor, PDO::PARAM_INT);
            $stmt->bindValue(':LakierNadwozia', $typLakier, PDO::PARAM_STR);
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
        $data['samochody'] = array();
        try	{
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableModel.'` WHERE  `'.\Config\Database\DBConfig\Model::$id.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $samochody = $stmt->fetchAll();
            $stmt->closeCursor();
            if($samochody && !empty($samochody))
                $data['samochody'] = $samochody;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }


}