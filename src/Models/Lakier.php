<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 13:23
 */

namespace Models;


class Lakier extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['lakiery'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableLakier.'`');
            $lakiery = $stmt->fetchAll();
            $stmt->closeCursor();
            if($lakiery && !empty($lakiery))
                $data['lakiery'] = $lakiery;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $lakiery = array();

        if(!isset($data['error']))
            foreach($data['lakiery'] as $lakier)
                $lakiery[$lakier[\Config\Database\DBConfig\Lakier::$id]] = $lakier[\Config\Database\DBConfig\Lakier::$nazwaLakier];

        return $lakiery;
    }

}