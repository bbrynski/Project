<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 12:25
 */

namespace Models;


class Reflektor extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['reflektory'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableReflektory.'`');
            $reflektory = $stmt->fetchAll();
            $stmt->closeCursor();
            if($reflektory && !empty($reflektory))
                $data['reflektory'] = $reflektory;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $reflektory = array();

        if(!isset($data['error']))
            foreach($data['reflektory'] as $reflektor)
                $reflektory[$reflektor[\Config\Database\DBConfig\Reflektory::$id]] = $reflektor[\Config\Database\DBConfig\Reflektory::$nazwaReflektory];

        return $reflektory;
    }

}