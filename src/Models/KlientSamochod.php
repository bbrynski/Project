<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;
use \PDO;

class KlientSamochod extends Model
{
    public function getOne($id){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['samochody'] = array();

        try	{
            $query='SELECT * FROM '.\Config\Database\DBConfig::$tableKlientSamochod.'
             INNER JOIN '.\Config\Database\DBConfig::$tableKlient.
                ' ON '.\Config\Database\DBConfig::$tableKlientSamochod.'.'.\Config\Database\DBConfig\KlientSamochod::$id_Klient.'='.\Config\Database\DBConfig::$tableKlient.'.'.\Config\Database\DBConfig\Klient::$id.
                ' INNER JOIN '.\Config\Database\DBConfig::$tableSamochodSerwis.' ON '.\Config\Database\DBConfig::$tableKlientSamochod.'.'.\Config\Database\DBConfig\KlientSamochod::$id_Samochod.'='.\Config\Database\DBConfig::$tableSamochodSerwis.'.'.\Config\Database\DBConfig\SamochodSerwis::$id.
                ' WHERE '.\Config\Database\DBConfig::$tableKlient.'.'.\Config\Database\DBConfig\Klient::$id.'='.$id;

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
}