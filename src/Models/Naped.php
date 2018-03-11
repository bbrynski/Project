<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 13:19
 */

namespace Models;


class Naped extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['napedy'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableNaped.'`');
            $napedy = $stmt->fetchAll();
            $stmt->closeCursor();
            if($napedy && !empty($napedy))
                $data['napedy'] = $napedy;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $napedy = array();

        if(!isset($data['error']))
            foreach($data['napedy'] as $naped)
                $napedy[$naped[\Config\Database\DBConfig\Naped::$id]] = $naped[\Config\Database\DBConfig\Naped::$nazwaNaped];

        return $napedy;
    }
}