<?php
	namespace Models;
	use \PDO;
	class Parking extends Model {

        public function getAll(){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            $data = array();
            $data['parkingi'] = array();
            try	{
                $stmt = $this->pdo->query('SELECT * FROM `'.\Config\Database\DBConfig::$tableParking.'`
                INNER JOIN `'.\Config\Database\DBConfig::$tableZbiorModeli.'` 
                    ON `'.\Config\Database\DBConfig::$tableParking.'`.`'.\Config\Database\DBConfig\Parking::$Id_Samochod.'`=`'.\Config\Database\DBConfig::$tableZbiorModeli.'`.`'.\Config\Database\DBConfig\ZbiorModeli::$id_ZbiorModeli.'`
                INNER JOIN `'.\Config\Database\DBConfig::$tableWersja.'` 
                    ON `'.\Config\Database\DBConfig::$tableZbiorModeli.'`.`'.\Config\Database\DBConfig\ZbiorModeli::$id_Wersja.'`=`'.\Config\Database\DBConfig::$tableWersja.'`.`'.\Config\Database\DBConfig\Wersja::$id_Wersja.'`
                ');
                $parkingi = $stmt->fetchAll();
                $stmt->closeCursor();
                if($parkingi && !empty($parkingi))
                    $data['parkingi'] = $parkingi;
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
            $data['Parking'] = array();
            try	{
                $stmt = $this->pdo->prepare('SELECT * FROM  `'.\Config\Database\DBConfig::$tableParking.'` WHERE  `'.\Config\Database\DBConfig\Parking::$id.'`=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $result = $stmt->execute();
                $Parking = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                if($Parking && !empty($Parking))
                    $data['Parking'] = $Parking;
                else
                    $data['error'] = \Config\Database\DBErrorName::$nomatch;
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
            return $data;
        }



        public function add($Id_Model, $DostepneSztuki){
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($Id_Model === null || $DostepneSztuki == null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }              
            $data = array();
            try	{
                $stmt = $this->pdo->prepare('INSERT INTO `'.\Config\Database\DBConfig::$tableParking.'` 
                (
                    `'.\Config\Database\DBConfig\Parking::$Id_Samochod.'`,
                    `'.\Config\Database\DBConfig\Parking::$DostepneSztuki.'`
                    
                ) VALUES (:Id_Model, :DostepneSztuki)');

                $stmt->bindValue(':Id_Model', $Id_Model, PDO::PARAM_INT);
                $stmt->bindValue(':DostepneSztuki', $DostepneSztuki, PDO::PARAM_INT);

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
                $stmt = $this->pdo->prepare('DELETE FROM  `'.\Config\Database\DBConfig::$tableParking.'` 
                WHERE  `'.\Config\Database\DBConfig\Parking::$id.'`=:id');
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
        
        public function update($id, $DostepneSztuki){
            $data = array();
            if($this->pdo === null){
                $data['error'] = \Config\Database\DBErrorName::$connection;
                return $data;
            }
            if($id == null){
                $data['error'] = \Config\Database\DBErrorName::$empty;
                return $data;
            }
            try	{
                $stmt = $this->pdo->prepare('UPDATE  `'.\Config\Database\DBConfig::$tableParking.'` SET
                    `'.\Config\Database\DBConfig\Parking::$DostepneSztuki.'`=:DostepneSztuki
                 WHERE `'.\Config\Database\DBConfig\Parking::$id.'`=:id');
                
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':DostepneSztuki', $DostepneSztuki, PDO::PARAM_STR);

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
