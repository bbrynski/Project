<?php


namespace Models;
use \PDO;

class Zamowienie extends Model{
    public function getAll(){
        if($this->pdo ===null){
            $data['error']= \config\Database\DBErrorName::$connection;
            return $data;
        }//if
        $data['zamowienia']=array();
        try{
            $stmt = $this->pdo->query('SELECT * FROM '.\Config\Database\DBConfig::$tableZamowienie.' 
				INNER JOIN '.\Config\Database\DBConfig::$tableKlient.'
				ON '.\Config\Database\DBConfig::$tableZamowienie.'.'.\Config\Database\DBConfig\Zamowienie::$Id_Klient. ' = ' .\Config\Database\DBConfig::$tableKlient.'.'.\Config\Database\DBConfig\Klient::$id.'
				INNER JOIN '.\Config\Database\DBConfig::$tablePracownik.'
				ON '.\Config\Database\DBConfig::$tableZamowienie.'.'.\Config\Database\DBConfig\Zamowienie::$Id_Pracownik. ' = ' .\Config\Database\DBConfig::$tablePracownik.'.'.\Config\Database\DBConfig\Pracownik::$id.'
            INNER JOIN '.\Config\Database\DBConfig::$tableZapis.'
				ON '.\Config\Database\DBConfig::$tableZamowienie.'.'.\Config\Database\DBConfig\Zamowienie::$Id_ZbiorModeli. ' 
				= ' .\Config\Database\DBConfig::$tableZapis.'.'.\Config\Database\DBConfig\Zapis::$id


            );



            $zamowienia = $stmt->fetchAll();
            $stmt->closeCursor();
            if($zamowienia && ! empty($zamowienia))
                $data['zamowienia']=$zamowienia;
            else
                $data['zamowienia'] = array();

        }//try
        catch(\PDOException $e) {
            $data['error']=\Config\Database\DBErrorName::$query;
        }//catch
        return $data;
    }//getAll

    public function getOne($NumerZamowienia){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($NumerZamowienia === null){
            $data['error'] = \Config\Database\DBErrorName::$nomatch;
            return $data;
        }


        $data = array();
        $data['Zamowienie'] = array();
        try	{
            $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableZamowienie.'` WHERE  `'.\Config\Database\DBConfig\Zamowienie::$NumerZamowienia.'`=:NumerZamowienia');
            $stmt->bindValue(':NumerZamowienia', $NumerZamowienia, PDO::PARAM_INT);
            $result = $stmt->execute();
            $Zamowienie = $stmt->fetchAll();
            $stmt->closeCursor();
            if($Zamowienie && !empty($Zamowienie))
                $data['Zamowienie'] = $Zamowienie;
            else
                $data['error'] = \Config\Database\DBErrorName::$nomatch;
        }
        catch(\PDOException $e)	{
            $data['error'] = \Config\Database\DBErrorName::$query;
        }
        return $data;
    }

    public function add($Id_Klient,$Id_Pracownik,$Id_Model,$DataZamow,$StatusZamowienia){
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($Id_Klient === null||$Id_Pracownik === null||$Id_Model === null||$DataZamow === null || $StatusZamowienia === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        $data = array();
        try	{
            $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableZamowienie.'` (
                `' .\Config\Database\DBConfig\Zamowienie::$Id_Klient.'`,
                `' .\Config\Database\DBConfig\Zamowienie::$Id_Pracownik.'`,
                `' .\Config\Database\DBConfig\Zamowienie::$Id_ZbiorModeli.'`,
                `' .\Config\Database\DBConfig\Zamowienie::$DataZamow.'`,
                `' .\Config\Database\DBConfig\Zamowienie::$NumerZamowienia.'`,
                `' .\Config\Database\DBConfig\Zamowienie::$StatusZamowienia.'`
                ) VALUES (:Id_Klient,:Id_Pracownik,:Id_Model,:DataZamow,:NumerZamowienia, :StatusZamowienia)');

            $stmt->bindValue(':Id_Klient', $Id_Klient, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Pracownik', $Id_Pracownik, PDO::PARAM_INT);
            $stmt->bindValue(':Id_Model', $Id_Model, PDO::PARAM_INT);
            $stmt->bindValue(':DataZamow', $DataZamow, PDO::PARAM_STR);
            $stmt->bindValue(':NumerZamowienia', rand()*1000, PDO::PARAM_STR);
            $stmt->bindValue(':StatusZamowienia', $StatusZamowienia, PDO::PARAM_STR);
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
    }     //add


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
            $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableZamowienie.'` WHERE  `'.\Config\Database\DBConfig\Zamowienie::$id.'`=:id');
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


    public function update($id,$Id_Klient,$Id_Pracownik,$Id_Model,$DataZamow,$NumerZamowienia, $StatusZamowienia){
        $data = array();
        if($this->pdo === null){
            $data['error'] = \Config\Database\DBErrorName::$connection;
            return $data;
        }
        if($id === null || $Id_Klient === null|| $Id_Pracownik === null|| $Id_Model === null|| $DataZamow === null|| $NumerZamowienia === null || $StatusZamowienia === null){
            $data['error'] = \Config\Database\DBErrorName::$empty;
            return $data;
        }
        try	{
            $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableZamowienie.'` SET
                    `'.\Config\Database\DBConfig\Zamowienie::$Id_Klient.'`=:imie,
                    `'.\Config\Database\DBConfig\Zamowienie::$Id_Pracownik.'`=:nazwisko,
                    `'.\Config\Database\DBConfig\Zamowienie::$Id_ZbiorModeli.'`=:firma,
                    `'.\Config\Database\DBConfig\Zamowienie::$DataZamow.'`=:nip,
                    `'.\Config\Database\DBConfig\Zamowienie::$NumerZamowienia.'`=:kod,
                    `'.\Config\Database\DBConfig\Zamowienie::$StatusZamowienia.'`=:miejscowosc
                
                 WHERE `'.\Config\Database\DBConfig\Zamowienie::$id.'`=:id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':imie', $Id_Klient, PDO::PARAM_STR);
            $stmt->bindValue(':nazwisko', $Id_Pracownik, PDO::PARAM_STR);
            $stmt->bindValue(':firma', $Id_Model, PDO::PARAM_STR);
            $stmt->bindValue(':nip', $DataZamow, PDO::PARAM_STR);
            $stmt->bindValue(':kod', $NumerZamowienia, PDO::PARAM_STR);
            $stmt->bindValue(':miejscowosc', $StatusZamowienia, PDO::PARAM_STR);



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



}


