<?php
/**
 * Created by PhpStorm.
 * User: BartoszBryński
 * Date: 10.03.2018
 * Time: 18:16
 */

namespace Models;


class Samochod extends Model
{
    /*
    public function add(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if(){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableSamochod.'`
                (
                    `'.\Config\Database\DBConfig\Samochod::$w.'`,
                    `'.\Config\Database\DBConfig\Samochod::$w.'`,
                    `'.\Config\Database\DBConfig\Samochod::$w.'`,
                    `'.\Config\Database\DBConfig\Samochod::$w.'`,
                    `'.\Config\Database\DBConfig\Samochod::$w.'`
                    
                ) VALUES (:w)');

            $stmt->bindValue(':w', $w, PDO::PARAM_STR);

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
    */

}