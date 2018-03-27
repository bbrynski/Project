<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 11.03.2018
 * Time: 12:25
 */

namespace Models;


class Kola extends Model
{
    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['kola'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableKola.'`');
            $kola = $stmt->fetchAll();
            $stmt->closeCursor();
            if($kola && !empty($kola))
                $data['kola'] = $kola;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }
    public function getAllForSelect(){
        $data = $this->getAll();
        $kola = array();

        if(!isset($data['error']))
            foreach($data['kola'] as $kolo)
                $kola[$kolo[\Config\Database\DBConfig\Kola::$id]] = $kolo[\Config\Database\DBConfig\Kola::$wartosc];

        return $kola;
    }

}