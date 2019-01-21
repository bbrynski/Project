<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;
use \PDO;

class Podsumowanie extends Model
{
    public function add($id_ZbiorModeli, $id_SamochodParametry, $id_SamochodKola, $id_SamochodSwiatla, $id_SamochodWyposazenie, $id_Lakier)
    {


        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }

        $data = array();

        //sprawdzenie unikatowego numeru
        $numer = $this->randomNumber();
        $sprawdzenie = $this->getNumber($numer);

        if (isset($sprawdzenie['error'])) {
            $flaga = false;
        } else
            $flaga = true;

        //d($sprawdzenie);
        while ($flaga) {
            $numer = $this->randomNumber();
            $sprawdzenie = $this->getNumber($numer);
            if (isset($sprawdzenie['error'])) {
                $flaga = false;
            }
        }

        //numer konfiguratora
        $data['numer'] = $numer;

        //d($numer);

        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableZapis.'` 
                (
                `'.\Config\Database\DBConfig\Zapis::$numer.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_ZbiorModeli.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_SamochodParametry.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_SamochodKola.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_SamochodSwiatla.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_SamochodWyposazenie.'`,
                    `'.\Config\Database\DBConfig\Zapis::$id_Lakier.'`
                    
                ) VALUES (:1, :2, :3, :4, :5, :6, :7)');

            $stmt->bindValue(':1', $numer, PDO::PARAM_STR);
            $stmt->bindValue(':2', $id_ZbiorModeli, PDO::PARAM_INT);
            $stmt->bindValue(':3', $id_SamochodParametry, PDO::PARAM_INT);
            $stmt->bindValue(':4', $id_SamochodKola, PDO::PARAM_INT);
            $stmt->bindValue(':5', $id_SamochodSwiatla, PDO::PARAM_INT);
            $stmt->bindValue(':6', $id_SamochodWyposazenie, PDO::PARAM_INT);
            $stmt->bindValue(':7', $id_Lakier, PDO::PARAM_INT);


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

    public function randomNumber()
    {

        $znaki = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $dlugoscZnaki = strlen($znaki);
        $numer = '';
        for ($i = 0; $i < 5; $i++) {
            $numer .= $znaki[rand(0, $dlugoscZnaki - 1)];
        }
        return $numer;

    }

    public function getNumber($numer)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($numer === null) {
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        $data = array();
        $data['config'] = array();
        try {


            $stmt = $this->pdo->prepare('SELECT * FROM  `' . \Config\Database\DBConfig::$tableZapis . '` WHERE  `' . \Config\Database\DBConfig\Zapis::$numer . '`=:numer');
            $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);
            $result = $stmt->execute();
            $numerBaza = $stmt->fetchAll();
            $stmt->closeCursor();
            if ($numerBaza && !empty($numerBaza))
                $data['numerBaza'] = $numerBaza;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;

    }

    public function getConfig($numer)
    {
        if ($this->pdo === null) {
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if ($numer === null) {
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZapis .'` 
            
            WHERE `'.\Config\Database\DBConfig\Konfigurator::$numer.'`=:numer');
            $stmt->bindValue(':numer', $numer, PDO::PARAM_STR);
            $result = $stmt->execute();
            $config = $stmt->fetchAll();
            $stmt->closeCursor();

            if ($config && !empty($config))
                $data['config'] = $config;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;

        } catch (\PDOException $e) {
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
            return $data;

    }
}