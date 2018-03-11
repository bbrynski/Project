<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 13:15
 */

namespace Models;


class Skrzynia extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['skrzynie'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableSkrzynia.'`');
            $skrzynie = $stmt->fetchAll();
            $stmt->closeCursor();
            if($skrzynie && !empty($skrzynie))
                $data['skrzynie'] = $skrzynie;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $skrzynie = array();

        if(!isset($data['error']))
            foreach($data['skrzynie'] as $skrzynia)
                $skrzynie[$skrzynia[\Config\Database\DBConfig\Skrzynia::$id]] = $skrzynia[\Config\Database\DBConfig\Skrzynia::$TypSkrzyni];

        return $skrzynie;
    }
}