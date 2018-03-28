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
        //$data['query'] = 'SELECT * FROM `'.\Config\Database\DBConfig::$tableModel.'` WHERE `'.\Config\Database\DBConfig\Model::$Konfigurator.'`=:id';
        //d($data);
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableModel.'` WHERE `'.\Config\Database\DBConfig\Model::$Konfigurator.'`=0'); //pobranie do oferty a nie konfigurator
            //$stmt->bindValue(':id', $id, PDO::PARAM_INT);
            //$result = $stmt->execute();
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



    public function add($nazwaModel, $cena,$silnik,$skrzynia,$naped,$kolor,$img){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($nazwaModel==null && $cena==null && $silnik==null && $skrzynia==null && $naped==null && $kolor==null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        //$image=base64_encode(file_get_contents(addslashes($img)));
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableModel.'`
                (
                    `'.\Config\Database\DBConfig\Model::$nazwaModel.'`,
                    `'.\Config\Database\DBConfig\Model::$cena.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Silnik.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Skrzynia.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Naped.'`,
                    `'.\Config\Database\DBConfig\Model::$Foto.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Wyposazenie.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Lakier.'`
                    
                ) VALUES (:nazwaModel, :cena,:Id_Silnik,:Id_Skrzynia,:Id_Naped,:Foto, :Id_Wyposazenie,:Id_Lakier)');
            $stmt->bindValue(':nazwaModel', $nazwaModel, PDO::PARAM_STR);
            $stmt->bindValue(':cena', $cena, PDO::PARAM_STR);
            $stmt->bindValue(':Id_Silnik', $silnik, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Skrzynia', $skrzynia, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Naped', $naped, PDO::PARAM_INT);
            $stmt->bindValue(':Foto', $img, PDO::PARAM_STR);
            $stmt->bindValue(':Id_Wyposazenie', 1, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Lakier', $kolor, PDO::PARAM_INT);
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
            $samochody = $stmt->fetch();
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

    public function addConfig(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if(\Tools\Session::is('nazwaModel')==false && \Tools\Session::is('idsilnik')==false && \Tools\Session::is('idskrzynia')==false && \Tools\Session::is('idlakier')==false && \Tools\Session::is('idreflektory')==false && \Tools\Session::is('idkola')==false && \Tools\Session::is('idnaped')==false){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        $foto=null;
        try	{

            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableWyposazenie.'` (`'.\Config\Database\DBConfig\Wyposazenie::$Id_Kola.'`,`'.\Config\Database\DBConfig\Wyposazenie::$Id_Reflektory.'`,`'.\Config\Database\DBConfig\Wyposazenie::$PodgrzewaneSiedzenia.'`,`'.\Config\Database\DBConfig\Wyposazenie::$PodgrzewanaSzybaPrzod.'`,`'.\Config\Database\DBConfig\Wyposazenie::$DodatkowyKompletOpon.'`,`'.\Config\Database\DBConfig\Wyposazenie::$SkorzanaTapicerka.'`) VALUES(:Kola, :Reflektory, :Siedzenia, :SzybaPrzod, :Opony, :Tapicerka)');
            //Kola, :Reflektory, :Siedzenia, :SzybaPrzod, :Opony, :Tapicerka
            $stmt -> bindValue(':Kola', \Tools\Session::get('idkola'), PDO::PARAM_INT);
            $stmt -> bindValue(':Reflektory', \Tools\Session::get('idreflektory'), PDO::PARAM_INT);
            $stmt -> bindValue(':Siedzenia', \Tools\Session::get('podgrzewaneSiedzenia'), PDO::PARAM_BOOL);
            $stmt -> bindValue(':SzybaPrzod', \Tools\Session::get('podgrzewanaSzybaPrzod'), PDO::PARAM_BOOL);
            $stmt -> bindValue(':Opony', \Tools\Session::get('kompletOpon'), PDO::PARAM_BOOL);
            $stmt -> bindValue(':Tapicerka', \Tools\Session::get('skorzanaTapicerka'), PDO::PARAM_BOOL);
            $result = $stmt -> execute();

            $idWyposazenie = $this->pdo->lastInsertId();
            $idWyposazenie = intval($idWyposazenie);




            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableModel.'`
                (
                    `'.\Config\Database\DBConfig\Model::$nazwaModel.'`,
                    `'.\Config\Database\DBConfig\Model::$cena.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Silnik.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Skrzynia.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Naped.'`,
                    `'.\Config\Database\DBConfig\Model::$Foto.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Wyposazenie.'`,
                    `'.\Config\Database\DBConfig\Model::$Id_Lakier.'`,
                    `'.\Config\Database\DBConfig\Model::$Konfigurator.'`
                    
                ) VALUES (:nazwaModel, :cena,:Id_Silnik,:Id_Skrzynia,:Id_Naped,:Foto, :Id_Wyposazenie,:Id_Lakier,:Konfigurator)');
            $stmt->bindValue(':nazwaModel',\Tools\Session::get('nazwaModel') , PDO::PARAM_STR);
            $stmt->bindValue(':cena', 0, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Silnik', \Tools\Session::get('idsilnik'), PDO::PARAM_INT);
            $stmt->bindValue(':Id_Skrzynia', \Tools\Session::get('idskrzynia'), PDO::PARAM_INT);
            $stmt->bindValue(':Id_Naped', \Tools\Session::get('idnaped'), PDO::PARAM_INT);
            $stmt->bindValue(':Foto', $foto, PDO::PARAM_STR);
            $stmt->bindValue(':Id_Wyposazenie', $idWyposazenie, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Lakier', \Tools\Session::get('idlakier'), PDO::PARAM_INT);
            $stmt->bindValue(':Konfigurator', 1, PDO::PARAM_INT);
            $result = $stmt->execute();

            $idModel = $this->pdo->lastInsertId();
            $idModel = intval($idModel);
            $data['ostatnioWstawioneID']=$idModel;
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


}