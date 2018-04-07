<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 12:25
 */

namespace Models;


class Silnik extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['silniki'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableSilnik.'`');
            $silniki = $stmt->fetchAll();
            $stmt->closeCursor();
            if($silniki && !empty($silniki))
                $data['silniki'] = $silniki;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $silniki = array();

        if(!isset($data['error']))

            foreach($data['silniki'] as $silnik) {
                $opcja = $silnik['TypSilnika'] . ' ' . $silnik['Pojemnosc'] . 'L ' . $silnik['MaksymalnaMoc'] . 'KM';
                $silniki[$silnik[\Config\Database\DBConfig\Silnik::$id]] = $opcja;
            }

        return $silniki;
    }

}