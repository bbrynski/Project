<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;
use \PDO;

class SamochodSerwis extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['samochody'] = array();

        try	{
            $query='SELECT * FROM '.\Config\Database\DBConfig::$tableSamochodSerwis.'
             INNER JOIN '.\Config\Database\DBConfig::$tableKlientSamochod.
                ' ON '.\Config\Database\DBConfig::$tableSamochodSerwis.'.'.\Config\Database\DBConfig\SamochodSerwis::$id.'='.\Config\Database\DBConfig::$tableKlientSamochod.'.'.\Config\Database\DBConfig\KlientSamochod::$id_Samochod.
                ' INNER JOIN '.\Config\Database\DBConfig::$tableKlient.' ON '.\Config\Database\DBConfig::$tableKlientSamochod.'.'.\Config\Database\DBConfig\KlientSamochod::$id_Klient.'='.\Config\Database\DBConfig::$tableKlient.'.'.\Config\Database\DBConfig\Klient::$id;

            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();
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


    public function getAllForSelect(){
        $data = $this->getAll();
        $samochody = array();

        if(!isset($data['error']))

            foreach($data['samochody'] as $samochod) {
                $opcja = ($samochod['Imie'].' '.$samochod['Nazwisko'].' '.$samochod['Model'].' '.$samochod['Rok_produkcji'].' '.$samochod['Kolor_lakieru']);
                $samochody[$samochod[\Config\Database\DBConfig\SamochodSerwis::$id]] = $opcja;
            }

        return $samochody;
    }


}