<?php
namespace Models;
use \PDO;
class Uslugi extends Model {

    public function getAll(){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        $data = array();
        $data['uslugi'] = array();
        try	{
            $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableUslugi.'`');
            $uslugi = $stmt->fetchAll();
            $stmt->closeCursor();
            if($uslugi && !empty($uslugi))
                $data['uslugi'] = $uslugi;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function getOne($id){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        $data = array();
        $data['uslugi'] = array();
        try	{
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableUslugi.'` WHERE  `'.\Config\Database\DBConfig\Uslugi::$id.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            $uslugi = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            if($uslugi && !empty($uslugi))
                $data['uslugi'] = $uslugi;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }



    public function add($nazwaUsluga, $Cena){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($nazwaUsluga === null || $Cena === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableUslugi.'` 
                (
                    `'.\Config\Database\DBConfig\Uslugi::$nazwaUsluga.'`,
                    `'.\Config\Database\DBConfig\Uslugi::$Cena.'`
                    
                ) VALUES (:nazwaUsluga, :Cena)');

            $stmt->bindValue(':nazwaUsluga', $nazwaUsluga, PDO::PARAM_STR);
            $stmt->bindValue(':Cena', $Cena, PDO::PARAM_STR);
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

    public function delete($id){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableUslugi.'` 
                WHERE  `'.\Config\Database\DBConfig\Uslugi::$id.'`=:id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$deleteok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function update($id, $nazwaUsluga, $Cena){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null || $nazwaUsluga === null || $Cena === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }

        try	{
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableUslugi.'` SET
                    `'.\Config\Database\DBConfig\Uslugi::$nazwaUsluga.'`=:nazwa,               
                    `'.\Config\Database\DBConfig\Uslugi::$Cena.'`=:Cena
                
                 WHERE `'.\Config\Database\DBConfig\Uslugi::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':nazwa', $nazwaUsluga, PDO::PARAM_STR);
            $stmt->bindValue(':Cena', $Cena, PDO::PARAM_STR);


            $result = $stmt->execute();
            $rows = $stmt->rowCount();
            if(!$result)
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
            else
                $data['message'] = \Config\Database\DBMessageName::$updateok;
            $stmt->closeCursor();
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function getAllForSelect(){
        $data = $this->getAll();
        $uslugi = array();

        if(!isset($data['error']))

            foreach($data['uslugi'] as $usluga) {
                $opcja = $usluga['nazwaUsluga'];
                $uslugi[$usluga[\Config\Database\DBConfig\Uslugi::$id]] = $opcja;
            }

        return $uslugi;
    }

}
